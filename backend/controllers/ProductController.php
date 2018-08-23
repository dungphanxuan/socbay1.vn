<?php

namespace backend\controllers;

class ProductController extends \yii\web\Controller
{
    public function actionCart()
    {
        return $this->render('cart');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionCredit()
    {
        return $this->render('credit');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionOrder()
    {
        return $this->render('order');
    }

    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
