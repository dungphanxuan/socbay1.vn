<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/4/2018
 * Time: 10:24 AM
 */

namespace common\models\data;

use common\helpers\TimeHelper;
use dungphanxuan\vnlocation\models\City;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class LocationData
{
    /*
     * City Array List
     * @param integer $limit
     * @return array
     * */
    public static function getList($limit = false, $type = 1)
    {
        $query = City::find()
            ->orderBy('priority desc');
        if ($limit) {
            $query->limit($limit);
        }
        $allData = $query->all();
        $dataItem = ArrayHelper::map($allData, 'slug', 'name');

        return $dataItem;
    }

    /*
     * City list by part
     * */
    public static function getPartList($part = 0, $limit = 16)
    {
        //todo cache data
        $offset = $part * $limit;
        $allData = City::find()
            ->orderBy('priority desc')
            ->limit($limit)->offset($offset)
            ->all();
        $dataItem = ArrayHelper::map($allData, 'slug', 'name');

        return $dataItem;
    }

    public static function getCity($id, $type = 1)
    {
        $cacheKey = [
            City::class,
            'ci' . $id
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false) {
            $data = [];
            $query = City::find();
            if ($type == 1) {
                $query->where(['id' => $id]);
            } else {
                $query->where(['slug' => $id]);
            }
            $model = $query->one();

            $data = [];
            if ($model) {
                $data['id'] = $model->id;
                $data['slug'] = $model->slug;
                $data['name'] = $model->name;
                $data['lat'] = $model->lat;
                $data['lng'] = $model->lng;
            }

            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }


        return $data;
    }

    /*
     * List Item City for Menu
     * */
    public static function getCityItemMenu($type = 1)
    {
        $cacheKey = [
            City::class,
            'mi' . $type
        ];
        $data = dataCache()->get($cacheKey);

        if (true) {
            $data = [];
            $modelCity = City::find()->all();

            /** @var City $model */
            foreach ($modelCity as $model) {

                $temp = [];
                $temp['label'] = $model->name;
                $temp['url'] = ['site/index'];

                $data[] = $temp;
            }
            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }


        return $data;
    }
}