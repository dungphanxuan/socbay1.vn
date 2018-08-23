<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ads\ReportReason */

$this->title = 'Update Report Reason: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Report Reasons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-reason-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
