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
 * Class DesignBlock.
 * Url: https://www.froala.com/design-blocks
 * */

class DesignBlock extends AssetBundle
{
    public $sourcePath = null;
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/froala-design-blocks/1.0.2/css/froala_blocks.min.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesome',
    ];
}
