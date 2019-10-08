<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsAssets */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ads Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-assets-view">

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
            'title',
            'slug',
            'body:ntext',
            'parent_id',
            'key',
            'thumbnail_base_url:url',
            'thumbnail_path',
            'thumbnail_base_url_data:url',
            'thumbnail_path_data',
            'type',
            'status',
            'sort_number',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
