<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\ads\ReportReason */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="report-reason-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'parent_id')->textInput() ?>

    <?php echo $form->field($model, 'type')->textInput() ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'sort_number')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord
            ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
