<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

class Gender
{
    const FEMALE = 0;
    const MALE = 1;

    public static function all()
    {
        return [
            self::MALE => Yii::t('common', 'Male'),
            self::FEMALE => Yii::t('common', 'Female'),
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