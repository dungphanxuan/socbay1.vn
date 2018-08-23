<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class Ionicons extends AssetBundle
{
    public $sourcePath = '@bower/ionicons';
    public $css = [
        'ionicons.min.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
