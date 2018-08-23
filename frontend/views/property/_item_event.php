<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/4/2018
 * Time: 10:11 AM
 */

use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
$bundle = AdsAsset::register($this);
?>
<div class="col-md-8">
    <img data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/box/blog1.jpg') ?>" alt="blog"
         src="" class="img-responsive lazy">
</div>
<div class="col-md-4">
    <h3>Sự kiện bất động sản</h3>
    <p>A mobile focused responsive template that showcases image or text based blog entries, a subscription CTA,
        search & share links, and an expanded article page width comments, counters and bookmarking capab bilities
        bilt-in.</p>
    <div class="bottom-action">
        <a href="#" title="download"><i class="fa fa-download"></i> Tham dự</a>
        <a href="<?php echo Url::to(['/property/event-view', 'id' => $model->id, 'name' => $model->slug]) ?>"
           title="preview"><i class="fa fa-arrow-right"></i> Xem chi tiết</a>
    </div>
</div>
