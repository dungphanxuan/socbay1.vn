<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

class Revealjs extends AssetBundle
{
    public $sourcePath = '@bower/reveal';

    public $css = [
        'css/reveal.css'
    ];
    public $js = [
        'js/reveal.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
