<?php

use yii\helpers\Url;
use yii\helpers\StringHelper;

/**
 * Created by PhpStorm.
 * User: pxdung
 * Date: 9/14/2018
 * Time: 3:47 PM
 */

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
$bundle = \frontend\assets\AdsAsset::register($this);
?>
<div class="col-md-3 col-sm-6 col-6">
    <div class="card card-event info-overlay featured">
        <div class="img has-background"
             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/10-large.jpg') ?>); background-size:cover ">
            <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"
               class="event-pop-link">
                                    <span class="event-badges ">
									<span class="badge badge-success">featured</span>
								</span>

                <div class="event-pop-info">
                    <p class="price">$120.00</p>
                    <p class="publisher">by <strong>Sports Olc.</strong></p>
                    <div class="time">
                        <i class="fa fa-calendar-alt"></i>
                        Starts on Fri, Jan 19
                    </div>
                </div>
            </a>
            <!-- //
            to generate 100% fit to box & responsive i used a fake image based on actual image ratio.
            Tf you think you will use all same size image then you can remove background image and
            use image below as a main src image.
            -->
            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
        </div>

        <div class="card-body">
            <h4 class="card-title"><a
                        href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"><?php echo StringHelper::truncateWords($model->title, 15) ?></a>
            </h4>
        </div>
    </div>
</div>
