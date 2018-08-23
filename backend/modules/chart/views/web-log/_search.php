<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-log-search">

    <?php $form = ActiveForm::begin([
        'action'  => ['index'],
        'method'  => 'get',
        'options' => [
            'class' => 'form-inline'
        ]
    ]); ?>

    <?php echo $form->field($model, 'user_ip') ?>

    <?php echo $form->field($model, 'action') ?>

    <?php echo $form->field($model, 'url') ?>

    <?php echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-flat btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-flat btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
