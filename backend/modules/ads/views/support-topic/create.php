<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ads\support\SupportTopic */

$this->title = 'Create New';
$this->params['breadcrumbs'][] = ['label' => 'Support Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-topic-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
