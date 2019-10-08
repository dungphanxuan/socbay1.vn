<?php

namespace frontend\modules\media\controllers;

use common\dictionaries\AdsType;
use common\models\media\Media;
use frontend\controllers\FrontendController;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\helpers\GoogleDriverHelper;
use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `media` module
 */
class DefaultController extends FrontendController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['administrator'],
                    ],

                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->site_id = AdsType::ONLINE;
        $queryIndex = Media::find()
            ->orderBy(['id' => SORT_DESC, 'episode' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $queryIndex,
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
        $this->site_id = AdsType::ONLINE;
        /** @var Media $model */
        $model = Media::find()
            ->andWhere(['id' => $id])->one();

        if (!$model) {
            throw new NotFoundHttpException(\Yii::t('common', 'Media Not Found'));
        }

        // update view count
        if (Yii::$app->request->isGet) {
            $model->updateCounters(['view_count' => 1]);
        }
        // normalize slug URL
        $slug = Yii::$app->request->get('name');
        if ($model->slug !== (string)$slug) {
            return $this->redirect(['/media/view', 'id' => $model->id, 'name' => $model->slug], 301);
        }

        $queryPopular = Article::find()
            ->andWhere(['not in', 'id', [$model->id]])
            ->orderBy('id asc')
            ->limit(3);

        $dataPopularProvider = new ActiveDataProvider([
            'query' => $queryPopular,
            'pagination' => false,
        ]);

        $view = 'view';
        if ($model->url_streaming) {
            $view = 'streaming';
        }

        return $this->render($view, [
            'model' => $model,
            'dataPopularProvider' => $dataPopularProvider
        ]);

    }

    public function actionVideo()
    {
        return $this->render('video');
    }

    public function actionLocal()
    {
        return $this->render('local');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionAudio()
    {
        return $this->render('audio');
    }

    public function actionStreaming()
    {
        return $this->render('streaming');
    }
}
