<?php

namespace backend\controllers;

use backend\models\search\ArticleCategorySearch;
use common\dictionaries\AdsType;
use common\dictionaries\ArticleType;
use common\models\ArticleCategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class ArticleCategoryController extends BackendController
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
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleCategorySearch();
        $params = Yii::$app->request->queryParams;

        //Filter Category
        $getParent = getParam('parent_id', null);
        if ($getParent) {
            $params['ArticleCategorySearch']['parent_id'] = $getParent;
        }

        $dataProvider = $searchModel->search($params);

        //$view = 'index';
        $view = 'index-listview';

        return $this->render($view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'getParent' => $getParent
        ]);
    }

    /**
     * Displays a single ArticleCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new ArticleCategorySearch();
        $params = Yii::$app->request->queryParams;

        //Filter Category
        $getParent = getParam('parent_id', null);
        if ($getParent) {
            $params['ArticleCategorySearch']['parent_id'] = $getParent;
        } else {
            $params['ArticleCategorySearch']['parent_id'] = $model->id;
        }

        //dd($params);

        $dataProvider = $searchModel->search($params);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ArticleCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleCategory();

        $categories = ArticleCategory::find()->noParents()->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');
        $categoryType = AdsType::all();

        //Init parent id
        $getParent = getParam('parent_id', null);
        if ($getParent) {
            $model->parent_id = $getParent;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Thêm mới danh mục thành công',
                'options' => ['class' => 'alert-success']
            ]);

            return $this->redirect(['index']);
        } else {
            if (Yii::$app->request->isGet) {
                $model->status = 1;
            }

            return $this->render('create', [
                'model' => $model,
                'categories' => $categories,
                'categoryType' => $categoryType,
            ]);
        }
    }

    /**
     * Updates an existing ArticleCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categories = ArticleCategory::find()->noParents()->andWhere(['not', ['id' => $id]])->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');
        $categoryType = AdsType::all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Cập nhật danh mục thành công',
                'options' => ['class' => 'alert-success']
            ]);

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
                'categoryType' => $categoryType,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->save(false);
        //Update Frontend View
        ArticleCategory::getList(null, true);
        //$this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('alert', [
            'body' => 'Xóa danh mục thành công',
            'options' => ['class' => 'alert-warning']
        ]);

        return $this->redirect(['index']);
    }

    /*
    * Export Action
    * */
    public function actionExport()
    {

        $queryAll = ArticleCategory::find()
            ->where(['status' => 1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $queryAll,
            'pagination' => false
        ]);


        return $this->render('export', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /*
	* Category Ajax List
	* */
    public function actionAjaxJsonList($q = null, $id = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, title AS text')
                ->from(ArticleCategory::tableName())
                ->where(['like', 'title', $q])
                ->orderBy(['order' => SORT_ASC])
                //->andWhere(['status' => ArticleCategory::STATUS_ACTIVE])
                ->limit(30);

            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $cModel = ArticleCategory::find()->andWhere(['id' => $id])->one();
            $name = '';
            if ($cModel) {
                $name = $cModel->name;
            }
            $out['results'] = ['id' => $id, 'text' => $name];
        }

        return $out;
    }

    /*
	 * Ajax Order
	 * */
    public function actionAjaxOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = $_POST['order'] ? $_POST['order'] : [];

        foreach ($data as $key => $item) {
            /** @var ArticleCategory $model */
            $model = ArticleCategory::find()->where(['id' => $item])->one();
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


    // THE SubCat Action
    public function actionSubcat()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                $out = ArticleCategory::find()
                    ->where(['status' => 1])
                    ->andWhere(['parent_id' => $cat_id])
                    ->asArray()
                    ->all();
                $data = [];
                foreach ($out as $item) {
                    $dataDistrict = [];
                    $dataDistrict['id'] = $item['id'];
                    $dataDistrict['name'] = $item['title'];
                    $data[] = $dataDistrict;
                }
                echo Json::encode(['output' => $data, 'selected' => '']);

                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    /**
     * Finds the ArticleCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
