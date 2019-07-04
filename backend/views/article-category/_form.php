<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $categories array */
/* @var $categoryType array */
?>

<div class="article-category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php echo $form->errorSummary($model, [
        'class' => 'alert alert-warning alert-dismissible',
        'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
    ]); ?>

    <?php echo $form->field($model, 'title', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-id-card-o"></i>']]
    ])->textInput(['maxlength' => 512]) ?>

    <?php echo $form->field($model, 'slug', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-link"></i>']]
    ])
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => 1024]) ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'parent_id', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-folder-open-o"></i>']]
            ])->dropDownList($categories, ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'type', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-folder-open-o"></i>']]
            ])->dropDownList($categoryType, ['prompt' => '']) ?>
        </div>
    </div>

    <?php
    echo $form->field($model, 'thumbnail')->widget(
        \trntv\filekit\widget\Upload::class,
        //\backend\widgets\UploadCloud::class,
        [
            //'url' => ['http://localhost:7000/upload'],
            //'url'             => ['/file-storage/upload'],
            //'url'             => ['/file-storage/upload-gcloud'],
            'url' => ['/file-storage/upload-storage'],
            //'url'             => ['/file-storage/upload-filestack-action'],
            //'url'             => ['/file-storage/upload-cloudinary'],
            //'url'             => ['http://localhost:7000/upload'],
            'maxFileSize' => 500000000, // 5 MiB
            //'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
        ])->hint('Ảnh thumbnail');

    ?>


    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php
    // Usage without a model
    /*echo '<label class="control-label">Upload Document</label>';
    echo \kartik\widgets\FileInput::widget([
        'name' => 'file',
        'pluginOptions' => [
            'uploadUrl' => \yii\helpers\Url::to('http://localhost:7000/upload', true),
            'uploadExtraData' => [
                'album_id' => 20,
                'cat_id' => 'Nature'
            ],
            'maxFileCount' => 10
        ]
    ]);*/
    ?>
    <hr class="b2r">

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?php echo Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Quay lại', ['index'], ['class' => 'btn btn-flat btn-default']); ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
