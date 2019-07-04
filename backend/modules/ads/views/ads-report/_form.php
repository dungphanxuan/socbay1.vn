<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsReport */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="ads-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'reason_id', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-folder-open-o"></i>']]
            ])->widget(\kartik\widgets\Select2::class, [
                'data' => ArrayHelper::map($reasons, 'id', 'title'),
                'options' => [
                    'placeholder' => 'Select ...',
                    'id' => 'ccatid'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'addon' => [
                    'append' => [
                        'content' => '<a href="' . Url::to(['/ads/report-reason/index']) . '" target="_blank" class="fa fa-plus blue imouse"></a>',
                        'asButton' => false
                    ]
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'report_id')->textInput() ?>

        </div>
    </div>
    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'sort_number')->textInput() ?>

    <?php echo $form->field($model, 'approve_by')->textInput() ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord
            ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
