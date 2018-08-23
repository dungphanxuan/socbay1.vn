<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticlePackage */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="article-package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'price')->textInput() ?>

        </div>
    </div>

    <?php echo $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'day')->textInput() ?>

        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'promo_day')->textInput() ?>

        </div>
    </div>


    <?php echo $form->field($model, 'auto_renewal')
        ->dropDownList([1 => 'Yes', 0 => 'No'], ['prompt' => ''])
    ?>

    <?php echo $form->field($model, 'show_feature')->textInput() ?>

    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'show_top')
                ->dropDownList([1 => 'Yes', 0 => 'No'], ['prompt' => ''])
            ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'promo_sign')
                ->dropDownList([1 => 'Yes', 0 => 'No'], ['prompt' => ''])
            ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'recommended_sign')
                ->dropDownList([1 => 'Yes', 0 => 'No'], ['prompt' => ''])
            ?>
        </div>
    </div>

    <?php echo $form->field($model, 'sort_number')->textInput() ?>

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
