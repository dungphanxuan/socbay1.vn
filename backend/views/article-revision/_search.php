<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \backend\models\search\ArticleRevisionSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="article-revision-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'article_id') ?>

    <?php echo $form->field($model, 'revision') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'common') ?>

    <?php echo $form->field($model, 'thumbnail_base_url') ?>

    <?php // echo $form->field($model, 'thumbnail_path') ?>

    <?php // echo $form->field($model, 'tagNames') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'yii_version') ?>

    <?php // echo $form->field($model, 'memo') ?>

    <?php // echo $form->field($model, 'updater_id') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
