<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use common\helpers\CloudinaryHelper;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$bundle = AdsAsset::register($this);
$detail = \common\helpers\ArticleHelper::getDetail($model->id);

$noImg = baseUrl() . '/frontend/web/images/img-loading-index.jpg';
$imgThumbnail = fileStorage()->baseUrl . '/image/noimg.png';
if (isset($detail['thumb_image'])) {
    //$imgThumbnail = $detail['thumb_image'];
    $imgThumbnail = CloudinaryHelper::resizingAndCropping($model->thumbnail_base_url, $model->thumbnail_path, 320, 240);

}

$urlView = Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]);
//$imgThumbnail = $detail['thumb_image'];
?>
<div class="item-list">
    <div class="row">
        <div class="col-md-2 no-padding photobox">
            <div class="add-image"><span class="photo-count"><i
                            class="fa fa-camera"></i> <?php echo $detail['total_image'] ?> </span>
                <a href="<?php echo $urlView ?>" data-pjax="0">
                    <img class="thumbnail no-margin lazy" data-src="<?php echo $imgThumbnail ?>"
                         alt="<?php echo $model->title ?>"
                         src="<?php echo $noImg ?>">
                </a></div>
        </div>
        <!--/.photobox-->
        <div class="add-desc-box col-md-7">
            <div class="ads-details">
                <h5 class="add-title">
                    <a data-pjax="0" target="_blank" title="<?php echo $model->title ?>"
                       href="<?php echo $urlView ?>"><?php echo Html::encode($model->title) ?> </a>
                </h5>
                <span class="info-row">
                    <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right"
                          title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i>
                        <?php echo Yii::$app->formatter->asRelativeTime($model->updated_at) ?> <?php echo $detail['updated_text'] ?> </span> - <span
                            class="category"
                            style="color: #37474F"><?php echo $detail['category_text'] ?> </span>- <span
                            class="item-location"><i
                                class="fa fa-map-marker"></i> <?php echo $detail['address_text'] ?> </span>
                </span>
            </div>
        </div>
        <!--/.add-desc-box-->
        <div class="col-md-3 text-right  price-box">
            <h2 class="item-price"> <?php echo $detail['price-show'] ?> </h2>
            <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i>

                <span>Top Ads</span> </a>
            <a
                    class="btn btn-secondary  btn-sm make-favorite"> <i class="fa fa-heart"></i>  <span>Save</span>
            </a>
        </div>
        <!--/.add-desc-box-->
    </div>
</div>
<!--/.item-list-->
