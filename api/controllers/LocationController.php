<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use api\components\TwoFactorAuth;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\GoRegion;
use dungphanxuan\vnlocation\models\Ward;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\db\Query;
use yii\data\ArrayDataProvider;

class LocationController extends ApiController
{

    public function actionRegion()
    {
        $this->msg = 'Location Region';

        $query = GoRegion::find()->asArray();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => ['id'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $posts = $provider->getModels();
        $this->data = $posts;
    }

    /*
     * City API
     * */
    public function actionCity()
    {
        $this->msg = 'Location City';

        $getType = getParam('type', null);
        $query = City::find()
            ->asArray();
        if ($getType == 1) {
            $query->select(['id', 'name']);
        }
        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => ['id'],
            ],
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        $posts = $provider->getModels();
        $this->data = [
            'total' => $provider->getTotalCount(),
            'count' => $provider->getCount(),
            'page' => $provider->getPagination()->page,
            'city' => $posts
        ];
    }

    /**
     * Get Article Detail
     *
     * @param integer $id Article ID
     *
     * @return array Article detail
     */
    public function actionCityView()
    {
        $getId = getParam('id', null);
        $getType = getParam('type', null);
        if ($getId) {
            $query = City::find()->where(['id' => $getId]);
            $model = $query->asArray()->one();
            if ($model) {
                $data = $model;
                $this->msg = 'City detail';
                $this->data = $data;
            } else {
                $this->code = 404;
                $this->msg = 'City Not Found';
            }

        } else {
            $this->code = 422;
            $this->msg = 'Missing City ID ';
        }
    }

    /*
     * District API
     * */
    public function actionDistrict()
    {
        $this->msg = 'Location District';

        $getType = getParam('type', null);
        $getCity = getParam('city_id', 2);

        $cityModel = City::find()->where(['id' => $getCity])->one();

        if ($cityModel) {
            $query = District::find()
                ->where(['city_id' => $getCity])
                ->asArray();
            if ($getType == 1) {
                $query->select(['id', 'name', 'full_name']);
            }
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => [
                    'attributes' => ['id'],
                ],
                'pagination' => [
                    'pageSize' => 15,
                ],
            ]);
            $posts = $provider->getModels();
            $this->data = [
                'total' => $provider->getTotalCount(),
                'count' => $provider->getCount(),
                'page' => $provider->getPagination()->page,
                'city' => $cityModel,
                'district' => $posts
            ];
        } else {
            $this->code = 422;
            $this->msg = 'Missing City Info ';
        }

    }

    /*
     * Ward API
     * */
    public function actionWard()
    {
        $this->msg = 'Location City';

        $getType = getParam('type', null);
        $getDistrict = getParam('district_id', null);
        $districtModel = District::find()->where(['id' => $getDistrict])->one();

        if ($getDistrict && $districtModel) {
            $query = Ward::find()
                ->where(['district_id' => $getDistrict])
                ->asArray();

            if ($getType == 1) {
                $query->select(['id', 'name', 'fullname']);
            }
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => [
                    'attributes' => ['id'],
                ],
                'pagination' => [
                    'pageSize' => 15,
                ],
            ]);
            $posts = $provider->getModels();
            $this->data = [
                'total' => $provider->getTotalCount(),
                'count' => $provider->getCount(),
                'page' => $provider->getPagination()->page,
                'district' => $districtModel,
                'ward' => $posts
            ];
        } else {
            $this->code = 422;
            $this->msg = 'Missing District Info ';
        }

    }

}
