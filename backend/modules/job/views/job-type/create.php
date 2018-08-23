<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\job\JobType */

$this->title = 'Create Job Type';
$this->params['breadcrumbs'][] = ['label' => 'Job Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-type-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
