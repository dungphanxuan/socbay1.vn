<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KeyStorageItem */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="key-storage-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'key', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-key"></i>']]
    ])->textInput() ?>

    <?php echo $form->field($model, 'value', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-file"></i>']]
    ])->textInput() ?>

    <?php echo $form->field($model, 'comment')->textarea() ?>

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
