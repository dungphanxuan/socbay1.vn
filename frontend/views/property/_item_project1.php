<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/30/2018
 * Time: 4:56 PM
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\property\Project;

/* @var $this yii\web\View */
/* @var $model \common\models\property\Project */

$imgThumbnail = baseUrl() . '/frontend/web/theme/images/house/2.jpg';

if ($model->thumbnail_path) {
    $imgThumbnail = $model->getImgThumbnail(5);
}
$urlView = Url::to(['/property/project-view', 'id' => $model->id, 'name' => $model->slug]);
$imgBG = baseUrl() . '/frontend/web/images/bg/property/bgProjectList.jpg';

//todo Mobile Thumbnail
?>
<!--BEGIN: ITEM LIST-->
<div class="item-list">
    <div class="row">
        <div class="col-md-3">
            <a class="image" href="<?php echo $urlView ?>" data-pjax="0">
                <img class="img-responsive lazy"
                     src="<?php echo $imgBG ?>" data-src="<?php echo $imgThumbnail ?>"
                     alt="product" width="230px">
            </a>
        </div>
        <div class="col-md-5 add-desc-box">
            <div class="ads-details">
                <h5 class="att-title">
                    <a href="<?php echo $urlView ?>" data-pjax="0" target="_blank"><?php echo $model->title ?></a>
                </h5>
                <div class="att-user">
                    <p>Dự án tại <?php echo $model->city ? $model->city->name : '' ?></p>
                </div>
                <div class="att-detail">
                    <p>
                        <span>Details:</span>
                        <span>5.56k / sq.ft.</span>
                    </p>
                    <p>
                        <span>Status:</span>
                        <span>Unfurnished, Immediately Available</span>
                    </p>
                </div>
                <!--End: att detail-->
                <div class="att-icon">
                    <p class="bed">3 Bed</p>
                    <p class="bath">3 Bath</p>
                    <p class="parking">2 Parking</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="att-price">
                <p>1 - 3 tỷ</p>
                <p class="text">EMI starts at $23k</p>
            </div>
            <div class="icon-button">
                <a href="#" data-pjax="0" class="link-heart"><i class="fa fa-heart-o"></i></a>
                <a href="#" data-pjax="0" class="link-contact"><?php echo Yii::t('frontend', 'Contact') ?></a>
            </div>
            <!--End: Icon Button-->
        </div>
    </div>
</div>
<!--END: ITEM LIST-->

