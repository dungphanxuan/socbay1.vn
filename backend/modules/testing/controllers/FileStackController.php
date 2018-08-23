<?php

namespace backend\modules\testing\controllers;

use yii\helpers\StringHelper;
use yii\web\Controller;
use Da\TwoFA\Manager;

/**
 * Default controller for the `testing` module
 */
class FileStackController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionPick()
    {
        return $this->render('pick');
    }

}
