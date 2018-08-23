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
 * https://github.com/sachinchoolur/lightgallery.js
 * */

class LightGallery extends AssetBundle
{
    public $sourcePath = '@bower/lightgallery.js/dist';
    public $css = [
        'css/lightgallery.css'
    ];
    public $js = [
        'js/lightgallery.js'
    ];
}
