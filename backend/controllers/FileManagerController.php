<?php

namespace backend\controllers;

class FileManagerController extends BackendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
