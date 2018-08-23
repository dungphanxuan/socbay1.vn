<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class MithrilJs extends AssetBundle
{
    //public $sourcePath = '@bower/mithril';
    public $sourcePath = null;
    public $js = [
        'https://unpkg.com/mithril',
        //'mithril.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
