<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\FontAwesome;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;
use common\assets\Html5shiv;

/**
 * Frontend application asset
 */
class FrontendAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';
    /**
     * @var string
     */
    public $baseUrl = '@web/frontend/web/html';

    /**
     * @var array
     */
    public $css = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'css/style.css',
        'css/other.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
        //'css/jquery.bxslider.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'js/app.js',
        //'js/vendors.min.js',
        'js/vendors.js',
        'js/script.js',
        //'js/star.js',
        'https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js',
        //'js/jquery.bxslider.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        JqueryAsset::class,
        FontAwesome::class,
        Html5shiv::class,
    ];
}
