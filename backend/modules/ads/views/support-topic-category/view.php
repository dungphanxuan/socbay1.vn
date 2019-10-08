<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ads\support\SupportTopicCategory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Support Topic Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-topic-category-view">

    <p>
        <?php echo Html::a('Update',
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete',
            ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'body:ntext',
            'excerpt:ntext',
            'icon',
            'color',
            'parent_id',
            'sort_number',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
