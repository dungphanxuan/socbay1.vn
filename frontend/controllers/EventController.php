<?php

namespace frontend\controllers;

use common\dictionaries\AdsType;
use common\models\Article;
use common\models\ArticleCategory;
use common\models\job\Company;
use common\models\job\EventCategory;
use common\models\job\JobCategory;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\queue\closure\Job;

/*
 * Class EventController
 * */

class EventController extends FrontendController
{
    public function init()
    {
        $this->site_id = AdsType::EVENT;
        parent::init();
    }

    public function actionIndex()
    {
        /** @var ArticleCategory $modelEventCat */
        $modelEventCat = ArticleCategory::find()->where(['type' => AdsType::EVENT])->one();

        //List all Job category
        //Todo filter where category has job
        $updateCache = false;
        $dataEventCat = JobCategory::getListCat(null, $updateCache);


        $queryCompany = Company::find()
            ->orderBy('id asc');

        $dataCompanyProvider = new ActiveDataProvider([
            'query' => $queryCompany,
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        $queryEventFeature = Article::find()
            ->published()
            ->andWhere(['category_id' => $modelEventCat->id])
            ->orderBy('id desc')->limit(4);

        $queryEvent = Article::find()
            ->published()
            ->andWhere(['category_id' => $modelEventCat->id])
            ->orderBy('id desc');

        $dataEventFeatureProvider = new ActiveDataProvider([
            'query' => $queryEventFeature,
            'pagination' => false,
        ]);

        $dataEventProvider = new ActiveDataProvider([
            'query' => $queryEvent,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        $providerEventCat = new ArrayDataProvider([
            'allModels' => $dataEventCat,
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => [
                'attributes' => ['id', 'title'],
            ],
        ]);
        return $this->render('index', [
            'modelEventCat' => $modelEventCat,
            'providerEventCat' => $providerEventCat,
            'dataEventProvider' => $dataEventProvider,
            'dataEventFeatureProvider' => $dataEventFeatureProvider,
            'dataCompanyProvider' => $dataCompanyProvider
        ]);
    }

    public function actionAddress()
    {
        return $this->render('address');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionFeature()
    {
        return $this->render('feature');
    }

    public function actionPartner()
    {
        return $this->render('partner');
    }

    public function actionSchedule()
    {
        return $this->render('schedule');
    }

    public function actionSession()
    {
        return $this->render('session');
    }

    public function actionSponsor()
    {
        return $this->render('sponsor');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
