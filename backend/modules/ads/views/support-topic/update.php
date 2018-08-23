<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ads\support\SupportTopic */
/* @var $categories */

$this->title = 'Update: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Support Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-topic-update">

    <?php echo $this->render('_form', [
        'model'      => $model,
        'categories' => $categories,
    ]) ?>

</div>
