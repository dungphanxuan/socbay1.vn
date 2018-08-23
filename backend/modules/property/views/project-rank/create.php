<?php


/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectRank */

$this->title = 'Create Project Rank';
$this->params['breadcrumbs'][] = ['label' => 'Project Ranks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-rank-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
