<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container login-container">

    <div class="omb_login row">

        <div class="col-md-4 col-md-offset-3">

            <div class="omb_authTitle">
                <h3><?php echo Html::encode($this->title) ?></h3>
                <span>or</span>
                <?php echo Html::a('Create a new account', Url::to(['auth/signup']), ['class' => 'create-account']) ?>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'omb_loginForm', 'autocomplete' => 'off']]); ?>

                    <?php echo $form->field($model, 'username', ['inputOptions' => ['class' => 'login-control', 'placeholder' => $model->getAttributeLabel('username')]])->label(false) ?>
                    <span class="help-block"></span>

                    <?php echo $form->field($model, 'password', ['inputOptions' => ['class' => 'login-control', 'placeholder' => $model->getAttributeLabel('password')]])->passwordInput()->label(false) ?>

                    <?php echo $form->field($model, 'rememberMe')->checkbox() ?>

                    <?php echo Html::submitButton('Login', ['class' => 'btn btn-lg btn-block']) ?>

                    <?php ActiveForm::end(); ?>

                    <p class="forgotPwd">
                        <?php echo Html::a('Forgot your password?', Url::to(['auth/request-password-reset'])) ?>
                    </p>
                </div>
            </div>

        </div>
        <?php echo $this->render('partials/_githubLogin.php') ?>

    </div>

</div>
