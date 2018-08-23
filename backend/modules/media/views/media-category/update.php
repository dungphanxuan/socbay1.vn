<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\media\MediaCategory */

$this->title = 'Update Media Category: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Media Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="media-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
