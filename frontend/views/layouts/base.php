<?php

use common\dictionaries\AdsType;
use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php');

$bundle = AdsAsset::register($this);
$site_id = isset($this->context->site_id) ? $this->context->site_id : null;

$header_view = 'header_common';
switch ($site_id) {

    case AdsType::PROPERTY:
        $header_view = 'property_header';
        break;
    case AdsType::JOB:
        $header_view = 'job_header';
        break;
    case AdsType::ONLINE:
        $header_view = 'media_header';
        break;
    default:
        $header_view = 'header_common';
}
?>
    <div id="wrapper">

        <?php echo $this->render('partical/' . $header_view, []) ?>

        <!-- /.header -->
        <!-- /.search-row -->
        <?php
        echo \frontend\widgets\Alert::widget()
        ?>
        <?php echo $content ?>

        <footer class="main-footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">

                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title"><?php echo Yii::t('ads', 'About us') ?></h4>
                                <ul class="list-unstyled footer-nav">
                                    <li>
                                        <a href="<?php echo Url::to(['/page/about']) ?>"><?php echo Yii::t('ads', 'About Company') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/service']) ?>"><?php echo Yii::t('ads', 'For Business') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/partner']) ?>"><?php echo Yii::t('ads', 'Our Partners') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/site/contact']) ?>"><?php echo Yii::t('ads', 'Press Contact') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/recruitment']) ?>"><?php echo Yii::t('ads', 'Careers') ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title"><?php echo Yii::t('ads', 'Help & Contact') ?></h4>
                                <ul class="list-unstyled footer-nav">
                                    <li>
                                        <a href="<?php echo Url::to(['/page/security']) ?>"><?php echo Yii::t('ads', 'Stay Safe Online') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/seller']) ?>"><?php echo Yii::t('ads', 'How to Sell') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/buyer']) ?>"><?php echo Yii::t('ads', 'How to Buy') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/buyer']) ?>"><?php echo Yii::t('ads', 'Posting Rules') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/promote']) ?>"><?php echo Yii::t('ads', 'Promote Your Ad') ?>                                         </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title"><?php echo Yii::t('ads', 'More From Us') ?> </h4>
                                <ul class="list-unstyled footer-nav">
                                    <li>
                                        <a href="<?php echo Url::to(['/page/faq']) ?>"><?php echo Yii::t('ads', 'FAQ') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/blog/index']) ?>"><?php echo Yii::t('ads', 'Blog') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/search']) ?>"><?php echo Yii::t('ads', 'Popular Searches') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/site-map']) ?>"> <?php echo Yii::t('ads', 'Site Map') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/page/testimonial']) ?>"> <?php echo Yii::t('ads', 'Customer Reviews') ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
                            <div class="footer-col">
                                <h4 class="footer-title"><?php echo Yii::t('ads', 'Account') ?> </h4>
                                <ul class="list-unstyled footer-nav">
                                    <li>
                                        <a href="<?php echo Url::to(['/user/default/index']) ?>"> <?php echo Yii::t('frontend', 'Manage Account') ?> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/user/sign-in/login']) ?>"><?php echo Yii::t('frontend', 'Login') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/user/sign-in/signup']) ?>"><?php echo Yii::t('frontend', 'Register') ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/account/ads']) ?>"> <?php echo Yii::t('frontend', 'My ads') ?> </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['/user/default/index']) ?>"> <?php echo Yii::t('frontend', 'Profile') ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xl-4 col-xl-4 col-md-4 col-12">
                            <div class="footer-col row">
                                <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                                    <div class="mobile-app-content">
                                        <h4 class="footer-title"><?php echo Yii::t('ads', 'Fanpage') ?></h4>
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="fb-page"
                                                     data-href="https://www.facebook.com/socbay1.vn"
                                                     data-hide-cover="false"
                                                     data-show-facepile="false"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear: both"></div>

                        <div class="col-xl-12">
                            <div class=" text-center paymanet-method-logo">

                                <img class="lazy" src=""
                                     data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/master_card.png') ?>"
                                     alt="img">
                                <img alt="img"
                                     class="lazy" src=""
                                     data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/visa_card.png') ?>">
                                <img alt="img"
                                     class="lazy" src=""
                                     data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/paypal.png') ?>">
                                <img alt="img"
                                     class="lazy" src=""
                                     data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/american_express_card.png') ?>">
                                <img alt="img"
                                     class="lazy" src=""
                                     data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/discover_network_card.png') ?>">
                                <img alt="img" src=""
                                     class="lazy"
                                     data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/google_wallet.png') ?>">
                            </div>

                            <div class="copy-info text-center">
                                &copy; 2018 Socbay Ads
                                (alpha). <?php echo Yii::t('common', 'All Rights Reserved') ?>.
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- /.footer -->
    </div>
    <!-- /.wrapper -->
<?php $this->endContent() ?>