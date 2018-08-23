<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\job\Company */

$this->title = 'Update Company: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
