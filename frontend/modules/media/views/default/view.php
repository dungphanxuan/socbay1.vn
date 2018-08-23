<?php

use frontend\assets\AdsAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\media\Media */
$this->title = $model->title;
\common\assets\Plyr::register($this);
$urlDefault = '';
$bundle = AdsAsset::register($this);

// OpenGraph metatags
$urlCard = $model->getPoster();
$this->registerMetaTag(['property' => 'og:title', 'content' => Html::encode($model->title)]);
$this->registerMetaTag(['property' => 'og:type', 'content' => 'article']);
$this->registerMetaTag(['property' => 'og:site_name', 'content' => 'Rao vặt số 1 Socbay']);
$this->registerMetaTag(['property' => 'og:image', 'content' => $urlCard]);
$this->registerMetaTag(['property' => 'og:url', 'content' => Url::current([], true)]);
$this->registerMetaTag(['property' => 'og:description', 'content' => '']);
$this->registerMetaTag(['property' => 'fb:admins', 'content' => '']);

//Search Engine Index
//Check Post Ready
//$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, nofollow']);
$this->registerMetaTag(['http-equiv' => 'refresh', 'content' => '1800']);

?>
    <div class="intro-inner" style="height: 550px !important;">
        <div class="about-intro" style="
                background:url(https://storage.googleapis.com/yiibucket/media/bg5.jpg) no-repeat center;
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

    <div class="main-container inner-page" id="mainMedia">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <h1 class="text-center title-1"> <?php echo $model->title ?><strong>Online</strong></h1>
                    <hr class="center-block small text-hr">
                </div>
                <div class="faq-content">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <video poster="<?php echo $model->getPoster(); ?>" id="player" playsinline controls>
                                <source src="<?php echo $model->getUrl(); ?>" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-1">
                            <a href="<?php echo $model->getUrl(); ?>" target="_blank">Download
                                Video</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">Title</p>

                        </div>
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
$('html,body').animate({
        scrollTop: $("#mainMedia").offset().top - 80
}, 'fast');
JS;

$this->registerJs($app_js);



