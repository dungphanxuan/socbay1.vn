<?php

namespace backend\controllers;

use backend\models\search\TimelineEventSearch;
use common\models\TimelineEvent;
use Yii;

/**
 * Application timeline controller
 */
class TimelineEventController extends BackendController
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TimelineEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionClear()
    {
        TimelineEvent::deleteAll();
        Yii::$app->getSession()->setFlash('alert', [
            'body'    => 'Xóa dữ liệu thành công',
            'options' => ['class' => 'alert-success']
        ]);

        return $this->goHome();
    }
}
