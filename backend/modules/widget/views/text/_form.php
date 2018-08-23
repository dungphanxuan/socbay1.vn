<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WidgetText */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="text-block-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'key')->textInput(['maxlength' => 1024]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>

    <?php echo $form->field($model, 'body')->widget(
        trntv\aceeditor\AceEditor::class,
        [
            'mode' => 'html'
        ]
    ) ?>

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
