<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

class Status
{
    const DELETED = 0;
    const ACTIVE = 1;

    public static function all()
    {
        return [
            self::DELETED => Yii::t('common', 'Deleted'),
            self::ACTIVE  => Yii::t('common', 'Active'),
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