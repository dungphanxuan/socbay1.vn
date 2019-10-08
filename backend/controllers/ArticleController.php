<?php

namespace backend\controllers;

use backend\models\search\ArticleSearch;
use common\commands\AddToTimelineCommand;
use common\helpers\ArticleHelper;
use common\jobs\ArticlePublicJob;
use common\models\Article;
use common\models\ArticleCategory;
use common\models\ArticleTag;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\queue\Queue;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BackendController
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
            /*'modelAccess' => [
                'class' => OwnModelAccessFilter::class,
                'only'  => ['view', 'update', 'delete'],

                'modelCreatedByAttribute' => 'created_by',
                'modelClass'              => Article::class
            ],*/
        ]);
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();

        $params = Yii::$app->request->queryParams;

        //Filter Category
        $getCategory = getParam('category_id', null);
        if ($getCategory) {
            $params['ArticleSearch']['category_id'] = $getCategory;
            unset($params['category_id']);
        }
        $getStatus = getParam('status', null);
        if ($getStatus != null) {
            $params['ArticleSearch']['status'] = $getStatus;
        }

        $dataProvider = $searchModel->search($params);

        $dataProvider->sort = [
            'defaultOrder' => ['published_at' => SORT_DESC]
        ];


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => ArticleCategory::find()->active()->where(['parent_id' => null])->all(),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $model->loadDefaultValues();
        //$model->scenario = 'create';
        $dataDistrict = [];
        $dataWard = [];
        $dataSubCategory = [];

        //Check Permission
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Thêm mới thành công',
                'options' => ['class' => 'alert-success']
            ]);

            Yii::$app->commandBus->handle(new AddToTimelineCommand([
                'category' => 'article',
                'event' => 'item',
                'data' => [
                    'title' => $model->title,
                    'article_id' => $model->id,
                    'created_at' => $model->created_at
                ]
            ]));

            return $this->redirect(['index']);
        }

        $id = getParam('id', null);
        //Copy data
        if ($id) {
            /** @var Article $eModel */
            $eModel = Article::find()->published()->where(['id' => $id])->one();
            if ($eModel) {
                $model->copyModel($id, true);
                //Init region data
                $dataDistrict = District::getDistricts($model->city_id);
                $dataWard = Ward::getWards($model->district_id);
            } else {
                throw new NotFoundHttpException('Article does not exist.');
            }
        }

        //Set default Attribute
        if (Yii::$app->request->isGet) {
            $model->city_id = 2;
            $model->status = 1;
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => ArticleCategory::find()->rootCategory()->all(),
            'dataSubCategory' => $dataSubCategory,
            'cities' => City::find()->orderBy('priority desc')->all(),
            'dataDistrict' => $dataDistrict,
            'dataWard' => $dataWard,
        ]);
    }


    public function actionStep2($id)
    {

        $model = $this->findModel($id);

        /** @var $queue Queue */
        $queue = Yii::$app->queue;
        $queue->push(new ArticlePublicJob(['article_id' => $model->id]));

        return $this->redirect(['index']);
    }

    public function actionPublic($id)
    {

        $model = $this->findModel($id);

        /** @var $queue Queue */
        $queue = Yii::$app->queue;
        $queue->push(new ArticlePublicJob(['article_id' => $model->id]));

        return $this->redirect(['index']);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$model->scenario = 'update';

        $dataDistrict = [];
        $dataWard = [];

        $isUpdate = Yii::$app->user->can('editOwnModel', ['model' => $model]);

        /*Remember Url*/
        $backUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        $cookies1 = Yii::$app->response->cookies;
        if ($backUrl) {
            $cookies1->add(new \yii\web\Cookie([
                'name' => 'url3',
                'value' => $backUrl,
            ]));
        } else {
            $cookies1->remove('url3');
        }

        //dd($model->thumbnail);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Cập nhật thành công',
                'options' => ['class' => 'alert-success']
            ]);
            //Notify update success

            ArticleHelper::getDetail($model->id, true);

            /*Remember Url*/
            $cookies = Yii::$app->request->cookies;
            $url1 = $cookies->getValue('url3', null);
            $isUpdateUrl = strpos($url1, 'update');
            if ($url1 && !$isUpdateUrl) {
                return $this->redirect($url1);
            }

            return $this->redirect(['index']);
        }

        //Init region data
        $dataDistrict = District::getDistricts($model->city_id);
        $dataWard = Ward::getWards($model->district_id);
        $dataSubCategory = ArticleCategory::getSubCategory($model->category_id);

        return $this->render('update', [
            'model' => $model,
            'categories' => ArticleCategory::find()->rootCategory()->all(),
            'dataSubCategory' => $dataSubCategory,
            'cities' => City::find()->orderBy('priority desc')->all(),
            'dataDistrict' => $dataDistrict,
            'dataWard' => $dataWard,
        ]);
    }

    /**
     * Displays a single ArticleRevision model.
     * @param integer $article_id
     * @param integer $revision
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     * @throws NotFoundHttpException
     */
    public function actionShow($id)
    {
        $model = $this->findModel($id);

        return $this->redirect(
            Yii::$app->urlManagerFrontend->createAbsoluteUrl(['ads/view', 'id' => $model->id, 'name' => $model->slug])
        );
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

    /*
        * Export Action
        * */
    public function actionExport()
    {

        $queryAll = Article::find()
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
	 * Ajax Delete
	 * */
    public function actionAjaxDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (isAjax()) {
            $dataPost = $_POST;
            $dataId = isset($dataPost['ids']) ? $dataPost['ids'] : [];
            foreach ($dataId as $item) {
                /** @var Article $mode */
                $mode = Article::find()->where(['id' => $item])->one();
                if ($mode) {
                    $mode->status = 0;
                    $mode->save();
                }
            }
            $res = [
                'body' => 'Success',
                'success' => true,
            ];

            return $res;
        }
        $res = [
            'body' => 'Not allow',
            'success' => false,
        ];

        return $res;
    }

    /*
    * Media Json List
    * */
    public function actionJsonList($q = null, $id = null, $cid = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, title AS text')
                ->from(Article::getTableSchema()->name)
                ->where(['like', 'title', $q])
                ->andWhere(['status' => 1])
                ->limit(30)
                ->orderBy(['id' => SORT_DESC]);

            //Filter by Category
            if (!is_null($cid) && !empty($cid)) {
                $query->where(['category_id' => $cid]);
            }

            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $cModel = Article::find()->andWhere(['id' => $id])->one();
            $name = '';
            if ($cModel) {
                $name = $cModel->name;
            }
            $out['results'] = ['id' => $id, 'text' => $name];
        }

        return $out;
    }

    /*
    * Ajax Update Status
    * */
    public function actionStatus()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $getID = postParam('id');
            $model = Article::find()->where(['id' => $getID])->one();
            if ($model) {
                if ($model->status == 1) {
                    $model->status = 0;
                } else {
                    $model->status = 1;
                }
                $model->save(false);

                return [
                    'success' => true,
                    'id' => $getID,
                    'status' => $model->status,
                ];
            }

            return [
                'success' => false,
                'status' => 100,
            ];
        }
    }

    /**
     * actionList to return matched tags
     */
    public function actionListTags($query)
    {
        $models = ArticleTag::find()->where(['like', 'name', $query])->all();
        $items = [];

        foreach ($models as $model) {
            $items[] = ['name' => $model->name];
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $items;
    }

    /*
	 * Ajax Order
	 * */
    public function actionAjaxOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = $_POST['order'] ? $_POST['order'] : [];

        foreach ($data as $key => $item) {
            /** @var Article $model */
            $model = Article::find()->where(['id' => $item])->one();
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

    /*
   * Article Chart
   * */
    public function actionChart()
    {
        $dateRange = getParam('date_range', date('Y-m-d', strtotime('-15 day')) . '-' . date('Y-m-d'));
        $fromDate = strtotime(substr($dateRange, 0, 10));
        $toDate = strtotime(substr($dateRange, 11));
        $arrLabel = [];
        $dataDate = [];
        $total = 0;

        $getObjectId = getParam('object_id', null);
        while ($fromDate <= $toDate) {
            $tsStartOfDay = strtotime("midnight", $fromDate);

            $totalInDay = Article::find()
                ->andWhere(
                    ['between', 'created_at', $tsStartOfDay, $tsStartOfDay + 3600 * 24])
                ->count();
            $arrLabel[] = getFormat()->asDate($fromDate);
            $dataDate[] = $totalInDay;
            $total += $totalInDay;
            //Increment 1 day
            $fromDate = strtotime("+1 day", $fromDate);
        }
        $arrDataset[] = [
            'label' => 'Article Stat',
            'backgroundColor' => "rgba(255,99,132,0.2)",
            'borderColor' => "rgba(255,99,132,1)",
            'pointBackgroundColor' => "rgba(255,99,132,1)",
            'fill' => false,
            'data' => $dataDate,
        ];

        return $this->render('chart', [
            'dateRange' => $dateRange,
            'arrLabel' => $arrLabel,
            'arrDataset' => $arrDataset,
            'total' => $total
        ]);
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

    /*
     * User role, Image,
     * */
    protected function checkAllowCreate()
    {

    }
}
