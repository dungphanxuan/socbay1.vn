<?php

use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = 'Device Css';
\common\assets\DevicesCss::register($this);
//$backgroundUrl = 'https://picturepan2.github.io/devices.css/src/img/bg-01.jpg';
$backgroundUrl = 'https://i.pinimg.com/736x/f0/3c/75/f03c75f50e0457a5c622c9b99fe9cd4e.jpg';
?>


<div class="main-container inner-page">
    <div class="container">
        <div class="row clearfix">
            <h1 class="text-center title-1"> Device Css </h1>
            <h6 class="text-center title-1"> Modern devices in pure CSS. The first are iPhone X and iPhone 8, and more
                modern devices are coming. </h6>
            <hr class="mx-auto small text-hr">

            <div style="clear:both">
                <hr>
            </div>
            <div class="col-xl-12">
                <div class="white-box text-center" style="min-height: 400px">
                    <p>Iphone 8</p>
                    <div class="device device-iphone-8 device-gold">
                        <div class="device-frame">
                            <img class="device-content" src="<?= $backgroundUrl ?>">
                        </div>
                        <div class="device-stripe"></div>
                        <div class="device-header"></div>
                        <div class="device-sensors"></div>
                        <div class="device-btns"></div>
                        <div class="device-power"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
$app_css = <<<CSS

.device {
  margin: 1rem auto;
}

.section-device:nth-of-type(even) {
  background: #f8f9fa;
}
CSS;
$this->registerCss($app_css);
?>



