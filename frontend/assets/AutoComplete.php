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

class AutoComplete extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/web/plugins/autocomplete';
    /**
     * @var array
     */
    public $css = [
        //'datepicker.css',
    ];
    /**
     * @var array
     */
    public $js = [
        'jquery.mockjax.js',
        'jquery.autocomplete.js',
        'usastates.js',
        'autocomplete-demo.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
