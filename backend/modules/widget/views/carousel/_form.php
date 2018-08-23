<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WidgetCarousel */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="widget-carousel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'key')->textInput(['maxlength' => 1024]) ?>

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
