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
 * Class BxSlider
 * Url: http://bxslider.com
 * */

class OwlCarousel extends AssetBundle
{
    public $sourcePath = null;
    //public $baseUrl = 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/';
    //public $baseUrl = 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/';

    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css'
    ];

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
