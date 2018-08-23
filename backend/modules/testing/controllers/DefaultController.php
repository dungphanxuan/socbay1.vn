<?php

namespace backend\modules\testing\controllers;

use yii\helpers\StringHelper;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDelete1()
    {
        $path = '1/032018/10p5MzuLP-FOZz6jjRZN-CoH1k7h9NBcc6.jpg';
        $success = \Yii::$app->cloudStorage->delete_object($path);

        dd('df');
        return $this->render('index');
    }
}
