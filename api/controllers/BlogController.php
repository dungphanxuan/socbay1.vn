<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use api\components\TwoFactorAuth;
use yii\filters\AccessControl;

class BlogController extends ApiController
{

    public function actionIndex()
    {
        $this->msg = 'Blog Index';
        $appFormat = \Yii::$app->formatter;
        $this->data = $appFormat->asDate(time());
    }

    public function actionView()
    {

        $this->msg = 'User login demo';
        $this->data = \Yii::$app->getUser()->getId();
    }
}
