<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

/*
 * Class DevicesCss
 * Url: https://github.com/picturepan2/devices.css
 * */

class DevicesCss extends AssetBundle
{
    //public $sourcePath = '@bower/bootboxjs';
    public $sourcePath = null;
    public $css = [
        'https://picturepan2.github.io/devices.css/dist/devices.css',
        // 'https://picturepan2.github.io/devices.css/dist/demo.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
