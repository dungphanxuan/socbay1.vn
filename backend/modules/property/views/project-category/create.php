<?php


/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectCategory */

$this->title = 'Create Project Category';
$this->params['breadcrumbs'][] = ['label' => 'Project Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
