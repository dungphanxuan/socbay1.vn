<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 2/23/2018
 * Time: 10:46 AM
 */

use yii\helpers\Url;
use frontend\assets\AdsAsset;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $dataPopularProvider \yii\data\ActiveDataProvider */

$urlView = Url::to(['/blog/view', 'id' => $model->id, 'name' => $model->slug]);

$bundle = AdsAsset::register($this);
?>
<div class="item-list">
    <div class="row">

        <div class="col-sm-4 col-xs-4 no-padding photobox">
            <div class="add-image"><a href="<?php echo $urlView ?>">
                    <img class="no-margin lazy"
                         src="" data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/blog/5.jpg') ?>"
                         alt="img"></a>
            </div>
        </div>
        <!--/.photobox-->
        <div class="col-sm-8 col-xs-8 add-desc-box">
            <div class="ads-details">
                <h5 class="add-title"><a href="<?php echo $urlView ?>"><?php echo $model->title ?></a></h5>
                <span class="info-row">  <span class="date"><i
                                class=" icon-clock"> </i> <?php echo getFormat()->asDate($model->created_at) ?> </span> </span>
            </div>
        </div>
        <!--/.add-desc-box-->
    </div>

</div>
