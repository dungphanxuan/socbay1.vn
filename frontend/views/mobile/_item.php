<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/2/2018
 * Time: 1:57 PM
 */

use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$bundle = AdsAsset::register($this);
$detail = \common\helpers\ArticleHelper::getDetail($model->id);

$imgThumbnail = fileStorage()->baseUrl . '/image/noimage.jpg';
if ($model->thumbnail_path) {
    $imgThumbnail = $model->getImgThumbnail(2, 75, 98, 201);
}

$showBrand = false;
//$imgThumbnail = $detail['thumb_image'];

$imgThumbnail = $this->assetManager->getAssetUrl($bundle, 'images/mobile/product1.jpeg')
?>
<!--BEGIN: ITEM LIST-->
<div class="item-list">
    <div class="row">
        <div class="col-md-3">
            <div class="image">
                <span class="icon-offer">Giảm giá</span>
                <img class="img-responsive lazy"
                     data-src="<?php echo $imgThumbnail ?>" alt="<?php echo $model->title ?>"
                     width="98px">
                <label class="input-compare">Thêm vào so sánh
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="col-md-6 add-desc-box">
            <div class="ads-details">
                <h5 class="add-title">
                    <a title="<?php echo $model->title ?>" target="_blank"
                       href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"> <?php echo $model->title ?></a>
                </h5>
                <div class="add-rating">
                    <span class="icon-rate">4.4 <i class="fa fa-star"></i></span>
                    <span>31,826 Xếp hạng & 4.239 Lượt đánh giá</span>
                </div>
                <ul>
                    <li>32 GB ROM</li>
                    <li>4.7 inch Retina HD Display</li>
                    <li>8MP Rear Camera | 1.2MP Front Camera</li>
                    <li>Li-Ion Battery</li>
                    <li>Apple A8 64-bit processor and M8 Motion Co-processor</li>
                    <li>Brand Warranty of 1
                        <Year></Year>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="price">
                <p>25.99$ </p>
                <?php if ($showBrand): ?>
                    <span class="brand">
                                                <img width="80px"
                                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/mobile/product-brand.png') ?>"
                                                     alt="facebook">
                                            </span>
                <?php endif; ?>
            </div>
            <div class="price-old">
                <span>28.99$</span>
                <span class="sale-off">11% tiết kiệm</span>
            </div>
            <div class="detail-price">
                <p>Up to <b>18.00$</b> Off on Exchange </p>
                <p>EMI starting form <b>$1261/month</b></p>
            </div>
            <div class="offer">
                <p>Offers</p>
                <ul>
                    <li>No Cost EMI</li>
                    <li>Special Price</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--END: ITEM LIST-->
