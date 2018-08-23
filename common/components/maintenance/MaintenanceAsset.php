<?php

namespace common\components\maintenance;

use common\assets\FontAwesome;
use yii\web\AssetBundle;

/**
 * Class MaintenanceAsset
 * @package common\components\maintenance
 * @author  Eugene Terentev <eugene@terentev.net>
 */
class MaintenanceAsset extends AssetBundle
{
    public $sourcePath = '@common/components/maintenance/assets/startbootstrap-coming-soon';

    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i',
        'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i',
        'vendor/font-awesome/css/font-awesome.min.css',
        'css/coming-soon.min.css'
    ];

    public $js = [
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/vide/jquery.vide.min.js',
        //'js/coming-soon.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
}
