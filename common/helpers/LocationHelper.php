<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 4/24/2017
 * Time: 9:07 AM
 */

namespace common\helpers;

use dungphanxuan\vnlocation\models\City;

/*
 * Class LocationHelper
 * */

class LocationHelper
{
    /**
     * Wrapper for location data.
     *
     * @param $password
     *
     * @return array
     */
    public static function getAllCity($update = false)
    {
        $dataCity = [];
        $allModel = City::find()->orderBy('priority desc')->all();
        /** @var City $item */
        foreach ($allModel as $key => $item) {
            $temp = [];
            $temp['id'] = $item->id;
            $temp['name'] = $item->name;
            $dataCity[] = $temp;
        }

        return $dataCity;
    }

}