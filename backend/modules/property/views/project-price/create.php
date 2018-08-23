<?php


/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectPrice */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Project Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-price-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
