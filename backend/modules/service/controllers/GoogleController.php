<?php

namespace backend\modules\service\controllers;

use yii\web\Controller;
use garyjl\simplehtmldom\SimpleHtmlDom;

/**
 * Default controller for the `service` module
 */
class GoogleController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImage()
    {


    }
}
