<?php

namespace backend\modules\testing\controllers;

use yii\web\Controller;

/**
 * Facebook controller for the `testing` module
 */
class FacebookController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
