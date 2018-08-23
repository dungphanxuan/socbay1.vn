<?php

namespace frontend\modules\testing\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class PageController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }


}
