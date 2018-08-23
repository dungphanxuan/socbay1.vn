<?php

namespace backend\modules\ads\controllers;

use common\models\ads\ReportReason;
use Yii;
use common\models\ads\AdsReport;
use common\models\ads\AdsReportSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * AdsReportController implements the CRUD actions for AdsReport model.
 */
class AdsReportController extends Controller
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
     * Lists all AdsReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdsReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdsReport model.
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
     * Creates a new AdsReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AdsReport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model'   => $model,
                'reasons' => ReportReason::find()->all(),
            ]);
        }
    }

    /**
     * Updates an existing AdsReport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model'   => $model,
                'reasons' => ReportReason::find()->all(),
            ]);
        }
    }

    /**
     * Deletes an existing AdsReport model.
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

    /*
	 * Ajax Delete AdsReport
	 * */
    public function actionAjaxDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (isAjax()) {
            $dataPost = $_POST;
            $dataId = isset($dataPost['ids']) ? $dataPost['ids'] : [];
            foreach ($dataId as $item) {
                /** @var AdsReport $mode */
                $model = AdsReport::find()->where(['id' => $item])->one();
                if ($model) {
                    $model->status = 0;
                    $model->save();
                    //$mode->delete();
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

    /*
    * AdsReport Json List
    * */
    public function actionJsonList($q = null, $id = null, $cid = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, title AS text')
                ->from(AdsReport::getTableSchema()->name)
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
            $cModel = AdsReport::find()->andWhere(['id' => $id])->one();
            $name = '';
            if ($cModel) {
                $name = $cModel->name;
            }
            $out['results'] = ['id' => $id, 'text' => $name];
        }

        return $out;
    }

    public function actionJsonListPickup($q = null, $id = null, $cid = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $dataFeature = NewFeature::find()->select('id')->asArray()->all();
            $arrayIds = ArrayHelper::getColumn($dataFeature, 'id');
            if ($cid) {
                $key = array_search($cid, $arrayIds);
                unset($arrayIds[$key]);
            }

            //Query
            $query = new Query();
            $query->select('id, title AS text')
                ->from(AdsReport::getTableSchema()->name)
                ->where(['like', 'title', $q])
                ->andWhere(['status' => 1])
                ->andWhere(['not in', 'id', $arrayIds])
                ->limit(30)
                ->orderBy(['id' => SORT_DESC]);

            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $cModel = AdsReport::find()->andWhere(['id' => $id])->one();
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
            $model = AdsReport::find()->where(['id' => $getID])->one();
            if ($model) {
                if ($model->status == 1) {
                    $model->status = 0;
                } else {
                    $model->status = 1;
                }
                $model->save(false);

                return [
                    'success' => true,
                    'id'      => $getID,
                    'status'  => $model->status,
                ];
            }

            return [
                'success' => false,
                'status'  => 100,
            ];
        }
    }

    /*
       * User Chart
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

            $totalInDay = AdsReport::find()
                //->andWhere(['status' => 1])
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
            'label'                => 'Thống kê Report',
            'backgroundColor'      => "rgba(255,99,132,0.2)",
            'borderColor'          => "rgba(255,99,132,1)",
            'pointBackgroundColor' => "rgba(255,99,132,1)",
            'fill'                 => false,
            'data'                 => $dataDate,
        ];

        return $this->render('chart', [
            'dateRange'  => $dateRange,
            'arrLabel'   => $arrLabel,
            'arrDataset' => $arrDataset,
            'total'      => $total
        ]);
    }


    /**
     * Finds the AdsReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdsReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdsReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
