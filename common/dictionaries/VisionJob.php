<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

class VisionJob
{
    const ARTICLE = 1;
    const FILE = 2;

    public static function all()
    {
        return [
            self::ARTICLE => Yii::t('common', 'Article'),
            self::FILE => Yii::t('common', 'File'),
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