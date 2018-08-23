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
class AdsAsset extends AssetBundle
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
     * @var string
     */
    //public $sourcePath = '@frontend/web/theme';
    /**
     * @var array
     */
    public $css = [
        //'assets/bootstrap/css/bootstrap.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css',
        'assets/css/style.css?v=1',
        'assets/css/other.css',
        'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'assets/js/app.js',
        //'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js',
        //'assets/bootstrap/js/bootstrap.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js',
        'assets/js/vendors.min.js',
        'assets/js/script.js',

        'https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.7/jquery.lazy.min.js',
        'assets/js/star.js',
        'https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js',
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
