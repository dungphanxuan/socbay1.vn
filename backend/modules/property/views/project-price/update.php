<?php

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectPrice */

$this->title = 'Cập nhật: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Project Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-price-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
