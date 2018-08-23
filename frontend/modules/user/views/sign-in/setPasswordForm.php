<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\PasswordResetRequestForm */

$this->title = Yii::t('frontend', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 login-box">
                <div class="panel panel-default">
                    <div class="panel-intro text-center">
                        <h2 class="logo-title">
                            <?= $this->title ?>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                        <?php
                        $temp_input = <<<HTML

<div class="form-group">
                                    <label for="sender-email" class="control-label">{label}:</label>

                                    <div class="input-icon"><i class="icon-user fa"></i>
                                        {input}
                                        <div class="invalid-feedback" style="display: block">{error}     </div>
                                    </div> 
                                </div>
HTML;

                        ?>
                        <?php echo $form->field($model, 'email', [
                            'template' => $temp_input
                        ]) ?>
                        <div class="form-group">
                            <?php echo Html::submitButton('Send', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="panel-footer">
                        <p class="text-center "><a href="<?= Url::to(['/user/sign-in/login']) ?>"> Quay lại đăng
                                nhập! </a>
                        </p>
                        <div style=" clear:both"></div>
                    </div>
                </div>
                <div class="login-box-btm text-center">
                    <p> Chưa có tài khoản? <br>
                        <a href="<?= Url::to(['/user/sign-in/signup']) ?>"><strong>Đăng ký tài khoản !</strong> </a></p>
                </div>
            </div>
        </div>
    </div>
</div>

