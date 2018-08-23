<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class Jssor extends AssetBundle
{
    public $sourcePath = null;


    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jssor-slider/27.1.0/jssor.slider.min.js'

    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
