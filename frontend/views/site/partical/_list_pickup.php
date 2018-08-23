<?php

use yii\helpers\Url;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/26/2017
 * Time: 3:52 PM
 */

/* @var $pickupProvider  \yii\data\ActiveDataProvider */
/* @var $this \yii\web\View */

$bundle = \frontend\assets\AdsAsset::register($this);
?>
<div class="col-xl-12  box-title ">
    <div class="inner"><h2><span><?php echo Yii::t('ads', 'Sponsored') ?> </span>
            <?php echo Yii::t('ads', 'Products') ?> <a href="<?php echo Url::to(['/ads/index']) ?>"
                                                       class="sell-your-item"> <?php echo Yii::t('ads', 'View more') ?>
                <i
                        class="  icon-th-list"></i> </a></h2>

    </div>
</div>

<div style="clear: both"></div>

<div class=" relative  content featured-list-row  w100">

    <nav class="slider-nav has-white-bg nav-narrow-svg">
        <a class="prev">
            <span class="nav-icon-wrap"></span>

        </a>
        <a class="next">
            <span class="nav-icon-wrap"></span>
        </a>
    </nav>

    <div class="no-margin featured-list-slider ">
        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $pickupProvider,
            //'summary'      => '',
            'layout'       => '{items}',
            'itemView'     => '_item_pickup',
            'options'      => [
                'tag' => false,
            ],
            'itemOptions'  => [
                'tag' => false,
            ]
        ]) ?>
    </div>
</div>

