<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsAssets */

$this->title = 'Update Ads Assets: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ads Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ads-assets-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
