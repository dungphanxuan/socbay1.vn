<?php

namespace backend\controllers;

use common\components\keyStorage\FormModel;
use common\models\Article;
use common\models\FileStorageItem;
use common\models\User;
use Da\TwoFA\Manager;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class SiteController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function beforeAction($action)
    {
        $this->layout = Yii::$app->user->isGuest || !Yii::$app->user->can('loginToBackend') ? 'base' : 'common';

        return parent::beforeAction($action);
    }

    public function actionSettings()
    {
        $model = new FormModel([
            'keys' => [
                'frontend.maintenance'             => [
                    'label' => Yii::t('backend', 'Frontend maintenance mode'),
                    'type'  => FormModel::TYPE_DROPDOWN,
                    'items' => [
                        'disabled' => Yii::t('backend', 'Disabled'),
                        'enabled'  => Yii::t('backend', 'Enabled')
                    ]
                ],
                'backend.theme-skin'               => [
                    'label' => Yii::t('backend', 'Backend theme'),
                    'type'  => FormModel::TYPE_DROPDOWN,
                    'items' => [
                        'skin-black'  => 'skin-black',
                        'skin-blue'   => 'skin-blue',
                        'skin-green'  => 'skin-green',
                        'skin-purple' => 'skin-purple',
                        'skin-red'    => 'skin-red',
                        'skin-yellow' => 'skin-yellow'
                    ]
                ],
                'backend.layout-fixed'             => [
                    'label' => Yii::t('backend', 'Fixed backend layout'),
                    'type'  => FormModel::TYPE_CHECKBOX
                ],
                'backend.layout-boxed'             => [
                    'label' => Yii::t('backend', 'Boxed backend layout'),
                    'type'  => FormModel::TYPE_CHECKBOX
                ],
                'backend.layout-collapsed-sidebar' => [
                    'label' => Yii::t('backend', 'Backend sidebar collapsed'),
                    'type'  => FormModel::TYPE_CHECKBOX
                ]
            ]
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'body'    => Yii::t('backend', 'Settings was successfully saved'),
                'options' => ['class' => 'alert alert-success']
            ]);

            return $this->refresh();
        }

        return $this->render('settings', ['model' => $model]);
    }

    /*
    * Content Setting
    * */
    public function actionSettingContent()
    {
        $this->enableCsrfValidation = false;

        $model = new FormModel([
            'keys' => [
                'data.pagesize'       => [
                    'label' => 'Fontend Page Size',
                    'type'  => FormModel::TYPE_TEXTINPUT,
                ],
                'setting.autoplay'    => [
                    'label' => 'Video Auto Play',
                    'type'  => FormModel::TYPE_CHECKBOX,
                ],
                'frontend.show_promo' => [
                    'label' => 'Ads Promo',
                    'type'  => FormModel::TYPE_CHECKBOX,
                ],
                'system.check_vision' => [
                    'label' => 'Enable Cloud Vision',
                    'type'  => FormModel::TYPE_CHECKBOX,
                ],
            ]
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'body'    => Yii::t('backend', 'Settings was successfully saved'),
                'options' => ['class' => 'alert alert-success']
            ]);

            return $this->refresh();
        }

        return $this->render('setting-content', ['model' => $model]);
    }

    public function actionOtpVerify()
    {

        $manager = new Manager();

        $twofa_secret = '6MOMY3OYROGIW3OL';
        $valid = $manager->verify($_POST['key'], $twofa_secret);

        return $this->goHome();
    }

    public function actionOtpQr()
    {
        //$twofa_secret = (new Manager())->generateSecretKey();
        $user = Yii::$app->user->identity;

        $email = $user->email;
        //$twofa_secret = '6MOMY3OYROGIW3OL';
        $twofa_secret = $user->twofa_secret;

        //dd($secret);
        return $this->render('otp-qr', [
            'email'  => $email,
            'secret' => $twofa_secret
        ]);
    }

    public function actionDashboard()
    {

        $dateRange = getParam('date_range', date('Y-m-d', strtotime('-7 day')) . '-' . date('Y-m-d'));
        $fromDate = strtotime(substr($dateRange, 0, 10));
        $toDate = strtotime(substr($dateRange, 11));
        $arrLabel = [];
        $dataDate = [];

        while ($fromDate <= $toDate) {
            $tsStartOfDay = strtotime("midnight", $fromDate);
            $cacheKey = [
                'statfilelog',
                $tsStartOfDay
            ];
            $totalInDay = Article::find()
                ->andWhere(
                    ['between', 'created_at', $tsStartOfDay, $tsStartOfDay + 3600 * 24])
                ->count();
            $arrLabel[] = getFormat()->asDate($fromDate);
            $dataDate[] = $totalInDay;
            //Increment 1 day
            $fromDate = strtotime("+1 day", $fromDate);
        }
        $arrDataset = [
            'label'                     => 'Article Char',
            'backgroundColor'           => "rgba(255,99,132,0.2)",
            'borderColor'               => "rgba(255,99,132,1)",
            'pointBackgroundColor'      => "rgba(255,99,132,1)",
            'pointBorderColor'          => "#fff",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor'     => "rgba(179,181,198,1)",
            'data'                      => $dataDate,
        ];

        $totalArticle = Article::find()->count();
        $totalUser = User::find()->count();
        $arrData = [];
        $arrData['article'] = $totalArticle;
        $arrData['user'] = $totalUser;

        $query = Article::find()
            ->where(['status' => 1]);

        $articleProvider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort'       => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title'      => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('dashboard', [
            'dateRange'       => $dateRange,
            'arrLabel'        => $arrLabel,
            'arrDataset'      => $arrDataset,
            'arrData'         => $arrData,
            'articleProvider' => $articleProvider
        ]);
    }
}
