<?php

namespace backend\modules\saas\controllers;

use yii\data\ArrayDataProvider;
use yii\httpclient\Client;

class FilestackController extends \yii\web\Controller
{
    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        $data = [];
        $dataProvider = new ArrayDataProvider([
            'allModels'  => $data,
            'sort'       => [
                'attributes' => ['id', 'username', 'email'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionPick()
    {
        return $this->render('pick');
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
