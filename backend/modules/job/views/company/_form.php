<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\job\Company */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model, [
        'class' => 'alert alert-warning alert-dismissible',
        'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <?php echo $form->field($model, 'contact_id')->textInput() ?>

            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'title_short')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'body')->widget(
                \yii\imperavi\Widget::class,
                [
                    'plugins' => ['fullscreen', 'fontcolor', 'video'],
                    'options' => [
                        'minHeight' => 200,
                        'maxHeight' => 200,
                        'buttonSource' => true,
                        'convertDivs' => false,
                        'removeEmptyTags' => true,
                        'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi']),
                    ],
                ]
            ) ?>

        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'thumbnail')->widget(
                Upload::class,
                [
                    'url' => ['/file-storage/upload'],
                    //'url'             => ['/file-storage/thumb-upload'],
                    'maxFileSize' => 5000000, // 5 MiB
                    'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                ])->hint('Ảnh thumbnail');
            ?>

            <?php echo $form->field($model, 'banner')->widget(
                Upload::class,
                [
                    'url' => ['/file-storage/upload'],
                    //'url'             => ['/file-storage/thumb-upload'],
                    'maxFileSize' => 5000000, // 5 MiB
                    'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                ])->hint('Ảnh banner');
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <?php echo $form->field($model, 'excerpt')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-8"></div>
    </div>

    <hr class="b2r">

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>


            <?php echo $form->field($model, 'complete_on')->textInput() ?>

        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'lat')->textInput() ?>

            <?php echo $form->field($model, 'lng')->textInput() ?>

            <?php echo $form->field($model, 'sort_number')->textInput() ?>

            <?php echo $form->field($model, 'type')->textInput() ?>

        </div>
    </div>
    <?php echo $form->field($model, 'start_date')->textInput() ?>

    <?php echo $form->field($model, 'end_date')->textInput() ?>


    <?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'published_at')->textInput() ?>

    <hr class="b2r">
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord
            ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
