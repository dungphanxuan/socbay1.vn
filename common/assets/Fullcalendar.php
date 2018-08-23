<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/*
 * Class Fullcalendar for Fullcalendar Assets
 * */

class Fullcalendar extends AssetBundle
{
    public $sourcePath = null;
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.min.css'
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js'
    ];

    public $depends = [
        JqueryAsset::class,
        Moment::class
    ];
}
