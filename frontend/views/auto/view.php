<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use common\helpers\ArticleHelper;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $catModel */

$this->title = $model->title;

$bundle = AdsAsset::register($this);
$articleDetail = ArticleHelper::getDetail($model->id);
$sellerInfo = $articleDetail['seller_user'];
$imagesAttactment = $articleDetail['attachments'];

$topBannerUrl = 'https://dev.yiiframework.vn/classified/storage/web/source/2/012018/nm6ma8liZgDmUMdSKCc-5bbrtatnsvrE.png';
?>
    <div class="main-container">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="icon-home fa"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo Url::to(['/ads/index']) ?>">All Ads</a></li>
                            <li class="breadcrumb-item"><a
                                        href="<?php echo Url::to(['/ads/index', 'cslug' => $catModel->slug]) ?>">Xe
                                    cộ</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page"><?php echo Yii::t('frontend', 'Search Results') ?></li>
                        </ol>
                    </nav>
                    <div class="pull-right backtolist"><a href="<?php echo Url::to(['/ads/index']) ?>"> <i
                                    class="fa fa-angle-double-left"></i> <?php echo Yii::t('frontend', 'Back to Results') ?>
                        </a></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h2 class="auto-heading"><span class="auto-title left"><?php echo $model->title ?> </span> <span
                                    class="auto-price pull-right"> <?php echo $articleDetail['price-show'] ?></span>
                        </h2>

                        <div style="clear:both;"></div>
                        <span class="info-row"> <span class="date"><i
                                        class=" icon-clock"> </i> <?php echo Yii::$app->formatter->asRelativeTime($model->updated_at) ?> <?php echo $articleDetail['updated_text'] ?> </span> - <span
                                    class="category"> Xe cộ </span>- <span class="item-location"><i
                                        class="fa fa-map-marker"></i> <?php echo $articleDetail['address_text'] ?> </span> </span>

                        <div class="row ">
                            <div class="col-sm-9 automobile-left-col">

                                <div class="ads-image">
                                    <ul class="bxslider">
                                        <?php foreach ($imagesAttactment as $key => $item): ?>
                                            <li><img src="<?php echo $item[0] ?>" alt="img"/></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div id="bx-pager">
                                        <?php foreach ($imagesAttactment as $key => $item): ?>
                                            <a class="thumb-item-link" data-slide-index="<?php echo $key ?>"
                                               href=""><img
                                                        class="lazy"
                                                        data-src="<?php echo $item[2] ?>" alt="img"/></a>
                                        <?php endforeach; ?>
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
                                                <span class="media-heading">8,187 km</span>
                                                <span class="data-type">Mileage</span>
                                            </div>
                                        </div>

                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">2011</span>
                                                <span class="data-type">YEAR</span>
                                            </div>
                                        </div>

                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">New</span>
                                                <span class="data-type">Condition</span>
                                            </div>
                                        </div>

                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">Automatic</span>
                                                <span class="data-type">TRANSMISSION</span>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">CAR</span>
                                                <span class="data-type">TYPE</span>
                                            </div>
                                        </div>


                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">Personal</span>
                                                <span class="data-type">Class</span>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/.row-->


                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Chi tiết</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <?php echo $model->body ?>
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong><?php echo Yii::t('frontend', 'Price') ?>
                                                        :</strong> <?php echo $articleDetail['price-show'] ?></p>
                                            </li>

                                            <li>
                                                <p class="no-margin"><strong><?php echo Yii::t('frontend', 'Type') ?>
                                                        :</strong>
                                                    Car</p>
                                            </li>
                                            <li>
                                                <p class="no-margin">
                                                    <strong><?php echo Yii::t('frontend', 'Location') ?>
                                                        :</strong> <?php echo $articleDetail['address_text'] ?> </p>
                                            </li>
                                            <li>
                                                <p class=" no-margin ">
                                                    <strong><?php echo Yii::t('frontend', 'Condition') ?>
                                                        :</strong> Mới</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong><?php echo Yii::t('frontend', 'Brand') ?>
                                                        :</strong> Mercedes-Benz</p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li>
                                                <a href="<?php echo Url::to(['/account/seller-profile', 'id' => $model->created_by]) ?>">
                                                    <i class=" fa fa-user"></i> <?php echo Yii::t('frontend', 'More ads by User') ?>
                                                </a></li>
                                            <?php echo \frontend\widgets\Star::widget(['model' => $model]) ?>
                                            <li>
                                                <a href="<?php echo Url::to(['/account/seller-profile', 'id' => $model->created_by]) ?>">
                                                    <i class="fa fa-share-alt"></i> <?php echo Yii::t('frontend', 'Share ad') ?>
                                                </a></li>
                                            <li><a href="#reportAdvertiser" data-toggle="modal"> <i
                                                            class="fa icon-info-circled-alt"></i> <?php echo Yii::t('frontend', 'Report abuse') ?>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer text-left"><a class="btn  btn-default" data-toggle="modal"
                                                                     href="#contactAdvertiser"><i
                                            class=" icon-mail-2"></i> <?php echo Yii::t('frontend', 'Send a message') ?>
                                </a>
                                <a class="btn  btn-info"><i
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
                                            <a><img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/auto/dealer-logo.png') ?>"
                                                    class=" " alt="img"> </a></div>
                                        <h3 class="no-margin"> Auto Dealer Ltd.</h3>

                                        <p>Location: <strong><?php echo $articleDetail['address_text'] ?></strong></p>

                                        <p> Web: <strong>www.demoweb.com</strong></p>
                                    </div>
                                    <div class="user-ads-action">

                                        <a href="#" data-toggle="modal" class="btn   btn-danger btn-block"><i
                                                    class=" icon-link"></i> View Details </a>
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
    <!-- Modal contactAdvertiser -->

<?php echo $this->render('@frontend/views/ads/partical/modal/_modal_contact', []) ?>

<?php
$app_js = <<<JS
 $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager',
        adaptiveHeight: true
    });
JS;

$this->registerJs($app_js);

