<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use api\components\TwoFactorAuth;
use common\dictionaries\DeviceType;
use yii\filters\AccessControl;

class NotificationController extends ApiController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => AccessTokenAuth::class,
        ];
        $behaviors[] = [
            'class' => TwoFactorAuth::class,
        ];

        $behaviors['access'] = [
            'class' => AccessControl::class,
            'only'  => ['user'],
            'rules' => [
                [
                    'allow'   => true,
                    'actions' => ['user'],
                    'roles'   => ['@'],
                ]
            ],
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        $this->msg = 'Notification Index';
        $appFormat = \Yii::$app->formatter;
        $this->data = $appFormat->asDate(time());
    }

    /*
     * Register Device ID (Android), Device Token (IOS)
     * */
    public function actionRegister()
    {
        $token = postParam('token', null);
        $type = postParam('type', DeviceType::ANDROID);
        if (empty($token)) {
            $this->msg = 'Missing device id or token';
            $this->code = 422;
        } else {

            $this->msg = 'Register FCM';
        }
    }

    /*
     * Notification
     * */
    public function actionNotify()
    {

    }

    public function actionWeb()
    {
        $this->is_html = 1;


        return $this->render('web');
    }
}