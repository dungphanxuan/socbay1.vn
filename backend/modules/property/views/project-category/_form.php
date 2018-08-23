<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectCategory */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="project-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model, [
        'class'  => 'alert alert-warning alert-dismissible',
        'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php echo $form->field($model, 'parent_id')->textInput() ?>

    <?php echo $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <hr class="b2r">

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'thumbnail')->widget(
                \trntv\filekit\widget\Upload::class,
                [
                    'url'             => ['/file-storage/upload'],
                    //'url'             => ['/file-storage/thumb-upload'],
                    'maxFileSize'     => 5000000, // 5 MiB
                    'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                ]);
            ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'total')->textInput() ?>

            <?php echo $form->field($model, 'sort_number')->textInput() ?>

            <?php echo $form->field($model, 'type')->textInput() ?>

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
