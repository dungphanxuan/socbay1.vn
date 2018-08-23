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

class LightSlider extends AssetBundle
{
    public $sourcePath = null;
    public $baseUrl = 'https://cdn.jsdelivr.net/npm/lightgallery@1.2.19/dist/';

    public $css = [
        'css/lightgallery.css'
    ];

    public $js = [
        'js/lightgallery.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
