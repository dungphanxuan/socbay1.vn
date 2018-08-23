<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class Ladda extends AssetBundle
{
    public $sourcePath = '@bower/ladda';

    public $css = [
        'ladda-themeless.min.css'
    ];
    public $js = [
        'spin.min.js',
        'ladda.jquery.min.js',
        'ladda.min.js',

    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
