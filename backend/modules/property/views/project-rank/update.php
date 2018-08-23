<?php

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectRank */

$this->title = 'Update Project Rank: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Project Ranks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-rank-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
