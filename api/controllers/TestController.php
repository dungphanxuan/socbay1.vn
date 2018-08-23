<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use api\components\TwoFactorAuth;
use yii\filters\AccessControl;

class TestController extends ApiController
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

    public function behaviors1()
    {
        $behaviors = parent::behaviors();
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
        $this->msg = 'Test Controller';
        $appFormat = \Yii::$app->formatter;
        $this->data = $appFormat->asDate(time());
    }

    public function actionUser()
    {

        $this->msg = 'User login demo';
        $this->data = \Yii::$app->getUser()->getId();
    }
}
