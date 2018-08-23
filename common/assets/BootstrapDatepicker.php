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
 * Class BootstrapDatepicker
 * Url: http://bootboxjs.com/
 * */

class BootstrapDatepicker extends AssetBundle
{
    //public $sourcePath = '@bower/bootboxjs';
    public $sourcePath = null;
    public $baseUrl = 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/';
    public $css = [
        'css/bootstrap-datepicker.css'
    ];
    public $js = [
        'js/bootstrap-datepicker.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
