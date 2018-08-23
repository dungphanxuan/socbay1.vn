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
use common\assets\OwlCarousel;

/**
 * Frontend application asset
 */
class Bootstrap4Asset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';
    /**
     * @var string
     */
    public $baseUrl = '@web/frontend/web/bootstrap4';

    /**
     * @var string
     */
    //public $sourcePath = '@frontend/web/theme';
    /**
     * @var array
     */
    public $css = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        JqueryAsset::class,
        FontAwesome::class,
        //OwlCarousel::class,
        Html5shiv::class,
    ];
}
