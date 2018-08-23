<?php


/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectArea */

$this->title = 'Create Project Area';
$this->params['breadcrumbs'][] = ['label' => 'Project Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-area-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
