<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class HlsJs extends AssetBundle
{
    public $sourcePath = null;
    public $js = [
        'https://cdn.jsdelivr.net/npm/hls.js@latest'
    ];

    public $depends = [
        //'yii\web\JqueryAsset'
    ];
}
