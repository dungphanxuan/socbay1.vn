<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsReportSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="ads-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'reason_id') ?>

    <?php echo $form->field($model, 'slug') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'report_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'user_email') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'district_id') ?>

    <?php // echo $form->field($model, 'ward_id') ?>

    <?php // echo $form->field($model, 'thumbnail_base_url') ?>

    <?php // echo $form->field($model, 'thumbnail_path') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'sort_number') ?>

    <?php // echo $form->field($model, 'approve_by') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' =>
                                                     'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn
        btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
