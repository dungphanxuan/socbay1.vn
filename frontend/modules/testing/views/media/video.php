<?php

use frontend\assets\AdsAsset;

/* @var $this yii\web\View */

$this->title = 'Video';
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
                        <h1 class="intro-title"> Video </h1>
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
                            <video controls crossorigin playsinline
                                   poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg"
                                   id="player">
                                <!-- Video files -->
                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                                        type="video/mp4" size="576">
                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
                                        type="video/mp4" size="720">
                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
                                        type="video/mp4" size="1080">
                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4"
                                        type="video/mp4" size="1440">

                                <!-- Caption files -->
                                <track kind="captions" label="English" srclang="en"
                                       src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                                       default>
                                <track kind="captions" label="Français" srclang="fr"
                                       src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

                                <!-- Fallback for browsers that don't support the <video> element -->
                                <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                                   download>Download</a>
                            </video>

                        </div>
                        <div class="col-md-2">Download <a href="<?= 'A' ?>">File Mp3</a></div>

                    </div>

                </div>


            </div>
        </div>
    </div>
<?php
$app_js = <<<JS
const player = new Plyr('#player', {
    autoplay: true
});
JS;

$this->registerJs($app_js);



