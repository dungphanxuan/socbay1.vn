<?php

namespace frontend\controllers;

use common\dictionaries\AdsType;
use common\models\Article;
use common\models\property\Project;
use dungphanxuan\vnlocation\models\City;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;
use Yii;

/*
 * Class PropertyController
 *
 * */

class PropertyController extends FrontendController
{

    public function init()
    {
        $this->site_id = AdsType::PROPERTY;
        parent::init();
    }

    public function actionIndex()
    {
        $query = Project::find();

        $getCity = getParam('city', null);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionList()
    {
        return $this->render('list');
    }

    public function actionProject()
    {
        $query = Project::find()
            ->with('projectAttachments', 'city')
            ->orderBy('id desc');

        $getCityName = getParam('name', null);
        $getCityId = getParam('id', null);

        /** @var City $modelCity */
        $modelCity = City::find()->where(['id' => $getCityId])->one();
        $activeIndex = 1;
        if ($modelCity) {
            $cityId = $modelCity->id;
            $query->andWhere(['city_id' => $cityId]);
            switch ($cityId) {
                case 2:
                    $activeIndex = 2;
                    break;
                case 3:
                    $activeIndex = 3;
                    break;
                case 65:
                    $activeIndex = 4;
                    break;
                default:
                    $activeIndex = 1;
            }
        }

        $pageSize = \Yii::$app->keyStorage->get('frontend.project-size', 9);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => $pageSize,
            ],
        ]);


        // $a = $dataProvider->getPagination()->getPageSize();
        //dd($a);

        return $this->render('project', [
            'dataProvider' => $dataProvider,
            'activeIndex' => $activeIndex,
            'modelCity' => $modelCity
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */

    public function actionProjectView($id)
    {
        $model = Project::find()
            //->published()
            ->andWhere(['id' => $id])->one();
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('common', 'Article Not Found'));
        }
        //dd($model->projectAttachments);

        // normalize slug URL
        $slug = Yii::$app->request->get('name');
        if ($model->slug !== (string)$slug) {
            return $this->redirect(['news/view', 'id' => $model->id, 'name' => $model->slug], 301);
        }

        $queryPickup = Project::find()
            ->andWhere(['not in', 'id', [$model->id]])
            ->limit(2);
        $providerPickup = new ActiveDataProvider([
            'query' => $queryPickup,
            'pagination' => false,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);


        return $this->render('project-view', [
            'model' => $model,
            'providerPickup' => $providerPickup
        ]);
    }

    public function actionEvent()
    {
        $queryBlog = Article::find()
            ->orderBy('id asc');

        $pageSize = 5;
        $dataProvider = new ActiveDataProvider([
            'query' => $queryBlog,
            'pagination' => [
                'defaultPageSize' => $pageSize,
            ],
        ]);

        return $this->render('event', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionEventView($id)
    {
        $model = Article::find()
            ->andWhere(['id' => $id])->one();

        if (!$model) {
            throw new NotFoundHttpException(\Yii::t('common', 'Article Not Found'));
        }

        // normalize slug URL
        $slug = Yii::$app->request->get('name');
        if ($model->slug !== (string)$slug) {
            return $this->redirect(['news/view', 'id' => $model->id, 'name' => $model->slug], 301);
        }

        $queryPopular = Article::find()
            ->andWhere(['not in', 'id', [$model->id]])
            ->orderBy('id asc')
            ->limit(7);

        $dataPopularProvider = new ActiveDataProvider([
            'query' => $queryPopular,
            'pagination' => false,
        ]);

        return $this->render('event-view', [
            'model' => $model,
            'dataPopularProvider' => $dataPopularProvider
        ]);

    }

    public function actionEventJoin()
    {
        return $this->render('broker');
    }

    public function actionBroker()
    {
        return $this->render('broker');
    }

    public function actionFeed()
    {
        return $this->render('feed');
    }

}
