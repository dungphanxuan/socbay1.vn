<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\media\MediaCategory */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="media-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'parent_id')->textInput() ?>

    <?php echo $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'type')->textInput() ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'sort_number')->textInput() ?>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?php echo Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Quay lại', ['index'], ['class' => 'btn btn-flat btn-default']); ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
