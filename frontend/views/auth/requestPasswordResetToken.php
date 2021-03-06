<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \app\models\PasswordResetRequestForm */

$this->title = 'Request password reset';
?>
<div class="container login-container">

    <div class="omb_login row">

        <div class="col-md-4 col-md-offset-3">

            <div class="omb_authTitle">
                <h3><?php echo Html::encode($this->title) ?></h3>
                <span>Please fill out your email.<br/>A link to reset your password will be sent there.</span>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'options' => ['class' => 'omb_loginForm', 'autocomplete' => 'off']]); ?>

                    <?php echo $form->field($model, 'email', ['inputOptions' => ['class' => 'login-control', 'placeholder' => $model->getAttributeLabel('email')]])->label(false) ?>
                    <span class="help-block"></span>

                    <?php echo Html::submitButton('Request password reset', ['class' => 'btn btn-lg btn-block']) ?>

                    <?php ActiveForm::end(); ?>

                    <p class="forgotPwd">
                        <?php echo Yii::$app->user->isGuest ?
                            Html::a('Back to login', ['auth/login'])
                            :
                            Html::a('Back to profile', ['user/profile'])
                        ?>
                    </p>
                </div>
            </div>

        </div>
        <?php echo $this->render('partials/_githubLogin.php') ?>

    </div>

</div>
