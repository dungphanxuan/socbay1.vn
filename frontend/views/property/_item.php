<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use common\helpers\ArticleHelper;
use common\helpers\CloudinaryHelper;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$bundle = AdsAsset::register($this);

$detail = ArticleHelper::getDetail($model->id);
$noImg = baseUrl() . '/frontend/web/images/img-loading-index.jpg';
$imgThumbnail = fileStorage()->baseUrl . '/image/noimg.png';

if (isset($detail['thumb_image'])) {
    $imgThumbnail = CloudinaryHelper::resizingAndCropping($model->thumbnail_base_url, $model->thumbnail_path, 200, 133);
}
$urlView = Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]);
?>
<div class="item-list">

    <div class="row">
        <div class="col-md-3 no-padding photobox">
            <div class="add-image"><span class="photo-count"><i
                            class="fa fa-camera"></i> <?php echo $detail['total_image'] ?> </span>
                <a data-pjax="0" href="<?php echo $urlView ?>">
                    <img class="thumbnail no-margin lazy" src="" data-src="<?php echo $imgThumbnail ?>"
                         alt="<?php echo $model->title ?>"></a>
            </div>
        </div>
        <!--/.photobox-->
        <div class="col-md-6 add-desc-box">
            <div class="ads-details">
                <h5 class="add-title">
                    <a title="<?php echo $model->title ?>" target="_blank" data-pjax="0"
                       href="<?php echo $urlView ?>"> <?php echo StringHelper::truncateWords($model->title, 15) ?></a>
                </h5>
                <span class="info-row"> <span class="item-location"><?php echo $detail['address_text'] ?> |  <a
                                href="<?php echo $detail['map_url'] ?>" target="_blank"><i
                                    class="fa fa-map-marker"></i> <?php echo Yii::t('frontend', 'Map') ?></a>  </span> </span>
                <div class="prop-info-box">

                    <div class="prop-info">
                        <div class="clearfix prop-info-block">
                            <span class="title ">4+2</span>
                            <span class="text"><?php echo Yii::t('ads', 'Adults') ?>
                                | <?php echo Yii::t('ads', 'Children') ?></span>
                        </div>
                        <div class="clearfix prop-info-block middle">
                            <span class="title prop-area">171 m²</span>
                            <span class="text"><?php echo Yii::t('ads', 'Area') ?> (ca.)</span>
                        </div>
                        <div class="clearfix prop-info-block">
                            <span class="title prop-room">4</span>
                            <span class="text"><?php echo Yii::t('ads', 'room') ?> </span>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!--/.add-desc-box-->
        <div class="col-md-3 text-right  price-box">


            <?php echo \frontend\widgets\Star::widget(['model' => $model, 'view' => 'star_property']) ?>

            <a class="btn btn-border-thin  btn-share ">
                <i class="icon icon-export" data-toggle="tooltip" data-placement="left"
                   title="Chia sẻ"></i>
            </a>

            <h3 class="item-price "><strong>2tỷ - 3tỷ </strong></h3>
            <div style="clear: both"></div>

            <a class="btn btn-success btn-sm bold" data-pjax="0"
               href="<?php echo $urlView ?>">
                Xem thông tin
            </a>


        </div>
        <!--/.add-desc-box-->
    </div>
</div>
<!--/.item-list-->