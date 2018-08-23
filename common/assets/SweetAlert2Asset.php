<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 4/28/2017
 * Time: 9:40 AM
 */

namespace common\assets;

namespace common\assets;

use yii\web\AssetBundle;

class SweetAlert2Asset extends AssetBundle
{
    public $sourcePath = null;
    public $js = [
        'https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js',
        'https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}