<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace common\assets;

use yii\web\AssetBundle;

/*
 * Class SimpleMdeAsset
 * Url: https://simplemde.com/
 * */

class SimpleMdeAsset extends AssetBundle
{
    public $sourcePath = '@bower/simplemde';
    public $css = [
        'https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css'
    ];
    public $js = [
        'https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js'
    ];
}
