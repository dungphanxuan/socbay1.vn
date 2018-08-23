<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class Tether extends AssetBundle
{
    public $sourcePath = '@bower/tether';
    public $js = [
        'js/tether.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
