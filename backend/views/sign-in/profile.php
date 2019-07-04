<?php

use common\models\UserProfile;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('backend', 'Edit profile')
?>
<div class="row">
    <div class="col-md-3">
        <?php
        echo $this->render('_menu')
        ?>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="user-profile-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="row">
                        <div class="col-md-7">
                            <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>

                            <?php echo $form->field($model, 'middlename')->textInput(['maxlength' => 255]) ?>

                            <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => 255]) ?>

                            <?php echo $form->field($model, 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>

                            <?php echo $form->field($model, 'gender')->dropDownlist([
                                UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
                                UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
                            ]) ?>

                        </div>
                        <div class="col-md-5">
                            <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
                                'url' => ['avatar-upload']
                            ])->label('Ảnh đại diện') ?>
                        </div>
                    </div>


                    <hr class="b2r">

                    <div class="form-group">
                        <div class="col-md-6" style="padding-left: 0 !important;">
                            <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
                        </div>
                        <div class="col-md-6" style="padding-right: 0 !important;">
                            <div class="pull-right">
                                <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> ' . Yii::t('common', 'Back'), Url::home(), ['class' => 'btn btn-default']); ?>
                            </div>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>


