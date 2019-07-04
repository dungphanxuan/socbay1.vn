<?php

namespace frontend\controllers;

use common\commands\AddToTimelineCommand;
use common\dictionaries\AdsType;
use common\helpers\ArticleHelper;
use common\models\Article;
use common\models\ArticleAttachment;
use common\models\ArticleCategory;
use common\models\ArticleDetail;
use common\models\data\LocationData;
use common\models\FileStorageItem;
use common\models\job\Company;
use common\models\job\JobCategory;
use common\models\job\JobType;
use common\models\system\Star;
use common\models\User;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use frontend\models\search\ArticleSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use frontend\helpers\DataHelper;

class AdsController extends FrontendController
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
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /* 'modelAccess' => [
                 'class' => OwnModelAccessFilter::class,
                 'only'  => ['view', 'update', 'delete'],

                 'modelCreatedByAttribute' => 'created_by',
                 'modelClass'              => Article::class
             ],*/
        ]);
    }

    /*
     * Ads List
     * @param string $cslug
     * */
    public function actionIndex($cslug = null, $csubslug = null)
    {
        //Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

        $searchModel = new ArticleSearch();
        $params = Yii::$app->request->queryParams;

        //Filter condition
        $cid = null;
        $category_id = null;
        $sub_cid = null;
        $catModel = null;
        if ($cslug) {
            $catModel = ArticleCategory::find()->andWhere(['slug' => $cslug])->one();
            if ($catModel) {
                $cid = $catModel->type;
                $category_id = $catModel->id;
                $params['ArticleSearch']['category_id'] = $catModel->id;
            } else {
                throw new NotFoundHttpException(Yii::t('common', 'Category Not Found'));
            }

        }
        //Get Filter
        $getTitle = getParam('title', null);
        if ($getTitle) {
            $params['ArticleSearch']['title'] = $getTitle;
        }

        $getCategorySearch = getParam('category', null);
        if ($getCategorySearch) {
            /** @var ArticleCategory $catData */
            $catData = ArticleCategory::find()->where(['slug' => $getCategorySearch])->one();
            if ($catData) {
                $params['ArticleSearch']['category_id'] = $catData->id;
            }
        }
        $getLocationCity = getParam('location', null);
        if ($getLocationCity) {
            /** @var City $cityModel */
            $cityData = LocationData::getCity($getLocationCity, 2);
            if ($cityData) {
                $params['ArticleSearch']['city_id'] = $cityData['id'];
            }
        }

        $dataProvider = $searchModel->search(null);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];

        $dataProvider->pagination = [
            'pageSize' => 3
        ];


        $view = 'index';
        $providerJobCat = null;
        switch ($cid) {
            case 1:
                //$view = '@frontend/views/job/list';
                break;
            case AdsType::MOBILE:
                //$view = '@frontend/views/mobile/index';
                break;

            case AdsType::PROPERTY:
                $this->site_id = AdsType::PROPERTY;
                $view = '@frontend/views/property/index';
                break;
            case AdsType::AUTO:
                //$view = '@frontend/views/auto/index';
                break;
            case AdsType::FASHION:
                //$view = '@frontend/views/fashion/index';
                break;
            case AdsType::EVENT:
                $this->site_id = AdsType::EVENT;
                $view = '@frontend/views/event/category';
                break;
            case AdsType::JOB:
                $this->site_id = AdsType::JOB;
                $view = '@frontend/views/job/list';
                $dataJobCat = JobCategory::getListCat();
                $providerJobCat = new ArrayDataProvider([
                    'allModels' => $dataJobCat,
                    'pagination' => [
                        'pageSize' => 15,
                    ],
                    'sort' => [
                        'attributes' => ['id', 'title'],
                    ],
                ]);
                break;
            default:
                //$this->site_id = AdsType::PROPERTY;
                //$view = '@frontend/views/property/index';
                $view = 'index';
        }

        //$view = 'index';
        //dd($view);

        //TODO: Set site_id

        return $this->render($view, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'cid' => $cid,
            'category_id' => $category_id,
            'catModel' => $catModel,
            'category_svalue' => $getCategorySearch,
            'sub_cid' => $sub_cid,
            'providerJobCat' => $providerJobCat,
        ]);
    }

    /*
     * Create Ads
     * */
    public function actionCreate($type = 1)
    {
        $model = new Article();
        $modelDetail = new ArticleDetail();

        //Check Security
        $userId = Yii::$app->user->id;
        if (!$this->checkAllowCreate($userId)) {
            throw new ForbiddenHttpException(Yii::t('common', 'You are not allowed to perform this operation!'));
        }
        $getType = getParam('type', null);

        $categories = ArticleCategory::find()->rootCategory()->all();
        $jobTypes = JobType::find()->all();
        $jobCategories = JobCategory::getAllArray();

        // dd($jobCategories);

        $dataDistrict = [];
        $dataWard = [];
        $dataSubCategory = [];
        $article_type = 1;
        if ($model->load(Yii::$app->request->post())) {

            //Todo Article Detail
            $modelDetail->load(Yii::$app->request->post());

            $model->status = Article::STATUS_PENDING_APPROVAL;
            //TODO Public Article
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('show', 1); //Show success flash
                Star::castStar($model, Yii::$app->user->id, 1);
                $modelDetail->article_id = $model->id;
                $modelDetail->save(false);
                Yii::$app->commandBus->handle(new AddToTimelineCommand([
                    'category' => 'article',
                    'event' => 'item',
                    'data' => [
                        'title' => $model->title,
                        'article_id' => $model->id,
                        'created_at' => $model->created_at
                    ]
                ]));
                return $this->redirect(['/account/ads', 'show' => 1]);
            }
            /* else {
                 dd($model->getErrors());
             }*/
        } else {
            Yii::warning('Ads Create Access', 'ads');
        }
        //Proccess Input
        $id = getParam('id', null);
        //Copy data
        if ($id) {
            /** @var Article $eModel */
            $eModel = Article::find()->published()->where(['id' => $id])->one();
            if ($eModel) {
                //Copy Action
                $model->copyModel($id);

                $dataDistrict = District::getDistricts($model->city_id);
                $dataWard = Ward::getWards($model->district_id);
                $dataSubCategory = ArticleCategory::getSubCategory($model->category_id);

            } else {
                throw new NotFoundHttpException('Article does not exist.');
            }
        }

        //$modelCity = City::find()->orderBy('priority desc')->one();
        if (Yii::$app->request->isGet) {
            $model->city_id = 2;//HaNoi
            $model->status = 1;
            $model->public_flg = 0;
        }

        $viewForm = 'create';
        $modelCategory = ArticleCategory::find()->one();
        switch ($getType) {
            case 'job':
                $modelCategory = ArticleCategory::find()->where(['type' => AdsType::JOB])->one();
                $model->category_id = $modelCategory->id;
                $viewForm = 'form/_job_create';
                $this->layout = 'main'; //b4 Layout
                $this->site_id = AdsType::JOB;
                $modelCompany = Company::find()->where(['user_id' => getMyId()])->one();
                if ($modelCompany) {
                    $model->company_name = $modelCompany->title;
                    $modelDetail->job_company_id = $modelCompany->id;
                }

                break;
        }

        return $this->render($viewForm, [
            'model' => $model,
            'modelDetail' => $modelDetail,
            'modelCategory' => $modelCategory,
            'type' => $type,
            'categories' => $categories,
            'article_type' => $article_type,
            'cities' => City::find()->orderBy('priority desc')->all(),
            'dataDistrict' => $dataDistrict,
            'dataWard' => $dataWard,
            'dataSubCat' => $dataSubCategory,
            'jobTypes' => $jobTypes,
            'jobCategories' => $jobCategories
        ]);

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
        $modelDetail = $model->detail;
        if (!$modelDetail) {
            $modelDetail = new ArticleDetail();
            $modelDetail->article_id = $model->id;
            $modelDetail->save();
        }


        //Check Security
        if (!$this->checkSecurity($model->created_by, $model->id)) {
            throw new ForbiddenHttpException(Yii::t('common', 'You are not allowed to perform this operation!'));
        }

        $article_type = 1;
        $dataDistrict = [];
        $dataWard = [];
        $dataSubCategory = [];

        //$isUpdate = Yii::$app->user->can('editOwnModel', ['model' => $model]);

        $jobTypes = JobType::find()->all();
        $jobCategories = JobCategory::getAllArray();

        //dd($model->thumbnail);
        //dd($_POST);
        if ($model->load(Yii::$app->request->post())) {

            //dd($model->public_from);
            //dd($model->attributes);

            $model->body = iconv(mb_detect_encoding($model->body, mb_detect_order(), true), "UTF-8", $model->body);

            //Todo Article Detail
            $modelDetail->load(Yii::$app->request->post());
            //Model switch status
            if ($model->status = Article::STATUS_PUBLISHED) {
                //$model->status = Article::STATUS_PENDING_APPROVAL;
            }
            if ($model->save()) {
                //dd($model->public_from);
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => 'Cập nhật thành công',
                    'options' => ['class' => 'alert-success']
                ]);

                $modelDetail->save(false);

                Yii::$app->getSession()->setFlash('show', 1); //Show success flash
                ArticleHelper::getDetail($model->id, true);
                //Star::castStar($model, Yii::$app->user->id, 1);
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
                return $this->redirect(['/account/ads', 'show' => 1]);
            }
        }

        //Init region data
        $dataDistrict = District::getDistricts($model->city_id);
        $dataWard = Ward::getWards($model->district_id);
        $dataSubCategory = ArticleCategory::getSubCategory($model->category_id);

        //dd($dataSubCategory);

        $viewForm = 'update';
        $modelCategory = ArticleCategory::find()->one();
        $modelJobCategory = ArticleCategory::find()->andWhere(['type' => AdsType::JOB])->one();
        switch ($model->category_id) {
            case $modelJobCategory->id:
                $jobCat = ArticleCategory::find()->where(['type' => AdsType::JOB])->one();
                $model->category_id = $jobCat->id;
                $model->company_name = $modelDetail->company ? $modelDetail->company->title : '';
                $viewForm = 'form/_job_update';
                $this->layout = 'main';
                $this->site_id = AdsType::JOB;
                $modelCategory = $modelJobCategory;

                $modelCompany = Company::find()->where(['user_id' => getMyId()])->one();
                if ($modelCompany) {
                    $model->company_name = $modelCompany->title;
                }
                break;
        }

        //dd($model->lat);

        return $this->render($viewForm, [
            'model' => $model,
            'modelDetail' => $modelDetail,
            'modelCategory' => $modelCategory,
            'article_type' => $article_type,
            'categories' => ArticleCategory::find()->rootCategory()->all(),
            'cities' => City::find()->orderBy('priority desc')->all(),
            'dataDistrict' => $dataDistrict,
            'dataWard' => $dataWard,
            'dataSubCat' => $dataSubCategory,
            'jobTypes' => $jobTypes,
            'jobCategories' => $jobCategories
        ]);
    }

    public function actionRefresh($id)
    {

    }

    public function actionCheck()
    {
        $userId = Yii::$app->user->id;

    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPreview($id)
    {
        $project = $this->findModel([
            'id' => $id,
        ]);

        return $this->render('preview', [
            'model' => $project,
        ]);
    }

    /**
     * @param int $id
     * @return Response
     * @throws ForbiddenHttpException
     * @throws NotFoundHttpException
     */
    public function actionPublish($id)
    {
        $project = $this->findModel(['id' => $id]);

        if (!UserPermissions::canManageProject($project)) {
            throw new ForbiddenHttpException(Yii::t('project', 'You can not update this project.'));
        }

        $session = Yii::$app->session;

        if ($project->publish()) {
            $session->setFlash('success', Yii::t('project', 'Project added!'));
        } else {
            $session->setFlash('error', Yii::t('project', 'Failed to update project.'));
            if ($project->hasErrors()) {
                $session->addFlash('error', Html::errorSummary($project, ['showAllErrors' => true]));
            }
        }

        return $this->redirect(['view', 'id' => $project->id, 'slug' => $project->slug]);
    }

    /**
     * @param int $id
     *
     * @return Response
     * @throws ForbiddenHttpException
     * @throws NotFoundHttpException
     */
    public function actionDraft($id)
    {
        $project = $this->findModel(['id' => $id]);

        if (!UserPermissions::canManageProject($project)) {
            throw new ForbiddenHttpException(Yii::t('project', 'You can not update this project.'));
        }

        $session = Yii::$app->session;

        if ($project->draft()) {
            $session->setFlash('success', Yii::t('project', 'The project has been moved to draft.'));
        } else {
            $session->setFlash('error', Yii::t('project', 'Failed to update project.'));
            if ($project->hasErrors()) {
                $session->addFlash('error', Html::errorSummary($project, ['showAllErrors' => true]));
            }
        }

        return $this->redirect(['view', 'id' => $project->id, 'slug' => $project->slug]);
    }

    /**
     * Delete project by ID.
     *
     * @param int $id
     *
     * @return Response
     * @throws ForbiddenHttpException
     * @throws NotFoundHttpException
     */
    public function actionDeleteArticle($id)
    {
        $project = $this->findModel(['id' => $id]);

        if (!UserPermissions::canManageProject($project)) {
            throw new ForbiddenHttpException(Yii::t('project', 'You can not delete this project.'));
        }

        $session = Yii::$app->session;

        if ($project->remove()) {
            $session->setFlash('success', Yii::t('project', 'Project deleted.'));

            if (in_array(Yii::$app->user->id, array_column($project->users, 'id'))) {
                return $this->redirect(['/user/view', 'id' => Yii::$app->user->id]);
            }

            return $this->redirect('list');
        }

        $session->setFlash('error', Yii::t('project', 'Failed to delete project.'));
        if ($project->hasErrors()) {
            $session->addFlash('error', Html::errorSummary($project, ['showAllErrors' => true]));
        }

        return $this->redirect(['view', 'id' => $project->id, 'slug' => $project->slug]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        //Yii::debug("Action Pro");
        //Yii::$app->getAssetManager()->bundles['yii\web\JqueryAsset'] = ['js' => ['http://code.jquery.com/jquery.js']];

        $model = Article::find()
            //->published()
            ->andWhere(['id' => $id])->one();
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('common', 'Article Not Found'));
        }
        //Only show for user
        $userId = Yii::$app->user->id;
        if ($model->status != Article::STATUS_PUBLISHED && $model->created_by != $userId) {
            throw new NotFoundHttpException(Yii::t('common', 'Article Not Publishing'));
        }

        // normalize slug URL
        $slug = Yii::$app->request->get('name');
        if ($model->slug !== (string)$slug) {
            return $this->redirect(['ads/view', 'id' => $model->id, 'name' => $model->slug], 301);
        }
        // update view count
        if (Yii::$app->request->isGet && $model->created_by != $userId) {
            //Check Spam
            if (DataHelper::getActiveView($id)) {
                $model->updateCounters(['view_count' => 1]);
            }
        }
        //todo update Ads Status

        $viewFile = $model->view ?: 'view';
        $modelCompany = null;
        $catModel = ArticleCategory::find()->where(['id' => $model->category_id])->one();
        switch ($catModel->type) {
            case 1:
                //$viewFile = '@frontend/views/job/view';
                break;
            case AdsType::PROPERTY:
                //$viewFile = '@frontend/views/property/view';
                break;
            case AdsType::AUTO:
                //$viewFile = '@frontend/views/auto/view';
                break;
            case AdsType::EVENT:
                $this->site_id = AdsType::EVENT;
                $viewFile = '@frontend/views/event/view';
                break;
            case AdsType::JOB:
                $viewFile = '@frontend/views/job/view';
                $this->site_id = AdsType::JOB;
                $modelCompany = Company::find()->where(['id' => $model->detail->job_company_id])->one();
                break;
            default:
                $viewFile = 'view';
        }
        $modelDetail = $model->detail;
        //$viewFile = $model->view ?: 'view';

        //dd($model->attributes);

        //dd($model->getFullAddress());
        //dd($modelCompany);
        return $this->render($viewFile, [
            'model' => $model,
            'modelDetail' => $modelDetail,
            'catModel' => $catModel,
            'modelCompany' => $modelCompany
        ]);
    }

    public function actionPostingSuccess()
    {
        return $this->render('posting-success');
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

        //Check Security
        if (!$this->checkSecurity($model->created_by)) {
            throw new ForbiddenHttpException(Yii::t('common', 'You are not allowed to perform this operation!'));
        }

        $model->status = Article::STATUS_DELETED;
        $model->save();
        Yii::$app->getSession()->setFlash('alert', [
            'body' => 'Xóa Bài viết thành công',
            'options' => ['class' => 'alert-warning']
        ]);

        return $this->redirect(['index']);
    }

    /*
    **
    * @param $id
    * @return $this
    * @throws NotFoundHttpException
    * @throws \yii\web\HttpException
    */
    public function actionAttachmentDownload($id)
    {
        $model = ArticleAttachment::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }

        return Yii::$app->response->sendStreamAsFile(
            Yii::$app->fileStorage->getFilesystem()->readStream($model->path),
            $model->name
        );
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
            throw new NotFoundHttpException(Yii::t('common', 'Article Not Found'));
        }
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
        } elseif (!isAdministrator()) {
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
        $model = User::find()->where(['id' => $userId])->one();
        if ($model->status != User::STATUS_ACTIVE) {
            $check = false;
        }
        //Check File Upload
        $totalFile = FileStorageItem::find()->where(['created_by' => $userId])->count() ?: 0;
        $totalSize = FileStorageItem::find()->where(['created_by' => $userId])->sum('size') ?: 0;

        $maxFile = 300;
        if ($totalFile > $maxFile) {
            $check = false;
        }
        //Limit article item
        $totalArticle = Article::find()->where(['created_by' => $userId])->count();
        if ($totalArticle > 30) {
            $check = false;
        }

        return $check;
    }

}
