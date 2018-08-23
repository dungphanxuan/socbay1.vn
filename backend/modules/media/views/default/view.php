<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\media\Media */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-view">

    <p>
        <?php echo Html::a('Update',
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete',
            ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'body:ntext',
            'excerpt:ntext',
            'type',
            'view',
            'episode',
            'category_id',
            'thumbnail_base_url:url',
            'thumbnail_path',
            'video_play_type',
            'url_local:url',
            'url_streaming:url',
            'youtube_id',
            'youtube_url:url',
            'vimeo_url:url',
            'review_url:url',
            'review_type',
            'view_count',
            'like_count',
            'dislike_count',
            'share_count',
            'favorite_count',
            'comment_count',
            'matched',
            'is_syn',
            'min_total',
            'next_id',
            'preview_id',
            'login_require',
            'is_hot',
            'video_status',
            'status',
            'created_by',
            'updated_by',
            'published_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
