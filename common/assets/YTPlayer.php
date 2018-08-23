<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class YTPlayer extends AssetBundle
{
    //public $sourcePath = '@bower/jquery.mb.ytplayer';
    public $sourcePath = null;
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.1.5/css/jquery.mb.YTPlayer.min.css'
    ];

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.1.5/jquery.mb.YTPlayer.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
