<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\ResetPasswordForm */

$this->title = Yii::t('frontend', 'Reset password');
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
                        <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'options' => ['autocomplete' => 'off']]); ?>
                        <?php echo $form->field($model, 'password')->passwordInput()->label('Mật khẩu mới') ?>
                        <div class="form-group">
                            <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="panel-footer">
                        <p class="text-center "><a href="<?= Url::to(['/user/sign-in/login']) ?>"> Quay lại đăng
                                nhập </a>
                        </p>
                        <div style=" clear:both"></div>
                    </div>
                </div>
                <div class="login-box-btm text-center">
                    <p> Chưa nhận được email khôi phục? <br>
                        <a href="<?= Url::to(['/user/sign-in/request-password-reset']) ?>"><strong>Khôi phục lại mật
                                khẩu !</strong> </a></p>
                </div>
            </div>
        </div>
    </div>
</div>

