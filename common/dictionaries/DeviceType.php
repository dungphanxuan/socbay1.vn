<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

class DeviceType
{
    const ANDROID = 1;
    const IOS = 2;

    public static function all()
    {
        return [
            self::ANDROID => Yii::t('common', 'Android'),
            self::IOS => Yii::t('common', 'Ios'),
        ];
    }

    public static function get($device)
    {
        $all = self::all();

        if (isset($all[$device])) {
            return $all[$device];
        }

        return Yii::t('common', 'Not set');
    }
}