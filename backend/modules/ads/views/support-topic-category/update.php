<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ads\support\SupportTopicCategory */

$this->title = 'Update: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Support Topic Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-topic-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
