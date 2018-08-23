<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use api\components\TwoFactorAuth;
use yii\filters\AccessControl;

class PostController extends ApiController
{
    /*
     * Blog Index
     * */
    public function actionIndex()
    {
        $this->msg = 'Blog Index';
        $appFormat = \Yii::$app->formatter;
        $this->data = $appFormat->asDate(time());
    }

    /*
     * Blog Detail
     * */
    public function actionView()
    {

        $this->msg = 'User login demo';
        $this->data = \Yii::$app->getUser()->getId();
    }
}
