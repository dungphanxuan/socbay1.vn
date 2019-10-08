<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \app\models\SignupForm */

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container login-container">

    <div class="omb_login row">

        <div class="col-md-4 col-md-offset-3">

            <div class="omb_authTitle">
                <h3><?php echo Html::encode($this->title) ?></h3>
                <span>or</span>
                <?php echo Html::a('Login', Url::to(['auth/login']), ['class' => 'create-account']) ?>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'omb_loginForm', 'autocomplete' => 'off']]); ?>

                    <?php echo $form->field($model, 'username', ['inputOptions' => ['class' => 'login-control', 'placeholder' => $model->getAttributeLabel('username')]])->label(false) ?>

                    <?php echo $form->field($model, 'email', ['inputOptions' => ['class' => 'login-control', 'placeholder' => $model->getAttributeLabel('email')]])->label(false) ?>

                    <?php echo $form->field($model, 'password', ['inputOptions' => ['class' => 'login-control', 'placeholder' => $model->getAttributeLabel('password')]])->passwordInput()->label(false) ?>

                    <?php echo Html::submitButton('Create New Account', ['class' => 'btn btn-lg btn-block']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
        <?php echo $this->render('partials/_githubLogin.php') ?>

    </div>

</div>

