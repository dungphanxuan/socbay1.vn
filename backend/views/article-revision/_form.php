<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleRevision */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="article-revision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'article_id')->textInput() ?>

    <?php echo $form->field($model, 'revision')->textInput() ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'body')->widget(
        \froala\froalaeditor\FroalaEditorWidget::class,
        [
            'options' => [
            ],
            'csrfCookieParam' => '_csrf',
            'clientOptions' => [
                'toolbarInline' => false,
                'height' => 350,
                'imageDefaultWidth' => 1000,
                'theme' => 'royal',
                'language' => 'en_gb',
                //'toolbarButtons' => ['fullscreen', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage'],
                'imageUploadURL' => Url::to(['/file-storage/upload-froala']),
                'fileUploadURL' => Url::to(['/file-storage/upload-froala']),
                'imageManagerLoadURL' => Url::to(['/file-storage/file-froala'])
            ],
            //'clientPlugins' => [ 'fullscreen', 'paragraph_format', 'image', 'file', 'image_manager' ]
        ]
    )
    ?>
    <?php echo $form->field($model, 'tagNames')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'category_id')->textInput() ?>

    <?php echo $form->field($model, 'yii_version')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'memo')->textInput(['maxlength' => true]) ?>

    <hr class="b2r">

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Go Back', ['index'], ['class' => 'btn btn-flat btn-default']); ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
