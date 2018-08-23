<?php

namespace backend\modules\chart\controllers;

use backend\controllers\BackendController;

/**
 * Default controller for the `chart` module
 */
class DefaultController extends BackendController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDemo()
    {
        return $this->render('demo');
    }
}
