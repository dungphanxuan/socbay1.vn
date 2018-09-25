<?php

use frontend\assets\FrontendAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/b3/_clear.php');
$urlLogo = \common\models\ads\AdsAssets::getAssets('logo');
if (empty($urlLogo)) {
    $urlLogo = Url::to('@/web/frontend/web/images/') . 'logo1.png';
}
$app_css = <<<CSS
.navbar-brand.logo img {
    max-width: 180px !important;
}

.navbar-brand.logo {
    padding-top: 10px;
}

@media (max-width: 479px) {
    .navbar-site.navbar .navbar-identity .logo-title {
        padding-top: 10px;
    }
}
CSS;

$this->registerCss($app_css);

$bundle = FrontendAsset::register($this);
?>
    <div id="wrapper">
        <div class="header">
            <nav class="navbar navbar-site navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?php echo Url::to(['/site/index']) ?>" class="navbar-brand logo logo-title">
                            <img src="<?php echo $urlLogo ?>" alt="logo">
                        </a>
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"
                                type="button">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                    class="icon-bar"></span> <span class="icon-bar"></span></button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="nav-item"><a class="nav-link" href="<?php echo Url::to(['/support/index']) ?>">Trợ
                                    giúp</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (Yii::$app->user->isGuest): ?>
                                <li><a href="<?php echo Url::to(['/user/sign-in/login']) ?>">Đăng nhập</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo Url::to(['/ads/index']) ?>"><i class="icon-th-thumb"></i> All
                                        Ads</a>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span><?php echo Yii::$app->user->identity->userProfile->getFullName() ?></span>
                                        <i
                                                class="icon-user fa"></i> <i
                                                class=" icon-down-open-big fa"></i></a>
                                    <ul class="dropdown-menu user-menu">
                                        <li class="active"><a href="<?php echo Url::to(['/user/default/index']) ?>"><i
                                                        class="icon-home"></i> Trang cá nhân</a></li>
                                        <li>
                                            <a href="<?php echo Url::to(['/account/ads']) ?>">
                                                <i class="icon-th-thumb"></i> Tin của bạn</a></li>
                                        <li>
                                            <a href="<?php echo Url::to(['/account/favourite']) ?>">
                                                <i class="icon-heart"></i>Tin ưu thích</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo Url::to(['/account/saved']) ?>">
                                                <i class="icon-star-circled"></i>Lưu tìm kiếm</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo Url::to(['/account/archived']) ?>">
                                                <i class="icon-folder-close"></i> Tin lưu trữ</a></li>
                                        <li>
                                            <a href="<?php echo Url::to(['/account/pending']) ?>">
                                                <i class="icon-hourglass"></i>Chờ duyệt </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo Url::to(['/account/statements']) ?>">
                                                <i class=" icon-money "></i>Lịch sử </a></li>
                                        <li>
                                            <a href="<?php echo Url::to(['/user/sign-in/logout']) ?>"
                                               data-method="post">
                                                <i class=" icon-logout "></i> Đăng xuất </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger"
                                                   href="<?php echo Url::to(['/ads/create']) ?>"> <?php echo Yii::t('ads', 'Post Free Add') ?></a>
                            </li>
                            <li class="dropdown lang-menu">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="lang-title">VI</span><span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu user-menu" role="menu">
                                    <li><a class="active"
                                           href="<?php echo Url::to(['/site/set-locale', 'locale' => 'en-US']) ?>">
                                            <span class="lang-name">English</span></a></li>
                                    <li><a href="<?php echo Url::to(['/site/set-locale', 'locale' => 'vi']) ?>"><span
                                                    class="lang-name">Tiếng Việt</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>

            </nav>
        </div>

        <?php echo $content ?>

        <footer class="main-footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
                            <div class="footer-col">
                                <h4 class="footer-title">Về chúng tôi</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="#">Công ty</a></li>
                                    <li><a href="#">Hoạt động kinh doanh</a></li>
                                    <li><a href="#">Đối tác</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                    <li><a href="#">Tuyển dụng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
                            <div class="footer-col">
                                <h4 class="footer-title">Trung tâm trợ giúp</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="#">
                                            Stay Safe Online
                                        </a></li>
                                    <li><a href="#">
                                            Cách bán hàng</a></li>
                                    <li><a href="#">
                                            Cách mua hàng
                                        </a></li>
                                    <li><a href="#">Posting Rules
                                        </a></li>
                                    <li><a href="#">
                                            Promote Your Ad
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
                            <div class="footer-col">
                                <h4 class="footer-title">Thông tin thêm</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="<?php echo Url::to(['/page/faq']) ?>">FAQ
                                        </a></li>
                                    <li><a href="<?php echo Url::to(['/blog/index']) ?>">Blog
                                        </a></li>
                                    <li><a href="#">
                                            Popular Searches
                                        </a></li>
                                    <li><a href="<?php echo Url::to(['/site-map/index']) ?>"> Site Map
                                        </a></li>
                                    <li><a href="#"> Đánh giá từ khách hàng
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
                            <div class="footer-col">
                                <h4 class="footer-title">Tài khoản</h4>
                                <ul class="list-unstyled footer-nav">
                                    <li><a href="<?php echo Url::to(['/user/default/index']) ?>"> Quản lý tài khoản
                                        </a></li>
                                    <li><a href="<?php echo Url::to(['/user/sign-in/login']) ?>">Đăng nhập
                                        </a></li>
                                    <li><a href="<?php echo Url::to(['/user/sign-in/signup']) ?>">Đăng ký
                                        </a></li>
                                    <li><a href="<?php echo Url::to(['/account/ads']) ?>"> My ads
                                        </a></li>
                                    <li><a href="<?php echo Url::to(['/user/default/profile']) ?>"> Hồ sơ
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-col row">
                                <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                                    <div class="mobile-app-content">
                                        <h4 class="footer-title">Fanpage</h4>
                                        <div class="row ">
                                            <div class="col-xs-12">
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
                        <div class="col-lg-12">
                            <div class=" text-center paymanet-method-logo">
                                <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/master_card.png') ?>"
                                     alt="img">
                                <img alt="img"
                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/visa_card.png') ?>">
                                <img alt="img"
                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/paypal.png') ?>">
                                <img alt="img"
                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/american_express_card.png') ?>">
                                <img alt="img"
                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/payment/google_wallet.png') ?>">
                            </div>
                            <div class="copy-info text-center">
                                &copy; 2017 BootClassified. <?php echo Yii::t('common', 'All Rights Reserved') ?>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

<?php $this->endContent() ?>

<?php

