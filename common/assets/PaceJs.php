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
 * Class PaceJs
 * Url: http://github.hubspot.com/pace/
 *
 * */

class PaceJs extends AssetBundle
{
    public $sourcePath = null;
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/pace/0.4.17/pace.min.js'
    ];

}
