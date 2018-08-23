<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\media\MediaCategory */

$this->title = 'Create Media Category';
$this->params['breadcrumbs'][] = ['label' => 'Media Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
