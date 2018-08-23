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
class BoxAsset extends AssetBundle
{
    /**
     * @var string
     */
    //public $basePath = '@webroot';
    /**
     * @var string
     */
    //public $baseUrl = '@web/frontend/web/theme';

    /**
     * @var string
     */
    public $sourcePath = '@frontend/web/theme';
    /**
     * @var array
     */
    public $css = [
        'assets/css/box/style-box.css',
        'assets/css/box/style-category.css',
    ];

    /**
     * @var array
     */
    public $js = [];

    /**
     * @var array
     */
    public $depends = [
        AdsAsset::class
    ];
}
