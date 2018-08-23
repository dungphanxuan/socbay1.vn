<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace common\assets;

use yii\web\AssetBundle;


/**
 * Multiselect AssetBundle
 * @author Qiang Xue <qiang.xue@gmail.com>
 * Url: https://github.com/crlcu/multiselect
 */
class Multiselect extends AssetBundle
{
    public $sourcePath = '@bower/multiselect';
    public $js = [
        'dist/js/multiselect.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
