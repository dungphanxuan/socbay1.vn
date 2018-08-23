<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebLog */

$this->title = 'Cập nhật thông tin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Time', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="web-log-update">


    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
