<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/*
 * Class Flatpickr
 * Url: https://flatpickr.js.org
 * */

class Flatpickr extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = null;

    /**
     * @var array
     */
    public $css = [
        'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css',
    ];

    public $js = [
        'https://cdn.jsdelivr.net/npm/flatpickr',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
