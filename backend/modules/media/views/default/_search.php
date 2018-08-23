<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\media\MediaSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="media-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'slug') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'body') ?>

    <?php echo $form->field($model, 'excerpt') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'view') ?>

    <?php // echo $form->field($model, 'episode') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'thumbnail_base_url') ?>

    <?php // echo $form->field($model, 'thumbnail_path') ?>

    <?php // echo $form->field($model, 'video_play_type') ?>

    <?php // echo $form->field($model, 'url_local') ?>

    <?php // echo $form->field($model, 'url_streaming') ?>

    <?php // echo $form->field($model, 'youtube_id') ?>

    <?php // echo $form->field($model, 'youtube_url') ?>

    <?php // echo $form->field($model, 'vimeo_url') ?>

    <?php // echo $form->field($model, 'review_url') ?>

    <?php // echo $form->field($model, 'review_type') ?>

    <?php // echo $form->field($model, 'view_count') ?>

    <?php // echo $form->field($model, 'like_count') ?>

    <?php // echo $form->field($model, 'dislike_count') ?>

    <?php // echo $form->field($model, 'share_count') ?>

    <?php // echo $form->field($model, 'favorite_count') ?>

    <?php // echo $form->field($model, 'comment_count') ?>

    <?php // echo $form->field($model, 'matched') ?>

    <?php // echo $form->field($model, 'is_syn') ?>

    <?php // echo $form->field($model, 'min_total') ?>

    <?php // echo $form->field($model, 'next_id') ?>

    <?php // echo $form->field($model, 'preview_id') ?>

    <?php // echo $form->field($model, 'login_require') ?>

    <?php // echo $form->field($model, 'is_hot') ?>

    <?php // echo $form->field($model, 'video_status') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'published_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' =>
                                                     'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn
        btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
