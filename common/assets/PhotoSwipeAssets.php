<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class PhotoSwipeAssets extends AssetBundle
{
    public $sourcePath = null;
    public $baseUrl = 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/';

    public $css = [
        'photoswipe.css',
        'default-skin/default-skin.css',
    ];
    public $js = [
        'photoswipe.min.js',
        'photoswipe-ui-default.min.js'
    ];

    public $depends = [
        //'yii\web\JqueryAsset'
    ];
}
