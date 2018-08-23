<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ads\ReportReason */

$this->title = 'Create Report Reason';
$this->params['breadcrumbs'][] = ['label' => 'Report Reasons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-reason-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
