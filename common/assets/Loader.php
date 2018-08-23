<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 8/2/14
 * Time: 11:40 AM
 */

namespace common\assets;

use yii\web\AssetBundle;

/*
 *  Material Design Lite Assets
 *  Url:
 * */

class Loader extends AssetBundle
{
    //public $sourcePath = '@bower/material-design-lite/dist';
    public $sourcePath = null;
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/loaders.css/0.1.2/loaders.css.min.js'
    ];
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/loaders.css/0.1.2/loaders.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
