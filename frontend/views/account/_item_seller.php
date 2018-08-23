<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$bundle = AdsAsset::register($this);
$detail = \common\helpers\ArticleHelper::getDetail($model->id);
?>
<div class="item-list">
    <div class="row">
        <div class="col-md-2 no-padding photobox">
            <div class="add-image"><span class="photo-count"><i
                            class="fa fa-camera"></i> 2 </span>
                <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"><img
                            class="thumbnail no-margin lazy"
                            data-src="<?php echo $model->getImgThumbnail(2, 75, 100, 75) ?>"
                            alt="img"></a></div>
        </div>
        <!--/.photobox-->
        <div class="col-sm-7 add-desc-box">
            <div class="ads-details">
                <h5 class="add-title"><a
                            href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"> <?php echo $model->title ?></a>
                </h5>
                <span class="info-row"> <span class="add-type business-ads tooltipHere"
                                              data-toggle="tooltip" data-placement="right"
                                              title="Business Ads">B </span> <span class="date"><i
                                class=" icon-clock"> </i> Today 1:21 pm </span> - <span
                            class="category">Electronics </span>- <span class="item-location"><i
                                class="fa fa-map-marker"></i> Hà Nội </span> </span></div>
        </div>
        <!--/.add-desc-box-->
        <div class="col-md-3 text-right  price-box">
            <h2 class="item-price"> $ 230</h2>
            <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span>
            </a></div>
        <!--/.add-desc-box-->
    </div>
</div>
<!--/.item-list-->
