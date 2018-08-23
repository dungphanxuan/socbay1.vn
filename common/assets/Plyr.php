<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class Plyr extends AssetBundle
{
    public $sourcePath = null;
    public $baseUrl = 'https://cdn.plyr.io/3.1.0/';

    // public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $css = [
        'plyr.css'
    ];

    public $js = [
        'plyr.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
