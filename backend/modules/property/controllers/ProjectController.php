<?php

namespace backend\modules\property\controllers;

use backend\controllers\BackendController;
use common\models\property\Project;
use common\models\property\ProjectArea;
use common\models\property\ProjectCategory;
use common\models\property\ProjectPrice;
use common\models\property\ProjectRank;
use common\models\property\ProjectSearch;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends BackendController
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        //Project::deleteAll(['status' => 0]);
        $searchModel = new ProjectSearch();

        $param = \Yii::$app->request->queryParams;
        if (isset($param['ProjectSearch']['created_at'])) {
            if (!empty($param['ProjectSearch']['created_at'])) {
                $param['ProjectSearch']['created_at'] = strtotime($param['ProjectSearch']['created_at']);
            }
        }

        $dataProvider = $searchModel->search($param);
        $dataProvider->pagination->pageSize = 50;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => ProjectCategory::find()->all(),
            'prices' => ProjectPrice::find()->all(),
            'areas' => ProjectArea::find()->all(),
            'ranks' => ProjectRank::find()->all(),
        ]);
    }

    /**
     * Displays a single Project model.
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
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     * @throws NotFoundHttpException
     */
    public function actionShow($id)
    {
        $model = $this->findModel($id);

        return $this->redirect(
            Yii::$app->urlManagerFrontend->createAbsoluteUrl(['property/project-view', 'id' => $model->id, 'name' => $model->slug])
        );
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        $dataDistrict = [];
        $dataWard = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Thêm mới thành công',
                'options' => ['class' => 'alert-success']
            ]);

            /*   Yii::$app->commandBus->handle(new AddToTimelineCommand([
                   'category' => 'project',
                   'event'    => 'create',
                   'data'     => [
                       'project_title' => $model->title,
                       'project_id'    => $model->id,
                       'created_at'    => $model->created_at
                   ]
               ]));*/

            return $this->redirect(['index']);
        } else {
            $id = getParam('id', null);
            if ($id) {
                /** @var Project $cpModel */
                $cpModel = Project::find()->where(['id' => $id])->one();
                if ($cpModel) {
                    $model->setAttributes($cpModel->attributes);
                    $model->slug = $model->slug . time();

                    //Copy thumbnail
                    if ($cpModel->thumbnail) {
                        $model->thumbnail = $cpModel->thumbnail;
                        $copyImage = "1/cp_" . Yii::$app->security->generateRandomString(20) . ".jpg";
                        $model->thumbnail['path'] = $copyImage;
                        $model->thumbnail_path = $copyImage;
                        fileSystem()->copy($cpModel->thumbnail['path'], $copyImage);
                    }
                    $model->slug = '';
                    //Init region data
                    $dataDistrict = District::getDistricts($model->city_id);
                    $dataWard = Ward::getWards($model->district_id);

                } else {
                    throw new NotFoundHttpException('New does not exist.');
                }
            }
            if (Yii::$app->request->isGet) {
                $model->city_id = 2;
                $model->status = 1;
            }

            return $this->render('create', [
                'model' => $model,
                'categories' => ProjectCategory::find()->orderBy('sort_number')->all(),
                'prices' => ProjectPrice::find()->orderBy('sort_number')->all(),
                'areas' => ProjectArea::find()->orderBy('sort_number')->all(),
                'ranks' => ProjectRank::find()->orderBy('sort_number')->all(),
                'cities' => City::find()->orderBy('priority desc')->all(),
                'dataDistrict' => $dataDistrict,
                'dataWard' => $dataWard,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dataDistrict = [];
        $dataWard = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('alert', [
                'body' => 'Cập nhật thành công',
                'options' => ['class' => 'alert-success']
            ]);

            return $this->redirect(['index']);
        } else {
            //Init region data
            $dataDistrict = District::getDistricts($model->city_id);
            $dataWard = Ward::getWards($model->district_id);

            return $this->render('update', [
                'model' => $model,
                'categories' => ProjectCategory::find()->orderBy('sort_number')->all(),
                'prices' => ProjectPrice::find()->orderBy('sort_number')->all(),
                'areas' => ProjectArea::find()->orderBy('sort_number')->all(),
                'ranks' => ProjectRank::find()->orderBy('sort_number')->all(),
                'cities' => City::find()->orderBy('priority desc')->all(),
                'dataDistrict' => $dataDistrict,
                'dataWard' => $dataWard,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel( $id )->delete();
        $model = $this->findModel($id);

        //Update Model Status
        $model->status = 0;
        $model->save(false);
        Yii::$app->getSession()->setFlash('alert', [
            'body' => 'Xóa dữ liệu thành công',
            'options' => ['class' => 'alert-success']
        ]);

        return $this->redirect(['index']);
    }

    /*
     * Export Action
     * */
    public function actionExport()
    {

        $queryAll = Project::find()
            ->where(['m_project.status' => 1]);

        $dataProvider = new ActiveDataProvider ([
            'query' => $queryAll,
            'pagination' => false
        ]);


        return $this->render('export', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChart()
    {
        $dateRange = getParam('date_range_1', date('Y-m-d', strtotime('-15 day')) . '-' . date('Y-m-d'));
        $fromDate = strtotime(substr($dateRange, 0, 10));
        $toDate = strtotime(substr($dateRange, 11));
        $arrLabel = [];
        $dataDate = [];
        $total = 0;
        while ($fromDate <= $toDate) {
            $tsStartOfDay = strtotime("midnight", $fromDate);

            $totalInDay = Project::find()
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
            'label' => 'Media Stat',
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

    /*************
     * Controller
     ************/
    public function actionJsonList($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, title AS text')
                ->from(Project::getTableSchema()->name)
                ->where(['like', 'title', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            /** @var Project $projectModel */
            $projectModel = Project::find()->where(['id' => $id])->one();
            $pName = '';
            if ($projectModel) {
                $pName = $projectModel->name;
            }
            $out['results'] = ['id' => $id, 'text' => $pName];
        }

        return $out;
    }

    /*
     * Ajax Order
     * */
    public function actionOrder()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = $_POST['order'] ? $_POST['order'] : [];

        foreach ($data as $key => $item) {
            /** @var Project $model */
            $model = Project::find()->where(['id' => $item])->one();
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
