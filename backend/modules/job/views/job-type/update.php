<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\job\JobType */

$this->title = 'Update Job Type: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Job Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-type-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
