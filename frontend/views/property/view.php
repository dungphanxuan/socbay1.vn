<?php

use frontend\assets\AdsAsset;
use common\helpers\ArticleHelper;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $catModel \common\models\ArticleCategory */

$this->title = $model->title;

$bundle = AdsAsset::register($this);
$articleDetail = ArticleHelper::getDetail($model->id);
$sellerInfo = $articleDetail['seller_user'];
$imagesAttactment = $articleDetail['attachments'];
?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo Url::to(['/site/index']) ?>"><i
                                            class="icon-home fa"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo Url::to(['/ads/index']) ?>">All Ads</a></li>
                            <li class="breadcrumb-item"><a
                                        href="<?php echo Url::to(['/ads/index', 'cslug' => $catModel->slug]) ?>">Bất
                                    động
                                    sản</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kết quả tìm kiếm</li>
                        </ol>
                    </nav>


                    <div class="pull-right backtolist">
                        <a href="<?php echo Url::to(['ads/index']) ?>"><i class="fa fa-angle-double-left"></i> Quay lại
                            danh
                            sách</a
                    </div>

                </div>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h3 class="auto-heading"><span class="auto-title left"><?php echo $model->title ?> </span> <span
                                    class="auto-price pull-right"> <?php echo $articleDetail['price-show'] ?></span>
                        </h3>

                        <div style="clear:both;"></div>
                        <span class="info-row">
                            <span class="date"><i
                                        class=" icon-clock"> </i> <?php echo Yii::$app->formatter->asRelativeTime($model->updated_at) ?> </span> -
                            <span class="item-location"> <?php echo $articleDetail['address_text'] ?>
                                <a class="scrollto" href="#prop-map"> <i
                                            class="fa fa-map-marker"></i> Bản đồ</a>  </span>
                        </span>

                        <div class="row ">
                            <div class="col-sm-9 automobile-left-col">
                                <div class="ads-image">
                                    <ul class="bxslider">
                                        <?php foreach ($imagesAttactment as $key => $item): ?>
                                            <li><img src="<?php echo $item[0] ?>" alt="img"/></li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="product-view-thumb-wrapper">
                                        <ul id="bx-pager" class="product-view-thumb">
                                            <?php foreach ($imagesAttactment as $key => $item): ?>
                                                <li><a data-slide-index="<?php echo $key ?>" class="thumb-item-link"
                                                       href=""><img class="lazy" data-src="<?php echo $item[2] ?>"
                                                                    alt="img"/></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                </div>
                                <!--ads-image-->
                            </div>
                            <!-- /.automobile-left-col-->

                            <div class="col-sm-3 automobile-right-col">
                                <div class="inner">

                                    <div class="key-features">
                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">ca. 120 m²</span>
                                                <span class="data-type">size</span>
                                            </div>
                                        </div>

                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">4 Bed, 3 Bath</span>
                                                <span class="data-type">Rooms</span>
                                            </div>
                                        </div>

                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">6 months</span>
                                                <span class="data-type">min. rental period</span>
                                            </div>
                                        </div>

                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">Apartment</span>
                                                <span class="data-type">Building Type</span>
                                            </div>
                                        </div>

                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">15.09.2016 </span>
                                                <span class="data-type">available from</span>
                                            </div>
                                        </div>


                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">Covered Parking</span>
                                                <span class="data-type"> Parking</span>
                                            </div>
                                        </div>

                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">Yes</span>
                                                <span class="data-type"> Furnished</span>
                                            </div>
                                        </div>


                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">CD-TM-5680</span>
                                                <span class="data-type"> Property Reference</span>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/.row-->


                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Thông tin mô tả</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <?php echo \yii\helpers\HtmlPurifier::process($model->body) ?>
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin ">
                                                    <strong><?php echo Yii::t('frontend', 'Prices') ?>
                                                        :</strong> <?php echo $articleDetail['price-show'] ?> </p>
                                            </li>

                                            <li>
                                                <p class="no-margin">
                                                    <strong><?php echo Yii::t('frontend', 'Building Type') ?>
                                                        :</strong> Appertment</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong><?php echo Yii::t('frontend', 'Size') ?>
                                                        :</strong>
                                                    ca. 120 m²</p>
                                            </li>

                                            <li>
                                                <p class="no-margin">
                                                    <strong><?php echo Yii::t('frontend', 'Location') ?>
                                                        :</strong> Hà Nội </p>
                                            </li>
                                            <li>
                                                <p class=" no-margin ">
                                                    <strong><?php echo Yii::t('frontend', 'Condition') ?>
                                                        :</strong> New</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong><?php echo Yii::t('frontend', 'Room') ?>
                                                        :</strong>
                                                    4-5 </p>
                                            </li>
                                            <li>
                                                <p class="no-margin">
                                                    <strong><?php echo Yii::t('frontend', 'Ready for occupancy') ?>
                                                        :</strong>
                                                    15.09.2016
                                                </p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <?php echo $this->render('@frontend/views/ads/partical/_ads_action', ['model' => $model]) ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer text-left">
                                <?php if (isset($articleDetail['map_url']) && !empty($articleDetail['map_url'])): ?>
                                    <div class="w100 map" id="prop-map">
                                        <iframe src="<?php echo $articleDetail['map_url'] ?>&output=embed"
                                                height="350" style="border:0;   width:100%"></iframe>
                                    </div>
                                <?php endif; ?>
                                <div style="clear: both"></div>

                                <a class="btn  btn-default" data-toggle="modal"
                                   href="#contactAdvertiser"><i
                                            class=" icon-mail-2"></i> Gửi tin nhắn </a> <a class="btn  btn-info"
                                                                                           href="tel:01680531345452"><i
                                            class=" icon-phone-1"></i> 01680 531 352 </a></div>
                        </div>
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                <div class="col-md-3  page-sidebar-right">
                    <aside>
                        <div class="card sidebar-card card-contact-seller">
                            <div class="card-header"><?php echo Yii::t('frontend', 'Contact Dealer') ?></div>
                            <div class="card-content user-info">
                                <div class="card-body text-center">
                                    <div class="seller-info">
                                        <div class="company-logo-thumb">
                                            <a><img data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/property-agency-logo.png') ?>"
                                                    class="lazy" alt="img"> </a>
                                        </div>
                                        <h3 class="no-margin"> Property Agency </h3>

                                        <p><?php echo Yii::t('frontend', 'Location') ?>: <strong>Hà Nội</strong></p>

                                        <p> Web: <a href="https://www.google.com"
                                                    target="_blank"><strong>www.google.com</strong></p></a>
                                    </div>
                                    <div class="user-ads-action">

                                        <a href="#" data-toggle="modal" class="btn   btn-danger btn-block"><i
                                                    class=" icon-link"></i> Xem thêm </a>
                                        <a href="#contactAdvertiser" data-toggle="modal"
                                           class="btn   btn-info btn-block"><i class=" icon-mail-2"></i> Send Enquiry
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->render('@frontend/views/partical/_safety_tip', []) ?>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php echo $this->render('@frontend/views/ads/partical/modal/_modal_contact', []) ?>

    <!-- /.modal -->
<?php
$app_js = <<<JS

            // Slider
        var mainImgSlider = $('.bxslider').bxSlider({
            pagerCustom: '#bx-pager',
            auto: true
          });

        // initiates responsive slide
        var settings = function () {
            var mobileSettings = {
                slideWidth: 80,
                minSlides: 2,
                maxSlides: 5,
                slideMargin: 5,
                adaptiveHeight: true,
                pager: false

            };
            var pcSettings = {
                slideWidth: 100,
                minSlides: 3,
                maxSlides: 5,
                pager: false,
                slideMargin: 10,
                adaptiveHeight: true
            };
            return ($(window).width() < 768) ? mobileSettings : pcSettings;
        };

        var thumbSlider;

        function tourLandingScript() {
            thumbSlider.reloadSlider(settings());
        }

        thumbSlider = $('.product-view-thumb').bxSlider(settings());
        $(window).resize(tourLandingScript);

JS;

$this->registerJs($app_js);
