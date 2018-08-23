<?php

namespace frontend\controllers;

use common\dictionaries\AdsType;
use common\models\Article;
use common\models\ArticleCategory;
use common\models\job\Company;
use common\models\job\CompanySearch;
use common\models\job\JobCategory;
use yii\data\ActiveDataProvider;
use Yii;
use yii\data\ArrayDataProvider;

class JobController extends FrontendController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only'  => ['create', 'update', 'company-search', 'data-search'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                    // everything else is denied
                ],
            ],
        ];
    }
    public function init()
    {
        $this->site_id = AdsType::JOB;
        parent::init();
    }

    public function actionIndex()
    {
        /** @var ArticleCategory $modelJobCat */
        $modelJobCat = ArticleCategory::find()->where(['type' => AdsType::JOB])->one();

        //List all Job category
        //Todo filter where category has job
        $updateCache = false;
        $dataJobCat = JobCategory::getListCat(null, $updateCache);


        $queryCompany = Company::find()
            ->orderBy('id asc');

        $dataCompanyProvider = new ActiveDataProvider([
            'query'      => $queryCompany,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        $queryJob = Article::find()
            ->published()
            ->andWhere(['category_id' => $modelJobCat->id])
            ->orderBy('id desc');

        $dataJobProvider = new ActiveDataProvider([
            'query'      => $queryJob,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        $providerJobCat = new ArrayDataProvider([
            'allModels'  => $dataJobCat,
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort'       => [
                'attributes' => ['id', 'title'],
            ],
        ]);
        return $this->render('index', [
            'modelJobCat'         => $modelJobCat,
            'providerJobCat'      => $providerJobCat,
            'dataJobProvider'     => $dataJobProvider,
            'dataCompanyProvider' => $dataCompanyProvider
        ]);
    }


    public function actionCompany()
    {
        return $this->render('company');
    }

    public function actionCompanyProfile($id)
    {
        return $this->render('company');
    }


    public function actionCreate()
    {
        $this->layout = 'main3';

        return $this->render('create');
    }


    public function actionAddCv()
    {
        return $this->render('add-cv');
    }

    public function actionResume()
    {
        return $this->render('resume');
    }

    public function actionSignup()
    {
        return $this->render('signup');
    }

    public function actionView()
    {
        $view = 'view';
        return $this->render($view);
    }


    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionCompanySearch()
    {
        $layoutType = getParam('popup', null);
        if ($layoutType) {
            $this->layout = 'popup';
        }

        $searchModel = new CompanySearch();
        $params = Yii::$app->request->queryParams;
        // php_dump($params);

        $dataProvider = $searchModel->search($params);

        return $this->render('company-search', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /*
     * Company Search Form
     * */
    public function actionDataSearch()
    {
        $this->layout = 'popup';
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('company-datasearch', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
