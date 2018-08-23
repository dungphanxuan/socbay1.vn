<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$bundle = AdsAsset::register($this);
?>
<div class="item-list">

    <div class="row">
        <div class="col-md-3 no-padding photobox">
            <div class="add-image"><span class="photo-count"><i
                            class="fa fa-camera"></i> 3 </span> <a href="property-details.html"><img
                            class="thumbnail no-margin"
                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/thumb/13.jpg') ?>"
                            alt="img"></a></div>
        </div>
        <!--/.photobox-->
        <div class="col-md-6 add-desc-box">
            <div class="ads-details">
                <h5 class="add-title"><a href="property-details.html">
                        Exclusive and modern luxury apartment Union Avenue </a></h5>
                <span class="info-row"> <span class="item-location">544 Union Avenue, Brooklyn, NY 11211 |  <a><i
                                    class="fa fa-map-marker"></i> Map</a>  </span> </span>
                <div class="prop-info-box">

                    <div class="prop-info">
                        <div class="clearfix prop-info-block">
                            <span class="title ">4+2</span>
                            <span class="text">Adults | Children</span>
                        </div>
                        <div class="clearfix prop-info-block middle">
                            <span class="title prop-area">171 m²</span>
                            <span class="text">Area (ca.)</span>
                        </div>
                        <div class="clearfix prop-info-block">
                            <span class="title prop-room">4</span>
                            <span class="text">room </span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--/.add-desc-box-->
        <div class="col-md-3 text-right  price-box">

            <a class="btn btn-border-thin  btn-save" title="save ads" data-toggle="tooltip"
               data-placement="left">
                <i class="icon icon-heart"></i>
            </a>
            <a class="btn btn-border-thin  btn-share ">
                <i class="icon icon-export" data-toggle="tooltip" data-placement="left"
                   title="share"></i>
            </a>

            <h3 class="item-price "><strong>$2400 - $4260 </strong></h3>
            <div style="clear: both"></div>

            <a class="btn btn-success btn-sm bold" href="property-details.html">
                Check Availabilty
            </a>


        </div>
        <!--/.add-desc-box-->
    </div>
</div>
<!--/.item-list-->

