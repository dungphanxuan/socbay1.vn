<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\job\JobCategory */

$this->title = 'Create Job Category';
$this->params['breadcrumbs'][] = ['label' => 'Job Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
