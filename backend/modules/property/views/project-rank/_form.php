<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectRank */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="project-rank-form">


    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>
            <?php echo $form->errorSummary($model, [
                'class'  => 'alert alert-warning alert-dismissible',
                'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
            ]); ?>
            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'sort_number')->textInput() ?>

            <div class="form-group">
                <?php echo Html::submitButton($model->isNewRecord
                    ? 'Create' : 'Update',
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6">
            <h4>Project Rank</h4>
        </div>
    </div>


</div>
