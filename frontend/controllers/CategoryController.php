<?php

namespace frontend\controllers;

class CategoryController extends FrontendController
{
    public function actionAuto()
    {
        return $this->render('auto');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionJob()
    {
        return $this->render('job');
    }

    public function actionProperty()
    {
        return $this->render('property');
    }

    public function actionSub()
    {
        return $this->render('sub');
    }

}
