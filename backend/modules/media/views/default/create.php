<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\media\Media */
/* @var $categories */

$this->title = 'Thêm mới Media';
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-create">

    <?php echo $this->render('_form', [
        'model'      => $model,
        'categories' => $categories,
    ]) ?>

</div>
