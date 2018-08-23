<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace api\assets_a;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since  2.0
 */
class ApiAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/web';

    public $css = [
        'css/style.css',
        //'https://cdnjs.cloudflare.com/ajax/libs/froala-design-blocks/1.0.2/css/froala_blocks.min.css',
        // 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i',
        '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css'
    ];

    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js',
        'js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\Html5shiv',
        'common\assets\FontAwesome',
    ];
}
