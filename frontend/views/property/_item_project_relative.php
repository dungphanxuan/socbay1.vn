<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 3/28/2018
 * Time: 8:30 AM
 */

use yii\helpers\Url;
use yii\helpers\Html;
use common\assets\LightSlider;
use frontend\assets\PropertyAsset;
use frontend\assets\AdsAsset;
use common\models\property\Project;

/* @var $this yii\web\View */
/* @var $model Project */
$urlView = Url::to(['/property/project-view', 'id' => $model->id, 'name' => $model->slug]);

$bundle = AdsAsset::register($this);
?>

<div class="sidebar-panel sidebar-property">
    <div class="images">
        <a href="<?php echo $urlView ?>">
            <img src=""
                 data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/2.jpg') ?>"
                 alt="images" class="img-responsive lazy">
        </a>
        <a href="#" class="icon-heart"></a>
    </div>
    <a href="<?php echo $urlView ?>" title="title">
        <h3><?php echo $model->title ?></h3>
    </a>
    <div class="price">
        <p>
            <span>$ 322,000</span>
            <span>Actual Price</span>
        </p>
        <p>
            <span>$ 404,900</span>
            <span>Total Return</span>
        </p>
    </div>
    <!--End: price-->
    <div class="user">
        <div class="images">
            <img src="" data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/3.jpg') ?>"
                 alt="images" class="img-responsive lazy">
        </div>
        <div class="text">
            <h4>Tập đoàn </h4>
            <p class="rate">
                <i class="fa fa-star active"></i>
                <i class="fa fa-star active"></i>
                <i class="fa fa-star active"></i>
                <i class="fa fa-star active"></i>
                <i class="fa fa-star"></i>
            </p>
            <p class="sale">4.5/38 Sales</p>
        </div>
    </div>
    <!--End: user-->
    <a href="<?php echo $urlView ?>" class="btn link-green" target="_blank">Xem dự án</a>
</div>
<!--End: sidebar panel-->

