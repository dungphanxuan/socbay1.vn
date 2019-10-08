<?php

namespace api\controllers;

use yii\data\ArrayDataProvider;

/**
 * Document controller
 */
class DocumentController extends ApiController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'api\action\ErrorAction',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $this->is_html = 1;
        $arrData = [
            ['id' => 1, 'title' => 'auth', 'url' => '/auth/index'],

        ];

        $dataProvider = new ArrayDataProvider([
            'allModels' => $arrData,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'name'],
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /*Action response as Html*/
    public function actionView()
    {
        $this->is_html = 1;

        /* $appFormat = \Yii::$app->formatter;
         $a = $appFormat->asDate(time());
         dd($a);*/

        return $this->render('view');
    }


}
