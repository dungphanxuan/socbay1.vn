<?php

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectPickup */
/* @var $projects */

$this->title = 'Cập nhật: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dự án nổi bật', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="project-pickup-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'projects' => $projects,
    ]) ?>

</div>
