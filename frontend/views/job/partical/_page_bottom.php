<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 3/29/2018
 * Time: 2:20 PM
 */

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$bundle = \frontend\assets\AdsAsset::register($this);
?>
<div class="page-info hasOverly"
     style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/jobs/2.jpg') ?>);    background-position: center center;  background-size:cover">
    <div class="bg-overly">
        <div class="container text-center section-promo">
            <div class="row">
                <div class="col-sm-3 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon  icon-commerical-building"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>2200+</span></h5>

                                <div class="iconbox-wrap-text"><?php echo Yii::t('frontend', 'Companies') ?></div>
                            </div>
                        </div>
                        <!-- /..iconbox -->
                    </div>
                    <!--/.iconbox-wrap-->
                </div>

                <div class="col-sm-3 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon  icon-briefcase"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>400K+</span></h5>

                                <div class="iconbox-wrap-text"><?php echo Yii::t('frontend', 'Live Jobs') ?></div>
                            </div>
                        </div>
                        <!-- /..iconbox -->
                    </div>
                    <!--/.iconbox-wrap-->
                </div>

                <div class="col-sm-3 col-xs-6  col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon  icon-users"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>3000+</span></h5>

                                <div class="iconbox-wrap-text"> <?php echo Yii::t('frontend', 'Resume') ?></div>
                            </div>
                        </div>
                        <!-- /..iconbox -->
                    </div>
                    <!--/.iconbox-wrap-->
                </div>

                <div class="col-sm-3 col-xs-6 col-xxs-12">
                    <div class="iconbox-wrap">
                        <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                                <i class="icon icon-doc-1"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                                <h5><span>2000+</span></h5>

                                <div class="iconbox-wrap-text"> <?php echo Yii::t('frontend', 'Resources') ?></div>
                            </div>
                        </div>
                        <!-- /..iconbox -->
                    </div>
                    <!--/.iconbox-wrap-->
                </div>

            </div>

        </div>
    </div>
</div>
<!-- /.page-info -->

<div class="page-bottom-info">
    <div class="page-bottom-info-inner">

        <div class="page-bottom-info-content text-center">
            <h1>If you have any questions, comments or concerns, please call Career Services
                at (000) 555-5555</h1>
            <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (000) 555-5555 </a>
        </div>

    </div>
</div>
