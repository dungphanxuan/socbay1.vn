<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectSearch */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $prices */
/* @var $areas */
/* @var $ranks */
/* @var $categories */
?>

<div class="project-search box-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal'
    ]); ?>

    <div class="row">
        <div class="col-sm-6">
            <?php
            echo $form->field($model, 'category_id')->widget(Select2::class, [
                'data'          => ArrayHelper::map(
                    $categories,
                    'id',
                    'title'
                ),
                'options'       => ['placeholder' => 'Chọn danh mục ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-sm-6">
            <?php
            echo $form->field($model, 'title')->textInput()
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?php
            echo $form->field($model, 'price_id')->widget(Select2::class, [
                'data'          => ArrayHelper::map(
                    $prices,
                    'id',
                    'title'
                ),
                'options'       => ['placeholder' => 'Chọn mức giá ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-sm-6">
            <?php
            echo $form->field($model, 'area_id')->widget(Select2::class, [
                'data'          => ArrayHelper::map(
                    $areas,
                    'id',
                    'title'
                ),
                'options'       => ['placeholder' => 'Chọn diện tích ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>


    </div>
    <div class="row">
        <div class="col-sm-6">
            <?php
            echo $form->field($model, 'level')->widget(Select2::class, [
                'data'          => ArrayHelper::map(
                    $ranks,
                    'id',
                    'title'
                ),
                'options'       => ['placeholder' => 'Chọn hạng ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-sm-6">
            <?php
            echo $form->field($model, 'status')->dropDownList(
                [1 => 'Xuất bản', 0 => 'Chưa xuất bản'],
                ['prompt' => 'Chọn trạng thái...']
            )->label('Trạng thái')
            ?>
        </div>


    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-flat btn-primary btn-block']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
