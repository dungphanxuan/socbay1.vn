<?php

namespace frontend\controllers;

class ExampleController extends \yii\web\Controller
{
    public function actionGrid()
    {
        $this->layout = 'main4';
        return $this->render('grid');
    }

    public function actionAlbum()
    {
        $this->layout = 'main4';
        return $this->render('album');
    }

    public function actionBlog()
    {
        return $this->render('blog');
    }

    public function actionCard()
    {
        return $this->render('card');
    }

    public function actionFloatingLabel()
    {
        $this->layout = 'main4';
        return $this->render('floating-label');
    }

    public function actionCheckout()
    {
        $this->layout = 'main4';
        return $this->render('checkout');
    }

    public function actionFormspree()
    {
        $this->layout = 'main4';
        return $this->render('formspree');
    }

    public function actionCover()
    {
        return $this->render('cover');
    }

    public function actionForm()
    {
        return $this->render('form');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPricing()
    {
        $this->layout = 'main4';
        return $this->render('pricing');
    }

    public function actionProduct()
    {
        return $this->render('product');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
