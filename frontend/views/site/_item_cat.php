<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\ArticleCategory */

$bgImg = baseUrl() . '/frontend/web/images/bg/bg-feature-home.jpg';
$bundle = \frontend\assets\AdsAsset::register($this);
?>
<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
    <a href="<?php echo Url::to(['/ads/index', 'cslug' => $model['slug']]) ?>" target="_blank">
        <img src="<?= $bgImg ?>"
             data-src="<?php echo $model['thumbnail_show'] ?>"
             class="img-responsive lazy" alt="img">
        <h6> <?php echo $model['title'] ?> </h6></a>
</div>
