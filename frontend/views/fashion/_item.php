<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/12/2018
 * Time: 1:41 PM
 */

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$bundle = AdsAsset::register($this);
$detail = \common\helpers\ArticleHelper::getDetail($model->id);

$imgThumbnail = fileStorage()->baseUrl . '/image/noimage.jpg';
if ($model->thumbnail_path) {
    $imgThumbnail = $model->getImgThumbnail(2, 75, 152, 312);
}
$showBrand = false;
?>
<div class="item-product">
    <div class="image">
        <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>" title="images">
            <img class="img-responsive lazy"
                 data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/box/item/product1.jpeg') ?>"
                 alt="<?php echo $model->title ?>"
                 width="98px">
        </a>
    </div>
    <!--End: image-->
    <div class="desc">
        <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>" target="_blank"
           title="<?php echo $model->title ?>"><h5
                    class="title"><?php echo StringHelper::truncateWords($model->title, 15) ?></h5></a>
        <div class="add-rating">
            <span class="icon-rate">4.4 <i class="fa fa-star"></i></span>
        </div>
        <?php if ($showBrand): ?>
            <span class="brand">
                                        <img width="80px" class="lazy"
                                             data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/box/item/product-brand.png') ?>"
                                             alt="facebook">
        </span>
        <?php endif; ?>
        <div class="price-box">
            <span>25.99$ </span>
            <span class="price-old">25.99$ </span>
            <span class="off">40% off</span>
        </div>
        <div class="month">300$/month EMI</div>
        <div class="offers">
            <p><span>Offers</span> Bank Offer</p>
        </div>
    </div>
    <!--End: desc-->
</div>
<!--END: ITEM PRODUCT-->
