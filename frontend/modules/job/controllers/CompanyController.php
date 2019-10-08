<?php

namespace frontend\modules\job\controllers;

use common\dictionaries\AdsType;
use common\helpers\ArticleHelper;
use common\models\Article;
use common\models\ArticleDetail;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use frontend\controllers\FrontendController;
use Yii;
use common\models\job\Company;
use common\models\job\CompanySearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends FrontendController
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
                ],
            ],
        ];
    }

    public function init()
    {
        $this->site_id = AdsType::JOB;
        parent::init();
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Register company model
     * @return mixed
     */
    public function actionRegister()
    {
        $hrID = getMyId();
        /** @var Company $model */
        $model = Company::find()->where(['user_id' => $hrID])->one();
        if (!$model) {
            $model = new Company();
            $model->title = '';
            $model->body = '';
            $model->user_id = $hrID;
            $model->save(false);

            //Update company
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            //Already register company
            Yii::$app->getSession()->setFlash('success', 'Thông tin công ty của bạn đã thiết lập.');

            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //Check permission
        $userId = Yii::$app->user->id;
        if (!$this->checkAllowCreate($userId)) {
            throw new ForbiddenHttpException(Yii::t('common', 'You are not allowed to perform this operation!'));
        }
        $model = new Company();
        $dataDistrict = [];
        $dataWard = [];
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            if ($model->save()) {
                return $this->redirect(['/job/company', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'cities' => City::find()->orderBy('priority desc')->all(),
            'dataDistrict' => $dataDistrict,
            'dataWard' => $dataWard,
        ]);
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        //Check permission
        $model = $this->findModel($id);

        //Check Security
        if (!$this->checkSecurity($model->created_by, $model->id)) {
            throw new ForbiddenHttpException(Yii::t('common', 'You are not allowed to perform this operation!'));
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Update cache
            $articles = Article::find()
                ->leftJoin('tbl_article_detail', '`tbl_article_detail`.`article_id` = `tbl_article`.`id`')
                ->where([ArticleDetail::tableName() . '.job_company_id' => $model->id])
                ->all();
            foreach ($articles as $modelArticle) {
                ArticleHelper::getDetail($modelArticle->id, true);
            }


            return $this->redirect(['/job/company', 'id' => $model->id]);
        }
        //Init region data
        $dataDistrict = District::getDistricts($model->city_id);
        $dataWard = Ward::getWards($model->district_id);

        return $this->render('update', [
            'model' => $model,
            'cities' => City::find()->orderBy('priority desc')->all(),
            'dataDistrict' => $dataDistrict,
            'dataWard' => $dataWard,
        ]);
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //Check permission
        throw new ForbiddenHttpException('Bạn không được phép thực hiện tính năng này.');

        //$this->findModel($id)->delete();

        //return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*
     * Check security
     * 1. Owner Model
     * 2. Manager Can access
     * */
    protected function checkSecurity($user_id, $article_id = null)
    {
        $check = true;
        /*Company Role*/
        if (isUserRole()) {
            $userLoginID = Yii::$app->user->id;
            if ($userLoginID != $user_id) {
                $check = false;
            }
        } elseif (!isManager()) {
            $check = false;
        }


        return $check;
    }

    /*
     * Check Member can Create New Ads
     * 1. Owner Model
     * 2. Manager Can access
     * */
    protected function checkAllowCreate($userId)
    {
        $check = true;
        if (!isManager()) {
            $check = false;
        }

        return $check;
    }
}
