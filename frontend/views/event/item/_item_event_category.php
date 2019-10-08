<?php

use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: pxdung
 * Date: 9/14/2018
 * Time: 3:47 PM
 */

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
?>
<div class=" col-md-3 col-sm-6 col-6 event-item-col">
    <div class="card card-event info-overlay overlay-visible card-category">
        <div class="img has-background"
             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/1.jpg') ?>); background-size:cover ">
            <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"
               class="event-pop-link">


                <div class="event-pop-info">

                    <p class="ec-title"> Fitness </p>
                </div>

            </a>
            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
        </div>
    </div>
</div>
