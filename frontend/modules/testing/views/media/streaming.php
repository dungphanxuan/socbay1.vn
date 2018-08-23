<?php

use frontend\assets\AdsAsset;

/* @var $this yii\web\View */

$this->title = 'One Piece tập 831 Việt Sub HD 720p';
\common\assets\Plyr::register($this);
\common\assets\HlsJs::register($this);

$bundle = AdsAsset::register($this);
?>
    <div class="intro-inner" style="height: 400px">
        <div class="about-intro" style="
                background:url(https://images.alphacoders.com/183/183401.jpg) no-repeat center;
                background-size:cover;">

            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title"> Video Streaming </h1>
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
                    <h1 class="text-center title-1"> One Piece tập <strong>831</strong> Việt Sub HD 720p </h1>
                    <hr class="center-block small text-hr">
                </div>
                <div class="faq-content">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <video preload="none" id="player" autoplay controls crossorigin></video>
                        </div>
                        <div class="col-md-2">Download <a href="<?= 'A' ?>">1080p</a></div>

                    </div>
                </div>

                <div class="row" id="suggestVideo" style="padding-top: 20px">
                    <div class="col-md-12">
                        <h1 class="text-center title-1"> Suggest video</h1>
                        <hr class="center-block small text-hr">
                    </div>
                    <div class="col-md-12">

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php
$url = 'https://storage.googleapis.com/yiibucket/media/streaming/831/out.m3u8';
//https://media.golfervn.com/stream/swing_xa_hon_moi_ngay/master.m3u8
$app_js = <<<JS
(function () {
  var video = document.querySelector('#player');

  if (Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource('$url');
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
    });
  }
   var options = {
      quality: { default: 'default', options: ['hd2160', 'hd1440', 'hd1080', 'hd720', 'large', 'medium', 'small', 'tiny', 'default'] }
  };
  const player = new Plyr(video, {
     options 
});
})();

$('html,body').animate({
        scrollTop: $("#mainMedia").offset().top - 80
}, 'fast');
JS;

$this->registerJs($app_js);



