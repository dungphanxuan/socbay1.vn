<?php


/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectPickup */
/* @var $projects */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Dự án nổi bật', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-pickup-create">

    <?php echo $this->render('_form', [
        'model'    => $model,
        'projects' => $projects,
    ]) ?>

</div>
