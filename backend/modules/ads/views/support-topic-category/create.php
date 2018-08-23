<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ads\support\SupportTopicCategory */

$this->title = 'Create New';
$this->params['breadcrumbs'][] = ['label' => 'Support Topic Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-topic-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
