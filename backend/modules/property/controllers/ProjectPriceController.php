<?php

namespace backend\modules\property\controllers;

use backend\controllers\BackendController;
use common\models\property\ProjectPrice;
use common\models\property\ProjectPriceSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ProjectPriceController implements the CRUD actions for ProjectPrice model.
 */
class ProjectPriceController extends BackendController
{
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * Lists all ProjectPrice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectPriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectPrice model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectPrice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectPrice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Thêm mới thành công',
                'options' => ['class' => 'alert-success']
            ]);

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProjectPrice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Cập nhật thành công',
                'options' => ['class' => 'alert-success']
            ]);

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProjectPrice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = 0;
        $model->save();

        Yii::$app->getSession()->setFlash('alert', [
            'body' => 'Xóa dữ liệu thành công',
            'options' => ['class' => 'alert-success']
        ]);

        return $this->redirect(['index']);
    }

    /*
     * Ajax Order
     * */
    public function actionOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = $_POST['order'] ? $_POST['order'] : [];

        foreach ($data as $key => $item) {
            /** @var ProjectPrice $model */
            $model = ProjectPrice::find()->where(['id' => $item])->one();
            $model->sort_number = $key + 1;
            $model->save();
        }

        //Update data
        $res = array(
            'msg' => 'Success',
            'success' => true,
        );

        return $res;
    }

    /**
     * Finds the ProjectPrice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ProjectPrice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectPrice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
