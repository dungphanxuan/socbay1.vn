<?php

namespace backend\modules\chart\controllers;

use backend\controllers\BackendController;
use common\models\WebLog;
use common\models\WebLogSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * WebLogController implements the CRUD actions for WebLog model.
 */
class WebLogController extends BackendController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'delete-all' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all WebLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        //WebLog::deleteAll();

        $searchModel = new WebLogSearch();
        $param = \Yii::$app->request->queryParams;
        if (isset($param['WebLogSearch']['time'])) {
            if (!empty($param['WebLogSearch']['time'])) {
                $param['WebLogSearch']['time'] = strtotime($param['WebLogSearch']['time']);
            }
        }
        $dataProvider = $searchModel->search($param);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WebLog model.
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
     * Creates a new WebLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WebLog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing WebLog model.
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
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WebLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes All existing WebLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     **
     * @return mixed
     */

    public function actionDeleteAll()
    {
        //WebLog::deleteAll();

        return $this->redirect(['index']);
    }

    /*
    * ChartJS
    * */
    public function actionChart()
    {
        $dateRange = getParam('date_range_1', date('Y-m-d', strtotime('-7 day')) . '-' . date('Y-m-d'));
        $fromDate = strtotime(substr($dateRange, 0, 10));
        $toDate = strtotime(substr($dateRange, 11));
        $type = getParam('type', null);
        $arrLabel = [];
        $dataDate = [];
        $total = 0;
        while ($fromDate <= $toDate) {
            $tsStartOfDay = strtotime("midnight", $fromDate);
            $cacheKey = [
                'statfilelog',
                $tsStartOfDay
            ];
            $totalQuery = WebLog::find()
                //->andWhere(['type' => 2])
                ->andWhere([
                    'between', 'time', $tsStartOfDay, $tsStartOfDay + 3600 * 24
                ]);

            if ($type) {
                $totalQuery->andWhere(['type' => $type]);
            }
            $totalInDay = $totalQuery->count();

            $arrLabel[] = getFormat()->asDate($fromDate);
            $dataDate[] = $totalInDay;
            $total += $totalInDay;
            //Increment 1 day
            $fromDate = strtotime("+1 day", $fromDate);
        }
        $arrDataset[] = [
            'label' => 'Log Request',
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
            "total" => $total
        ]);
    }

    /**
     * Finds the WebLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return WebLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WebLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
