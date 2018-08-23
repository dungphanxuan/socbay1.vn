<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/2/2018
 * Time: 10:56 AM
 */

namespace common\assets;

use yii\web\AssetBundle;

/*
 * Class Uppy
 * Url: https://github.com/transloadit/uppy
 * */

class Uppy extends AssetBundle
{
    public $sourcePath = null;
    public $css = [
        'https://unpkg.com/uppy/dist/uppy.min.css'
    ];
    public $js = [
        'https://unpkg.com/uppy'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}