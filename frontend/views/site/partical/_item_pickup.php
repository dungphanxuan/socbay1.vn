<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/11/2018
 * Time: 11:15 AM
 */

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$detail = \common\helpers\ArticleHelper::getDetail($model->id);

$imgThumbnail = fileStorage()->baseUrl . '/image/noimage.jpeg';
if ($model->thumbnail_path) {
    $imgThumbnail = $model->getImgThumbnail(2, 75, 320, 240);
}
$priceText = $detail['price-show'];
?>
<div class="item">
    <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>" target="_blank">
                     <span class="item-carousel-thumb">
                    	<img class="img-responsive lazy" src=""
                             data-src="<?php echo $imgThumbnail ?>"
                             alt="img">
                     </span>
        <span class="item-name"> <?php echo \yii\helpers\StringHelper::truncateWords($model->title, 6) ?> </span>
        <span class="price"> $ <?php echo $priceText ?> </span>
    </a>
</div>
