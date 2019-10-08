<?php

namespace api\controllers;

use common\commands\AddToTimelineCommand;
use common\helpers\ArticleHelper;
use common\models\Article;
use common\models\FileStorageItem;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use Yii;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use api\components\AccessTokenAuth;


class ArticleController extends ApiController
{

    public $defaultAction = 'index';

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'create' => ['post'],
                ],
            ],
            'authenticator' => [
                'class' => AccessTokenAuth::class,
                'except' => ['index', 'view'],
            ]
        ]);
    }

    /**
     * Get List Article
     *
     * @param integer $flag Last update time
     *
     */
    public function actionIndex()
    {
        $timeFlag = getParam('flag', null);
        $getType = getParam('type', null);

        $query = Article::find();

        if ($timeFlag) {
            if (isValidTimeStamp($timeFlag)) {
                $query->where(['>', 'updated_at', $timeFlag]);
            }
        }
        /*Add order by updated*/
        $query->orderBy('updated_at DESC');

        $pagerSize = 10;

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => ['id'],
            ],
            'pagination' => [
                'pageSize' => $pagerSize,
            ],
        ]);

        $articles = $provider->getModels();
        $data = [];

        $q = new Query();
        $maxUpdated = $q->from(Article::tableName())->max('updated_at');

        $data['total'] = count($articles);
        $data['last_update'] = $maxUpdated;
        $data_item = [];
        foreach ($articles as $articleItem) {
            $data_item[] = ArticleHelper::getDetail($articleItem->id);
        }

        $data['items'] = $data_item;

        $this->msg = 'Articles';
        $this->data = $data;
    }

    /**
     * Get Article Detail
     *
     * @param integer $id Article ID
     *
     * @return array Article detail
     */
    public function actionView()
    {
        $getId = getParam('id', null);
        $getType = getParam('type', null);
        if ($getId) {
            $model = Article::find()->published()->where(['id' => $getId])->one();
            if ($model) {
                $data = ArticleHelper::getDetail($model->id);
                $this->msg = 'Article detail';
                $this->data = $data;
            } else {
                $this->code = 404;
                $this->msg = 'Article Not Found';
            }
        } else {
            $this->code = 422;
            $this->msg = 'Missing Article ID ';
        }
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //Massive Assignment
        $values = [
            'title' => 'James',
            'body' => 'james@example.com',
            'category_id' => 1
        ];

        $dataPost = Yii::$app->request->post();

        $model = new Article();

        //$model->attributes = $values;
        //dd($model->attributes);

        if ($model->load($dataPost) && $model->validate()) {

            //Set thumbnail
            $idFile = $dataPost['thumbnail_id'];
            /** @var FileStorageItem $modelFile */
            $modelFile = FileStorageItem::find()->where(['id' => $idFile])->one();
            if ($modelFile) {
                $model->thumbnail = $modelFile->attributes;
            }

            $model->save();

            $this->msg = Yii::t('common', 'Create article success.');

            Yii::$app->commandBus->handle(new AddToTimelineCommand([
                'category' => 'article',
                'event' => 'item',
                'data' => [
                    'title' => $model->title,
                    'article_id' => $model->id,
                    'created_at' => $model->created_at
                ]
            ]));
        } else {
            $this->code = 422;
            $error = $model->getFirstErrors();
            if (isset($error)) {
                $this->msg = reset($error);;
            }
        }

    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionPickup($id)
    {

    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = 2;
        $model->save();
        Yii::$app->getSession()->setFlash('alert', [
            'body' => 'Xóa Bài viết thành công',
            'options' => ['class' => 'alert-warning']
        ]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
