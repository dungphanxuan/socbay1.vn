<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 3/21/2018
 * Time: 3:46 PM
 */

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$urlView = Url::to(['/blog/view', 'id' => $model->id, 'name' => $model->slug]);

$bundle = AdsAsset::register($this);
?>
<div class="item-list">

    <div class="col-sm-4 col-xs-4 no-padding photobox">
        <div class="add-image"><a href="<?php echo $urlView ?>"><img class="no-margin"
                                                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/item/tp/Image00006.jpg') ?>"
                                                                     alt="img"></a>
        </div>
    </div>
    <!--/.photobox-->
    <div class="col-sm-8 col-xs-8 add-desc-box">
        <div class="ads-details">
            <h5 class="add-title"><a href="<?php echo $urlView ?>"><?php echo $model->title ?> </a></h5>
            <span class="info-row">  <span class="date"><i
                            class=" icon-clock"> </i> <?php echo getFormat()->asDate($model->created_at) ?></span> </span>
        </div>
    </div>
    <!--/.add-desc-box-->


</div>
