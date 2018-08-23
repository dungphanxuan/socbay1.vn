<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

class CompanyType
{
    const REAL_ESTATE = 0;
    const FASHION = 1;

    public static function all()
    {
        return [
            self::REAL_ESTATE => Yii::t('common', 'Male'),
            self::FASHION     => Yii::t('common', 'Female'),
        ];
    }

    public static function get($gender)
    {
        $all = self::all();

        if (isset($all[$gender])) {
            return $all[$gender];
        }

        return Yii::t('common', 'Not set');
    }
}