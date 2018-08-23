<?php

namespace backend\controllers;

use common\models\ArticleRevision;
use backend\models\search\ArticleRevisionSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ArticleRevisionController implements the CRUD actions for ArticleRevision model.
 */
class ArticleRevisionController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArticleRevision models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleRevisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleRevision model.
     * @param integer $article_id
     * @param integer $revision
     * @return mixed
     */
    public function actionView($article_id, $revision)
    {
        return $this->render('view', [
            'model' => $this->findModel($article_id, $revision),
        ]);
    }

    /**
     * Creates a new ArticleRevision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleRevision();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_id' => $model->article_id, 'revision' => $model->revision]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArticleRevision model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $article_id
     * @param integer $revision
     * @return mixed
     */
    public function actionUpdate($article_id, $revision)
    {
        $model = $this->findModel($article_id, $revision);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_id' => $model->article_id, 'revision' => $model->revision]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleRevision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $article_id
     * @param integer $revision
     * @return mixed
     */
    public function actionDelete($article_id, $revision)
    {
        $this->findModel($article_id, $revision)->delete();

        return $this->redirect(['index']);
    }

    /*
	 * Ajax Delete
	 * */
    public function actionAjaxDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (isAjax()) {
            $dataPost = $_POST;
            $dataId = isset($dataPost['ids']) ? $dataPost['ids'] : [];
            foreach ($dataId as $item) {
                /** @var ArticleRevision $mode */
                $mode = ArticleRevision::find()
                    ->where(['article_id' => $item['article_id'], 'revision' => $item['revision']])
                    ->one();
                if ($mode) {
                    $mode->delete();
                }
            }
            $res = [
                'body'    => 'Success',
                'success' => true,
            ];

            return $res;
        }
        $res = [
            'body'    => 'Not allow',
            'success' => false,
        ];

        return $res;
    }

    /**
     * Finds the ArticleRevision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $article_id
     * @param integer $revision
     * @return ArticleRevision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($article_id, $revision)
    {
        if (($model = ArticleRevision::findOne(['article_id' => $article_id, 'revision' => $revision])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
