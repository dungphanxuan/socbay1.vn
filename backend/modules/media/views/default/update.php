<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\media\Media */

$this->title = 'Cập nhật: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="media-update">

    <?php echo $this->render('_form', [
        'model'      => $model,
        'categories' => $categories,
    ]) ?>

</div>
