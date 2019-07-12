<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $catProvider \yii\data\ActiveDataProvider */
/* @var $pickupProvider \yii\data\ActiveDataProvider */

$this->title = 'Rao vặt số 1 Socbay';

\common\assets\OwlCarousel1::register($this);
$bundle = AdsAsset::register($this);
//bg/banner-media1.jpg
?>

<div class="intro"
     style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/bg3.jpg') ?>);">
    <div class="dtable hw100">
        <div class="dtable-cell hw100">
            <div class="container text-center">
                <h1 class="intro-title  "> <?php echo Yii::t('ads', 'Find Classified Ads') ?> </h1>
                <p class="sub animateme fittext3  "> Thông tin mua bán nhanh chóng </p>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'find-form',
                    'method' => 'get',
                    'action' => ['/ads/index']
                ]) ?>
                <div class="row search-row animated fadeInUp">
                    <div class="col-xl-4 col-sm-4 search-col relative locationicon">
                        <div class="search-col-inner">
                            <i class="icon-location-2 icon-append"></i>
                            <div class="search-col-input">
                                <input type="text" name="country" id="autocomplete-ajax"
                                       class="form-control locinput input-rel searchtag-input has-icon"
                                       placeholder="<?php echo Yii::t('ads', 'City/Zipcode...') ?>" value="">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 search-col relative">
                        <div class="search-col-inner">
                            <i class="icon-docs icon-append"></i>
                            <div class="search-col-input">
                                <input type="text" name="ads"
                                       class="form-control has-icon"
                                       placeholder="<?php echo Yii::t('ads', 'I\'m looking for a ...') ?>" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 search-col">
                        <button class="btn btn-primary btn-search btn-block btn-gradient"><i
                                    class="icon-search"></i><strong><?php echo Yii::t('ads', 'Find') ?></strong>
                        </button>
                    </div>

                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>

<div class="main-container">
    <div class="container">
        <div class="col-lg-12 content-box ">
            <div class="row row-featured row-featured-category">
                <div class="col-lg-12  box-title no-border">
                    <div class="inner"><h2><span><?php echo Yii::t('ads', 'Browse by') ?></span>
                            <?php echo Yii::t('ads', 'Category') ?> <a href="<?php echo Url::to(['/ads/index']) ?>"
                                                                       class="sell-your-item"> <?php echo Yii::t('ads', 'View more') ?>
                                <i
                                        class="  icon-th-list"></i> </a></h2>
                    </div>
                </div>
                <?php echo ListView::widget([
                    'dataProvider' => $catProvider,
                    //'summary'      => '',
                    'layout' => '{items}',
                    'itemView' => '_item_cat',
                    'options' => [
                        'tag' => false,
                    ],
                    'itemOptions' => [
                        'tag' => false,
                    ]
                ]) ?>
            </div>
        </div>
        <div style="clear: both"></div>

        <div class="col-xl-12 content-box ">
            <div class="row row-featured">
                <?php echo $this->render('partical/_list_pickup', ['pickupProvider' => $pickupProvider]) ?>

            </div>
        </div>

        <div class="col-xl-12 content-box ">
            <div class="row row-featured">
                <?php echo $this->render('partical/_list_top', []) ?>
            </div>
        </div>

        <div class="row">
            <?php echo $this->render('partical/_list_wide', []) ?>
        </div>
    </div>
</div>

<div class="page-info hasOverly"
     style="background: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/bg.jpg') ?>); background-size:cover">
    <div class="bg-overly">
        <div class="container text-center section-promo">
            <div class="row">
                <div class="col-sm-3 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon  icon-group"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>2200</span></h5>
                                <div class="iconbox-wrap-text"><?php echo Yii::t('ads', 'Trusted Seller') ?></div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-sm-3 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon  icon-th-large-1"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>100</span></h5>
                                <div class="iconbox-wrap-text"><?php echo Yii::t('ads', 'Categories') ?></div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-sm-3 col-xs-6  col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon  icon-map"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>700</span></h5>
                                <div class="iconbox-wrap-text"><?php echo Yii::t('ads', 'Location') ?></div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-sm-3 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon icon-facebook"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>50,000</span></h5>
                                <div class="iconbox-wrap-text"> <?php echo Yii::t('ads', 'Facebook Fans') ?></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-bottom-info">
    <div class="page-bottom-info-inner">
        <div class="page-bottom-info-content text-center">
            <h1>If you have any questions, comments or concerns, please call the Classified Advertising department
                at (000) 555-5556</h1>
            <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (000) 555-5555 </a>
        </div>
    </div>
</div>
