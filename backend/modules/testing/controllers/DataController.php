<?php

namespace backend\modules\testing\controllers;

use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class DataController extends Controller
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
