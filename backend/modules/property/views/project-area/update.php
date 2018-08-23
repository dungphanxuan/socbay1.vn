<?php

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectArea */

$this->title = 'Update Project Area: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Project Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-area-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
