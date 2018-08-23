<?php

namespace common\helpers;


/**
 * Collection of useful helper functions for Yii Applications
 *
 * @author dungphanxuan <dungphanxuan999@gmail.com>
 *
 */
class DataHelper
{
    /*
     * Video Category data
     * */
    public static function getDataCache($update = false)
    {
        $key = CACHE_MEDIA_VIEW;
        $data = dataCache()->get($key);
        if ($data === false) {
            dataCache()->set($key, time(), TimeHelper::SECONDS_IN_AN_HOUR);
        }

        return $data;
    }
}