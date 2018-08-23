<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-log-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal'
    ]); ?>

    <?php echo $form->field($model, 'user_ip')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <br>
    <hr class="b2r" style="margin-right:50px;margin-left:50px;">

    <div class="form-group">
        <div class="col-sm-<?php echo $model->isNewRecord ? '3' : '1' ?> col-xs-2"></div>
        <div class="col-sm-3 col-xs-4">
            <?php
            echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span>' . Yii::t('backend', 'Back'),
                ['index'], ['class' => 'btn btn-flat btn-flat btn-default btn200']);
            ?>
        </div>
        <div class="col-sm-3 col-xs-4">
            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') :
                Yii::t('backend', 'Update'), [
                'class' => $model->isNewRecord ? 'btn btn-flat btn-flat btn-success btn200' : 'btn btn-flat btn-flat btn-primary
            btn200'
            ]) ?>
        </div>
        <div class="col-sm-3 col-xs-2">
            <?php
            if (!$model->isNewRecord) {
                echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-flat btn-flat btn-warning btn200 bold',
                        'data'  => [
                            'confirm' => 'Are you sure you want to delete?',
                            'method'  => 'post',
                        ]
                    ]);
            }
            ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
