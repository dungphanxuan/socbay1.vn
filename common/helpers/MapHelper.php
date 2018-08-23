<?php

namespace common\helpers;

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/11/2016
 * Time: 11:30 AM
 */
use yii\helpers\Inflector;


class MapHelper extends Inflector
{
    /*
     * Check Url is youtube Url
     * */
    public static function getLocationbyAddress($address)
    {
        $curl = new CurlHelper();

        $gKey = self::getKey();
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=false&key=' . $gKey;
        $response = $curl->get($url);
        $data = json_decode($response);

        //var_dump($address);
        //dd($data);
        $item = array();
        if ($data->status == 'OK') {
            $item = $data->results[0]->geometry->location;
        } else {
            //var_dump( $data );
            //dd( $data );
            if ($data->status != 'ZERO_RESULTS') {
                //dd( $data );
            }

        }
        //dd($data);

        //dd($item);

        return $item;
    }


    /*
     * Get google map api key
     * */
    public static function getKey()
    {
        //$gKey = Yii::$app->params['gmapApiKey'];
        //Dungpx.s
        //$gKey = 'AIzaSyDdxzf8mvkx1CBsfAzjuAQdwQ24cgL8HN0';
        //HoaHoVan Key
        //$gKey =  'AIzaSyAB-PZHxSzK1F0SAe8eL1nGNBwGPq8tcbE';
        //HungLv Key
        $gKey = 'AIzaSyAdOn3-jXAu5sbHTwIanoK5i25fauAwZfo';

        return $gKey;
    }
}