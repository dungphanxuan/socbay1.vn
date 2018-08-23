<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 5/17/2018
 * Time: 3:31 PM
 */

namespace frontend\helpers;

use common\helpers\TimeHelper;

class DataHelper
{

    /*
     * Active Update Article View Count
     * */
    public static function getActiveView($id)
    {
        $cacheKey = FRONTEND_ACTIVE_VIEW . $id;
        $data = dataCache()->get($cacheKey);

        if ($data === false) {
            $data = [];
            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_MINUTE);
            return true;
        }

        return false;
    }
}