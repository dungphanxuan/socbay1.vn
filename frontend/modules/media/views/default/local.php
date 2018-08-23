<?php

use frontend\assets\AdsAsset;

/* @var $this yii\web\View */

$this->title = 'Local Video';
\common\assets\Plyr::register($this);
$bundle = AdsAsset::register($this);
?>
    <div class="intro-inner">
        <div class="about-intro" style="
                background:url(<?= $this->assetManager->getAssetUrl($bundle, 'images/bg2.jpg') ?>) no-repeat center;
                background-size:cover;">

            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title"> Media Video </h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/.about-intro -->

    </div>
    <!-- /.intro-inner -->

    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <h1 class="text-center title-1"> classified ads <strong>FAQ</strong></h1>
                    <hr class="center-block small text-hr">
                </div>
                <div class="faq-content">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <video poster="/path/to/poster.jpg" id="player" playsinline controls>
                                <source src="https://storage.googleapis.com/yiibucket/media/onepiece/episode/831.mkv"
                                        type="video/mp4">

                                <!-- Captions are optional -->
                                <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en"
                                       default>
                            </video>
                        </div>
                        <div class="col-md-2">Download Video</a></div>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
$app_js = <<<JS
const player = new Plyr('#player',{
    autoplay: true
});
JS;

$this->registerJs($app_js);



