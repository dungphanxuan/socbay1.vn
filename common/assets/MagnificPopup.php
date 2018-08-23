<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class MagnificPopup extends AssetBundle
{
    public $sourcePath = '@bower/magnific-popup/dist';
    public $css = [
        'magnific-popup.css'
    ];
    public $js = [
        'magnific-popup.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
