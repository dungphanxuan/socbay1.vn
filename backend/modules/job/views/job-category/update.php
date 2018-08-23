<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\job\JobCategory */

$this->title = 'Update Job Category: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Job Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-category-update">

    <?php echo $this->render('_form', [
        'model'      => $model,
        'categories' => $categories,
    ]) ?>

</div>
