<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'title', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-id-card-o"></i>']]
    ])->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-link"></i>']]
    ])->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->widget(
        \yii\imperavi\Widget::class,
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                //'imageUpload'  => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-filestack'])
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'view', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-eye"></i>']],
        'template' => '{label} <div class="row"><div class="col-xs-6 col-sm-6">{input}{error}{hint}</div></div>'
    ])->textInput(['maxlength' => true])->label('View hiển thị') ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

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
