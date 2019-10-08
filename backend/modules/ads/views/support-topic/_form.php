<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\ads\support\SupportTopic */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $categories */
?>

<div class="support-topic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model, [
        'class' => 'alert alert-warning alert-dismissible',
        'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
    ]); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'category_id', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-folder-open-o"></i>']]
            ])->widget(\kartik\widgets\Select2::class, [
                'data' => ArrayHelper::map($categories, 'id', 'title'),
                'options' => [
                    'placeholder' => 'Chọn category ...',
                    'id' => 'ccatid'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'addon' => [
                    'append' => [
                        'content' => '<a href="' . Url::to(['/ads/support-topic-category/index']) . '" target="_blank" class="fa fa-plus blue imouse"></a>',
                        'asButton' => false
                    ]
                ],
            ]);
            ?> </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'view')->textInput() ?>
        </div>
    </div>
    <hr class="b2r">
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'thumbnail')->widget(
                Upload::class,
                [
                    'url' => ['/file-storage/upload'],
                    'maxFileSize' => 5000000, // 5 MiB
                    'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                ]);
            ?>
        </div>
        <div class="col-md-8">
            <?php echo $form->field($model, 'attachments')->widget(
                Upload::class,
                [
                    'url' => ['/file-storage/upload'],
                    'sortable' => true,
                    'maxFileSize' => 10000000, // 10 MiB
                    'maxNumberOfFiles' => 10,
                ]);
            ?></div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'featured')->checkbox() ?>

        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'sort_number')->textInput() ?>
        </div>
    </div>

    <?php echo $form->field($model, 'status')->checkbox() ?>
    <hr class="b2r">
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord
            ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
