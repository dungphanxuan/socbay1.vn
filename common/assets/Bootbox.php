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
 * Class Bootbox
 * Url: http://bootboxjs.com/
 * */

class Bootbox extends AssetBundle
{
    //public $sourcePath = '@bower/bootboxjs';
    public $sourcePath = null;
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
