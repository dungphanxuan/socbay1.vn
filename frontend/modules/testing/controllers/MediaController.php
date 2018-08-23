<?php

namespace frontend\modules\testing\controllers;

use common\helpers\GoogleDriverHelper;
use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;


/**
 * Media controller for the `testing` module
 */
class MediaController extends Controller
{
    public function actionIndex()
    {
        $queryIndex = Article::find()
            ->orderBy('id asc');

        $dataProvider = new ActiveDataProvider([
            'query'      => $queryIndex,
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);

    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Article::find()
            ->andWhere(['id' => $id])->one();

        if (!$model) {
            throw new NotFoundHttpException(\Yii::t('common', 'Article Not Found'));
        }

        // normalize slug URL
        $slug = Yii::$app->request->get('name');
        if ($model->slug !== (string)$slug) {
            return $this->redirect(['news/view', 'id' => $model->id, 'name' => $model->slug], 301);
        }

        $queryPopular = Article::find()
            ->andWhere(['not in', 'id', [$model->id]])
            ->orderBy('id asc')
            ->limit(3);

        $dataPopularProvider = new ActiveDataProvider([
            'query'      => $queryPopular,
            'pagination' => false,
        ]);

        return $this->render('view', [
            'model'               => $model,
            'dataPopularProvider' => $dataPopularProvider
        ]);

    }


    public function actionAudio()
    {
        $urlShare = 'https://drive.google.com/file/d/0B0MkdWjqpwKKemZJenJJa0ZNemM/view?usp=sharing';

        $shareId = GoogleDriverHelper::getId($urlShare);
        $urlDownload = GoogleDriverHelper::getDownloadUrl($shareId);

        //$shareId = '1f1GOYLZen37zI6_TX7C12ZEZfSasWtiT';
        $urlView = GoogleDriverHelper::getViewUrl($shareId);
        return $this->render('audio', [
            'urlView'     => $urlView,
            'urlDownload' => $urlDownload,
        ]);
    }


    public function actionVideo()
    {
        return $this->render('video');
    }

    public function actionYoutube()
    {
        return $this->render('youtube');
    }

    public function actionStreaming()
    {
        return $this->render('streaming');
    }

    public function actionLocal()
    {
        return $this->render('local');
    }
}
