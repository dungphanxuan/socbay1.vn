<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use api\models\PasswordResetRequestForm;
use api\models\SignupForm;
use cheatsheet\Time;
use common\commands\SendEmailCommand;
use common\helpers\FacebookHelper;
use common\models\User;
use common\models\UserToken;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

class UserController extends ApiController
{
    public $defaultAction = 'index';


    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs'         => [
                'class'   => \yii\filters\VerbFilter::class,
                'actions' => [
                    'login'           => ['post'],
                    'sign-up'         => ['post'],
                    'auth-facebook'   => ['post'],
                    'forgot-password' => ['post'],
                    'logout'          => ['post'],
                ],
            ],
            'authenticator' => [
                'class'  => AccessTokenAuth::class,
                'except' => ['index', 'login', 'sign-up', 'auth-facebook', 'forgot-password'],
            ]
        ]);
    }

    public function actionIndex()
    {
        $this->msg = 'User Controller';
    }

    /*
    * Get user info
    * @param int $id User id
    * @return User info
    * */
    public function actionView()
    {
        $uid = getParam('id', null);
        if (!$uid) {
            $uid = getMyId();
        }
        if (!empty($uid)) {

            $useModel = User::find()->active()->where(['id' => $uid])->one();
            if ($useModel) {
                $this->msg = 'User Info';
                $this->data = User::getDetail($uid, true);
            } else {
                $this->code = 404;
                $this->msg = Yii::t('common', 'User Not found');
            }
        } else {
            $this->code = 422;
            $this->msg = Yii::t('common', 'Id is require');
        }

    }

    /*
    * Login api
    * @param string $identity Username or email
    * @param string $password Password
    * @return User info, access token
    * */
    public function actionLogin()
    {

        $get_identity = postParam('identity', '');
        $get_password = postParam('password', '');
        if (empty($get_identity) || empty($get_password)) {
            $this->msg = Yii::t('common', 'Missing username or password.');
            $this->code = 422;
            $this->data = $_POST;
        } else {
            $login = $this->login($get_identity, $get_password);
            $this->code = $login['status'];
            $this->msg = $login['msg'];
            $this->data = $login['result'];
        }
    }


    /*
    * SignUp api
    * @param string $email User email
    * @param string $password User password
    * @return mixed
    * */
    public function actionSignUp()
    {
        $get_email = postParam('email', '');
        //$get_username = getParam('username', true, '');
        $get_password = postParam('password', '');
        if (empty($get_email) || empty($get_password)) {
            $this->msg = Yii::t('common', 'Missing email or password');
            $this->code = 422;
        } else {
            $model = new SignupForm();
            $model->email = $get_email;
            $model->username = $get_email;
            $model->password = $get_password;

            if ($model->validate()) {
                $user = $model->signup();
                if ($user && Yii::$app->getUser()->login($user)) {
                    //Process
                }
                $this->msg = Yii::t('common', 'Register success.');
            } else {
                $this->code = 422;
                $error = $model->getFirstErrors();
                if (isset($error)) {
                    $this->msg = reset($error);;
                }
            }
        }
    }

    /*
     * Facebook Auth
     * */
    public function actionAuthFacebook()
    {
        $tokenAuth = postParam('access_token', null);

        if (!$tokenAuth) {
            $this->msg = Yii::t('common', 'Missing Access token {access_token}');
            $this->code = 422;
        } else {
            /*
             *  TODO List
             *  1. Check Valid Access token
             *  2. Get User Info
             *  3. Check User System
             * */
            $userInfo = FacebookHelper::feedUser($tokenAuth);
            if ($userInfo) {
                $clientName = 'facebook';
                $login = $this->signupClient($clientName, $userInfo);

                $this->code = $login['status'];
                $this->msg = $login['msg'];
                $this->data = $login['result'];
            } else {
                $this->msg = "Access token Invalid";
                $this->code = 403;
            }

        }

    }

    /*
     * Forgot Password
     * */
    public function actionForgotPassword()
    {
        $email = postParam('email', null);
        if (empty($email)) {
            $this->msg = Yii::t('common', 'Missing email.');
            $this->code = 422;
            $this->data = $_POST;
        } else {
            $model = new PasswordResetRequestForm();
            $model->email = $email;
            if ($model->validate()) {
                if ($model->sendEmail()) {
                    $this->code = 200;
                    $this->msg = Yii::t('frontend', 'Check your email for further instructions.');
                } else {
                    $this->code = 200;
                    $this->msg = Yii::t('frontend', 'Sorry, we are unable to reset password for email provided.');
                }
            } else {
                $this->code = 422;
                $error = $model->getFirstErrors();
                if (isset($error)) {
                    $this->msg = reset($error);;
                }
            }
        }
    }

    /**
     * User logout
     *
     * @param string $token User token
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $token = postParam('token', '');
        if (empty($token)) {
            $this->msg = "Missing token";
            $this->code = 422;
        } else {
            $token = UserToken::find()
                ->byType(UserToken::TYPE_USER_API)
                ->byToken($token)
                ->notExpired()
                ->one();

            if (!$token) {
                $this->msg = "Bad Request: Token not found";
                $this->code = 400;
            } else {
                $token->delete();
                $this->msg = "Logout success";
                $this->code = 200;
            }
        }
    }

    private function signupClient($clientName, $attributes, $type = 1)
    {
        //dd($attributes);

        $user = User::find()->where([
            'oauth_client'         => $clientName,
            'oauth_client_user_id' => ArrayHelper::getValue($attributes, 'id')
        ])->one();

        /*Check Spam Account*/
        //$needle = ['gmail.com'];
        $needles = ['oiqas.com'];
        $authEmail = ArrayHelper::getValue($attributes, 'email');
        if ($authEmail) {
            foreach ($needles as $needle) {
                if (strpos($authEmail, $needle) !== false) {
                    Yii::warning('Login Email' . $attributes['email'], 'register');
                    throw new Exception('OAuth error');
                    //throw new HttpException(404, 'Page Not Found');
                }
            }

        }

        if (!$user) {
            $user = new User();
            $user->scenario = 'oauth_create';
            $user->username = ArrayHelper::getValue($attributes, 'login');
            //$user->email = ArrayHelper::getValue($attributes, 'email');

            $login = ArrayHelper::getValue($attributes, 'login');
            if ($login) {
                $user->username = $login;
            } else {
                $user->username = ArrayHelper::getValue($attributes, 'email');
            }
            // check default location of email, if not found as in google plus dig inside the array of emails
            $email = ArrayHelper::getValue($attributes, 'email');
            if ($email === null) {
                $email = ArrayHelper::getValue($attributes, ['emails', 0, 'value']);
            }
            $user->email = $email;

            //Check empty user username, email
            $randUser = '2kv' . Yii::$app->getSecurity()->generateRandomString(16) . '@gmail.com';
            if (!$user->username || empty($user->username)) {
                $user->username = $randUser;
            }

            $user->valid_email = 1;
            if (!$user->email) {
                $user->email = $randUser;
                $user->valid_email = 0;
            }

            $user->oauth_client = $clientName;
            $user->oauth_client_user_id = ArrayHelper::getValue($attributes, 'id');
            $user->status = User::STATUS_ACTIVE;
            $password = Yii::$app->security->generateRandomString(8);
            $user->setPassword($password);
            if ($user->save()) {
                $profileData = [];
                if ($clientName === 'facebook') {
                    $profileData['firstname'] = ArrayHelper::getValue($attributes, 'first_name');
                    $profileData['lastname'] = ArrayHelper::getValue($attributes, 'last_name');
                }
                $user->afterSignup($profileData);
                //Check Valid Email
                if ($user->valid_email) {
                    $sentSuccess = Yii::$app->commandBus->handle(new SendEmailCommand([
                        'view'    => 'oauth_welcome',
                        'params'  => ['user' => $user, 'password' => $password],
                        'subject' => Yii::t('frontend', '{app-name} | Your login information', ['app-name' => Yii::$app->name]),
                        'to'      => $user->email
                    ]));
                    if ($sentSuccess) {
                        //Wellcome
                    }
                }

            } else {
                // We already have a user with this email. Do what you want in such case
                if ($user->email && User::find()->where(['email' => $user->email])->count()) {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options' => ['class' => 'alert-danger'],
                            'body'    => Yii::t('frontend', 'We already have a user with email {email}', [
                                'email' => $user->email
                            ])
                        ]
                    );
                } else {
                    Yii::$app->session->setFlash(
                        'alert',
                        [
                            'options' => ['class' => 'alert-danger'],
                            'body'    => Yii::t('frontend', 'Error while oauth process.')
                        ]
                    );
                }

            };
        }
        //API Login
        return $this->login($user->email, false, false, true);
    }

    /*
     * Authenticator
     * */
    private function login($identity, $password, $auto = false, $valid = false)
    {
        $status = 0;
        $msg = '';
        $result = array();

        //Check account infor
        /**
         * @var User $user
         */
        $user = User::findByLogin($identity);
        if ($user) {
            if ($user->status == 2) {

                $validPassword = $password ? $user->validatePassword($password) : false;
                if ($validPassword || $valid) {
                    /** @var UserToken $tokenModel */
                    $tokenModel = UserToken::find()
                        ->notExpired()
                        ->byType(UserToken::TYPE_USER_API)
                        ->byUserId($user->id)
                        ->one();

                    $dataUser = [
                        'user_id'      => $user->id,
                        'username'     => $user->username,
                        'access_token' => Yii::$app->security->generateRandomString(40),
                    ];
                    $msg = Yii::t('common', 'Login success');
                    $status = 200;
                    if ($tokenModel) {
                        $dataUser['access_token'] = $tokenModel->token;
                        $dataUser['expires'] = $tokenModel->expire_at;
                        $dataUser['expires_show'] = getFormat()->asDatetime($tokenModel->expire_at);
                        $result = $dataUser;
                    } else {
                        //Generate Token
                        $loginTime = Time::SECONDS_IN_A_MONTH;
                        $token = UserToken::create($user->id, UserToken::TYPE_USER_API, $loginTime);
                        $timeExpires = time() + $loginTime;
                        $dataUser['access_token'] = $token->token;
                        $dataUser['expires'] = $timeExpires;
                        $dataUser['expires_show'] = getFormat()->asDatetime($timeExpires);
                        $result = $dataUser;
                    }
                } else {
                    $status = 400;
                    $msg = "Wrong password";
                }
            } else {
                $status = 400;
                $msg = "Account not active";
            }
        } else {
            $status = 400;
            $msg = "Account not register";
        }

        return array(
            'status' => $status,
            'msg'    => $msg,
            'result' => $result
        );
    }

}
