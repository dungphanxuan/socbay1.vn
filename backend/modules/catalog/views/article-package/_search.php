<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticlePackageSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="article-package-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'slug') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'body') ?>

    <?php echo $form->field($model, 'excerpt') ?>

    <?php // echo $form->field($model, 'view') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'day') ?>

    <?php // echo $form->field($model, 'promo_day') ?>

    <?php // echo $form->field($model, 'auto_renewal') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'sort_number') ?>

    <?php // echo $form->field($model, 'thumbnail_base_url') ?>

    <?php // echo $form->field($model, 'thumbnail_path') ?>

    <?php // echo $form->field($model, 'show_feature') ?>

    <?php // echo $form->field($model, 'show_top') ?>

    <?php // echo $form->field($model, 'promo_sign') ?>

    <?php // echo $form->field($model, 'recommended_sign') ?>

    <?php // echo $form->field($model, 'status') ?>

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
