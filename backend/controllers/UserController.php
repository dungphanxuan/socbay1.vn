<?php

namespace backend\controllers;

use backend\models\search\UserSearch;
use backend\models\UserForm;
use common\helpers\Password;
use common\helpers\TimeHelper;
use common\models\User;
use common\models\UserToken;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BackendController
{
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->sort = [
            'defaultOrder' => ['id' => SORT_DESC]
        ];
        $dataProvider->pagination->pageSize = 50;

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $tokenModel = UserToken::find()
            ->byType(UserToken::TYPE_USER_API)
            ->byUserId($id)
            ->one();
        if (!$tokenModel) {
            $tokenModel = UserToken::create($id, UserToken::TYPE_USER_API, TimeHelper::SECONDS_IN_A_MONTH);
        }


        return $this->render('view', [
            'model'      => $this->findModel($id),
            'tokenModel' => $tokenModel,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     * @throws NotFoundHttpException
     */
    public function actionLogin($id)
    {
        $model = $this->findModel($id);
        $tokenModel = UserToken::create(
            $model->getId(),
            UserToken::TYPE_LOGIN_PASS,
            60
        );

        return $this->redirect(
            Yii::$app->urlManagerFrontend->createAbsoluteUrl(['user/sign-in/login-by-pass', 'token' => $tokenModel->token])
        );
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        if (Yii::$app->request->isGet) {
            $model->status = User::STATUS_ACTIVE;
            $model->roles = User::ROLE_USER;
        }

        return $this->render('create', [
            'model' => $model,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }

    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->setModel($this->findModel($id));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        /*Yii::$app->authManager->revokeAll($id);
        $this->findModel($id)->delete();*/
        $model = $this->findModel($id);
        $model->status = User::STATUS_DELETED;
        $model->save(false);

        return $this->redirect(['index']);
    }

    /*
     * Ajax Generate Password
     * */
    public function actionAjaxPassword()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $getLength = getParam('lenght', 20);
            $passWord = Password::generateStrongPassword($getLength);

            $res = array(
                'body'    => $passWord,
                'success' => true,
            );

            return $res;
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

            $totalInDay = User::find()
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
            'label'                => 'Thống kê User',
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
