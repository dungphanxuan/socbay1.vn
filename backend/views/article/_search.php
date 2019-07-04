<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ArticleSearch */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $categories */
?>

<div class="article-search box-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        //'layout' => 'horizontal',
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'id')->textInput()
            ?>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'title')->textInput()
            ?>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'created_at')->widget(
                'trntv\yii\datetime\DateTimeWidget', [
                'phpDatetimeFormat' => 'dd.MM.yyyy',
                'momentDatetimeFormat' => 'DD.MM.YYYY',
                'clientOptions' => [
                    'minDate' => new \yii\web\JsExpression('new Date("2018-01-01")'),
                    'allowInputToggle' => true,
                    'sideBySide' => true,
                    'widgetPositioning' => [
                        'horizontal' => 'auto',
                        'vertical' => 'auto'
                    ]
                ]
            ]); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'category_id')->widget(Select2::class, [
                'data' => ArrayHelper::map(
                    $categories,
                    'id',
                    'title'
                ),
                'options' => ['placeholder' => Yii::t('common', 'Category') . '...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'created_by')->textInput()
            ?>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'status')->dropDownList(
                \common\models\Article::statuses(),
                ['prompt' => '']
            )
            ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'published_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

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

