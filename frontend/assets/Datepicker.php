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
 * Class Datepicker
 * Url: https://fengyuanchen.github.io/datepicker/
 * */

class Datepicker extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/web/plugins/datepicker';
    /**
     * @var array
     */
    public $css = [
        'datepicker.css',
    ];
    /**
     * @var array
     */
    public $js = [
        'datepicker.js',
        'datepicker.vi.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
