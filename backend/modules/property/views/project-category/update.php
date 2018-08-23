<?php

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectCategory */

$this->title = 'Cập nhật danh mục: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Project Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
