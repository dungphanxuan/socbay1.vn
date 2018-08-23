<?php

namespace backend\modules\testing\controllers;

use yii\helpers\StringHelper;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class FormController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCheckbox()
    {
        return $this->render('checkbox');
    }

}
