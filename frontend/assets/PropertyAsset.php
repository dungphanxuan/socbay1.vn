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
class PropertyAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';

    /**
     * @var string
     */
    public $baseUrl = '@web/frontend/web/theme';

    /**
     * @var array
     */
    public $css = [
        'assets/css/owl.carousel.min.css',
        'assets/css/owl.theme.default.min.css',
        'assets/css/lightslider.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'assets/js/owl.carousel.min.js',
        'assets/js/lightslider.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        AdsAsset::class,
    ];
}
