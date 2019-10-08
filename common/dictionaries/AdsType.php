<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

class AdsType
{
    const ADS = 1;
    const MOBILE = 2;
    const PROPERTY = 3;
    const JOB = 4;
    const AUTO = 5;
    const FASHION = 6;
    const HOME = 6;
    const KID = 7;
    const ELECTRONIC = 8;
    const BOOK = 9;
    const FOOD = 10;
    const ONLINE = 11;
    const EVENT = 12;

    public static function all()
    {
        return [
            self::ADS => Yii::t('common', 'Ads'),
            self::MOBILE => Yii::t('common', 'Mobile'),
            self::PROPERTY => Yii::t('common', 'Property'),
            self::JOB => Yii::t('common', 'Job'),
            self::AUTO => Yii::t('common', 'Auto'),
            self::FASHION => Yii::t('common', 'Fashion'),
            self::KID => Yii::t('common', 'Kid'),
            self::ELECTRONIC => Yii::t('common', 'Electronic'),
            self::FOOD => Yii::t('common', 'Food'),
            self::BOOK => Yii::t('common', 'Book'),
            self::ONLINE => Yii::t('common', 'Online'),
            self::EVENT => Yii::t('common', 'Event'),
        ];
    }

    public static function get($gender)
    {
        $all = self::all();

        if (isset($all[$gender])) {
            return $all[$gender];
        }

        return Yii::t('common', 'Type not set');
    }
}