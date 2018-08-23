<?php

namespace backend\modules\property\controllers;

use common\models\property\ProjectCategory;
use common\models\property\ProjectCategorySearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ProjectCategoryController implements the CRUD actions for ProjectCategory model.
 */
class ProjectCategoryController extends Controller
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
     * Lists all ProjectCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //$view = 'index';
        $view = 'index_list';
        return $this->render($view, [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            if (Yii::$app->request->isGet) {
                $model->status = 1;
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProjectCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /*
     * Ajax Order
     * */
    public function actionOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = $_POST['order'] ? $_POST['order'] : [];

        foreach ($data as $key => $item) {
            /** @var ProjectCategory $model */
            $model = ProjectCategory::find()->where(['id' => $item])->one();
            $model->sort_number = $key + 1;
            $model->save();
        }

        //Update data
        $res = array(
            'msg'     => 'Success',
            'success' => true,
        );

        return $res;
    }

    /**
     * Deletes an existing ProjectCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
