<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

/*
 * Class ImageSource
 * */

class ImageSource
{
    const STORAGE = 1;
    const GOOGLE_CLOUD = 2;
    const FILESTACK = 3;
    const S3 = 4;
    const SERVICE = 5;

    public static function all()
    {
        return [
            self::STORAGE      => Yii::t('common', 'Storage'),
            self::GOOGLE_CLOUD => Yii::t('common', 'Cloud Storage'),
            self::FILESTACK    => Yii::t('common', 'Filestack'),
            self::S3           => Yii::t('common', 'S3'),
            self::SERVICE      => Yii::t('common', 'Service'),
        ];
    }

    public static function get($source)
    {
        $all = self::all();

        if (isset($all[$source])) {
            return $all[$source];
        }

        return Yii::t('common', 'Not set');
    }
}