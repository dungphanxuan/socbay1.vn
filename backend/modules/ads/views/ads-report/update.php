<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsReport */

$this->title = 'Update Ads Report: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ads Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ads-report-update">

    <?php echo $this->render('_form', [
        'model'   => $model,
        'reasons' => $reasons,
    ]) ?>

</div>
