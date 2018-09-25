<?php

use yii\helpers\Url;
use common\helpers\StringHelper;

/**
 * Created by PhpStorm.
 * User: pxdung
 * Date: 9/14/2018
 * Time: 3:47 PM
 */

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
//For category page
$bundle = \frontend\assets\AdsAsset::register($this);
?>
<div class="col-md-4 col-sm-6 col-12 event-item-col">
    <div class="card card-event info-overlay">
        <div class="img has-background"
             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/1-large.jpg') ?>); background-size:cover ">
            <div class="pop-info ">
                                    <span class="event-badges ">
									    <span class="badge price-tag big badge-default"> FREE</span>
								    </span>
            </div>

            <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"
               class="event-pop-link">
                                    <span class="event-badges ">
									<span class="badge badge-danger"> TOP RATED</span>
								</span>

                <div class="event-pop-info">

                    <p class="price">FREE</p>
                    <p class="publisher">by <strong>Viagrand</strong></p>
                    <div class="event-rating">
                        <div class="star">
                            <i class="fa  fa-star"></i>
                            <i class="fa  fa-star"></i>
                            <i class="fa  fa-star"></i>
                            <i class="fa  fa-star"></i>
                            <i class="fa  fa-star"></i>
                        </div>
                        <div class="review-count"> 5.0 | 101 reviews</div>
                    </div>

                </div>
            </a>


            <!-- //
            To make 100% fit to box & responsive i used a fake image based on actual image ratio.
            Tf you think you will use all same size image then you can remove background image and
            use image below as a main src image.
            -->
            <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>">
                <img alt="340x230" class="card-img-top img-responsive"
                     data-holder-rendered="true"
                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/10x6.gif') ?>"> </a>
        </div>
        <div class="card-body">
            <h4 class="card-title">
                <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"><?php echo StringHelper::truncateWords($model->title, 15) ?></a>
            </h4>
            <p class="card-text hide">Donec imperdiet leo ac ipsum blandit auctor.</p>

            <div class="card-event-info">
                <p class="event-location"><i class="fa icon-location-1"></i>
                    <a class="location" href="#">Valle, Louisiana, 1259 </a></p>
                <p class="event-time"><i class="fa icon-calendar-1"></i> 2018-03-19 03:08pm
                </p>
            </div>
        </div>
        <div class="card-footer">
            <div class="pull-left left">
                <div class="">by <a
                            href="<?php echo Url::to(['/user/view', 'id' => $model->id, 'name' => $model->slug]) ?>">Parrish
                        Zamora </a></div>
            </div>
            <div class="pull-right right social-link">
                <a href="#"><i class="fa  fa-share-alt"></i> </a>

                <a href="#"><i class="fa  fa-heart"></i> </a>
            </div>

        </div>
    </div>
</div>
