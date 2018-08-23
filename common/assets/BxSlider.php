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
 * Class BxSlider
 * Url: http://bxslider.com
 * */

class BxSlider extends AssetBundle
{
    public $sourcePath = '@bower/bxslider';

    public $css = [
        'jquery.bxslider.min.css'
    ];

    public $js = [
        'jquery.bxslider.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
