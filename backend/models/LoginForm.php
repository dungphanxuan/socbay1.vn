<?php

namespace backend\models;

use cheatsheet\Time;
use common\models\User;
use Yii;
use yii\base\Model;
use yii\web\ForbiddenHttpException;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $otp;
    public $rememberMe = true;

    private $user = false;

    public $reCaptcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            //[['otp'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            //['otp', 'validateOtp'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            [['reCaptcha'], ReCaptchaValidator::class, 'secret' => env('GOOGLE_RECAPCHA_SECRET'), 'uncheckedMessage' => 'Please confirm that you are not a bot.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username'),
            'password' => Yii::t('backend', 'Password'),
            'otp' => Yii::t('backend', '2FA Otp Code'),
            'rememberMe' => Yii::t('backend', 'Remember Me')
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', Yii::t('backend', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     * @throws ForbiddenHttpException
     */
    public function login()
    {
        if (!$this->validate()) {
            //Loging
            Yii::warning('Login Fail: ' . $this->username . '/' . $this->password, 'login');
            //Disable Check Login
            return false;
        }
        $duration = $this->rememberMe ? Time::SECONDS_IN_A_MONTH : 0;
        if (Yii::$app->user->login($this->getUser(), $duration)) {
            if (!Yii::$app->user->can('loginToBackend')) {
                Yii::$app->user->logout();
                throw new ForbiddenHttpException;
            }

            return true;
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->user === false) {
            $this->user = User::find()
                ->andWhere(['or', ['username' => $this->username], ['email' => $this->username]])
                ->one();
        }

        return $this->user;
    }

    /**
     * Validates the OTP.
     */
    public function validateOtp()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if ($user && $user->otp_enable) {
                if (!empty($this->otp)) {
                    if (!$user || !$user->validateOtpSecret($this->otp)) {
                        $this->addError('otp', Yii::t('common', 'Incorrect Otp code.'));
                    }
                } else {
                    $this->addError('otp', Yii::t('common', 'Otp code is required.'));
                }

            }
        }
    }
}
