<?php

use common\models\property\Project;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectPickup */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $projects */


$urlProjectJson = Url::to(['/project/json-list']);

// Get the initial city description
$projectDesc = empty($model->project_id) ? '' : Project::findOne($model->project_id)->title;
?>

<div class="project-pickup-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-4',
            ],
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->errorSummary($model, [
                'class' => 'alert alert-warning alert-dismissible',
                'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
            ]); ?>
        </div>
    </div>

    <?php
    /*echo $form->field( $model, 'project_id',[
        'template' => '{label} <div class="row"><div class="col-xs-4 col-sm-4">{input}{error}{hint}</div></div>'
    ] )->widget( \kartik\select2\Select2::class, [
        'initValueText' => $projectDesc, // set the initial display text
        'options'       => [ 'placeholder' => 'Chọn dự án ...' ],

        'pluginOptions' => [
            'allowClear'        => true,
            'language'          => [
                'errorLoading' => new JsExpression( "function () { return 'Waiting for results...'; }" ),
            ],
            'ajax'              => [
                'url'      => $urlProjectJson,
                'dataType' => 'json',
                'data'     => new JsExpression( 'function(params) { return {q:params.term}; }' )
            ],
            'escapeMarkup'      => new JsExpression( 'function (markup) { return markup; }' ),
            'templateResult'    => new JsExpression( 'function(city) { return city.text; }' ),
            'templateSelection' => new JsExpression( 'function (city) { return city.text; }' ),
        ],
    ] );*/
    ?>

    <?php
    echo $form->field($model, 'lang_id', [
        'template' => '{label} <div class="row"><div class="col-xs-6 col-sm-6">{input}{error}{hint}</div></div>'
    ])
        ->dropDownList([1 => 'Tiếng Việt', 2 => 'Tiếng Anh'])
    ?>

    <?php
    echo $form->field($model, 'type', [
        'template' => '{label} <div class="row"><div class="col-xs-6 col-sm-6">{input}{error}{hint}</div></div>'
    ])
        ->dropDownList([1 => 'Cho thuê', 2 => 'Mua bán'], ['prompt' => 'Chọn loại dự án'])
    ?>

    <?php
    echo $form->field($model, 'project_id', [
        'template' => '{label} <div class="row"><div class="col-xs-6 col-sm-6">{input}{error}{hint}</div></div>'
    ])->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map($projects, 'id', 'title'),
        'options' => ['placeholder' => 'Chọn dự án ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php echo $form->field($model, 'sort_number', [
        'template' => '{label} <div class="row"><div class="col-xs-6 col-sm-6">{input}{error}{hint}</div></div>'
    ])->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord
            ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
