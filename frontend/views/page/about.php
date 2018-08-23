<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use common\assets\YTPlayer;
use common\helpers\Mobile_Detect;

/* @var $this yii\web\View */

$this->title = 'About Company';

$bundle = AdsAsset::register($this);
YTPlayer::register($this);
$detech = new Mobile_Detect();

?>
    <div class="intro-inner">
        <?php
        if ($detech->isMobile()):
            ?>
            <div class="about-intro" style="
                    background:url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/bg2.jpg') ?>) no-repeat center;
                    background-size:cover;">
                <div class="dtable hw100">
                    <div class="dtable-cell hw100">
                        <div class="container text-center">
                            <h1 class="intro-title animated fadeInDown"> Building a customer focus </h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="about-intro" id="playerID"
                 data-property="{videoURL:'https://www.youtube.com/watch?v=nUXAY0K3LoQ',containment:'self',autoPlay:true, mute:false, startAt:0, opacity:1,mute: true,showControls:false}">
                <div class="dtable hw100 overlay">
                    <div class="dtable-cell hw100">
                        <div class="container text-center" style="">
                            <h1 class="intro-title animated fadeInDown"> Building a customer focus </h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--/.about-intro -->

    </div>
    <!-- /.intro-inner -->

    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <div class="col-xl-12">
                        <h1 class="text-center title-1"> Hợp tác với các giải pháp mạnh mẽ </h1>
                        <hr class="center-block small text-hr">
                    </div>

                    <div class="col-sm-6">
                        <div class="text-content has-lead-para text-left">
                            <p class="lead"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                consectetur sit amet ante nec vulputate. Nulla aliquam, justo auctor consequat
                                tincidunt, arcu erat mattis lorem, lacinia lacinia dui enim at eros. Pellentesque ut
                                gravida augue. Duis ac dictum tellus </p>

                            <p class="lead"> Pellentesque in mauris placerat, porttitor lorem id, ornare nisl.
                                Pellentesque rhoncus convallis felis, in egestas libero. Donec et nibh dapibus, sodales
                                nisi quis, fringilla augue. Donec dui quam, egestas in varius ut, tincidunt quis ipsum.
                                Nulla nec odio eu nisi imperdiet dictum. </p>

                            <p class="lead"> Curabitur sed leo dictum, convallis lorem eu, suscipit mi. Mauris viverra
                                blandit varius. Proin non sem turpis. Etiam fringilla hendrerit nunc at accumsan. Duis
                                mollis auctor lobortis. </p>

                            <p class="lead"> Etiam elementum nulla non erat blandit, sed porttitor urna malesuada. Cras
                                euismod a nulla sed ornare. Vestibulum id molestie nulla. Phasellus sodales, sapien
                                vitae auctor rhoncus </p>
                        </div>
                    </div>
                    <div class="col-sm-6"><img
                                src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/info.png') ?>"
                                alt="imfo" class="img-responsive"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->
    <div class="parallaxbox about-parallax-bottom">
        <div class="container">
            <div class="row text-center featuredbox">
                <div class="col-sm-4 xs-gap">
                    <div class="inner">
                        <div class="icon-box-wrap"><i class="icon-book-open ln-shadow-box shape-3"></i></div>
                        <h3 class="title-4">Customer service</h3>

                        <p>Ein herausragendes Beispiel für Story-Telling im modernen Webdesign. et suscipit sapien
                            posuere quis. Maecenas ut iaculis nunc, eget efficitur ipsum. Nam vitae hendrerit
                            tortor.</p>
                    </div>
                </div>
                <div class="col-sm-4 xs-gap">
                    <div class="inner">
                        <div class="icon-box-wrap"><i class=" icon-lightbulb ln-shadow-box shape-6"></i></div>
                        <h3 class="title-4">Seller satisfaction</h3>

                        <p>Ein herausragendes Beispiel für Story-Telling im modernen Webdesign. et suscipit sapien
                            posuere quis. Maecenas ut iaculis nunc, eget efficitur ipsum. Nam vitae hendrerit tortor.
                            .</p>
                    </div>
                </div>
                <div class="col-sm-4 xs-gap">
                    <div class="inner">
                        <div class="icon-box-wrap"><i class="icon-megaphone ln-shadow-box shape-5"></i></div>
                        <h3 class="title-4">Best Offers </h3>

                        <p>Ein herausragendes Beispiel für Story-Telling im modernen Webdesign. et suscipit sapien
                            posuere quis. Maecenas ut iaculis nunc, eget efficitur ipsum. Nam vitae hendrerit
                            tortor. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$app_css = <<<CSS
#playerID .overlay {
    background-image: url(http://core-web.sakura.ne.jp/core/wp-content/uploads/2016/04/bg-banner-6.png);
    min-height: 500px;
}
CSS;

$this->registerCss($app_css);
$app_js = <<<JS
 jQuery("#playerID").YTPlayer();
JS;

$this->registerJs($app_js);
