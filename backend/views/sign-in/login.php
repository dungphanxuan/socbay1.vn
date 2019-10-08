<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\LoginForm */

$this->title = Yii::t('backend', 'Sign In');
$this->params['breadcrumbs'][] = $this->title;
$this->params['body-class'] = 'login-page';

$bundle = \backend\assets_b\BackendAsset::register($this);
?>
    <div class="login-box">

        <div class="login-logo">
            <a href=""><b>Admin</b>Login</a>
        </div>
        <div class="header"></div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="body">
                <?php echo $form->field($model, 'username', [
                    'addon' => ['append' => ['content' => '<i class="fa fa-envelope-o"></i>']]
                ]) ?>
                <?php echo $form->field($model, 'password', [
                    'addon' => ['append' => ['content' => '<i class="fa fa-key"></i>']]
                ])->passwordInput([
                    'autocomplete' => 'off',
                    'readonly' => true,
                    'onfocus' => "this.removeAttribute('readonly');",
                ]) ?>
                <?php
                echo $form->field($model, 'otp', [
                    'addon' => ['append' => ['content' => '<i class="fa fa-unlock-alt"></i>']]
                ])->textInput(['placeholder' => 'Authentication code'])->label('2FA Key Code')
                ?>
                <?php echo $form->field($model, 'rememberMe')->checkbox(['class' => 'simple']) ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php echo $form->field($model, 'reCaptcha')->widget(
                            \himiklab\yii2\recaptcha\ReCaptcha::class,
                            [
                                'siteKey' => env('GOOGLE_RECAPCHA_KEY'),
                                'secret' => env('GOOGLE_RECAPCHA_SECRET')
                            ]
                        ) ?>
                    </div>
                </div>
            </div>

            <div class="footer">
                <?php echo Html::submitButton(Yii::t('backend', 'Sign me in'), [
                    'class' => 'btn btn-primary btn-flat btn-block',
                    'name' => 'login-button'
                ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>
<?php
$urlImg = $this->assetManager->getAssetUrl($bundle, 'img/SCfMd.png');

$app_css = <<<CSS
body {
   background-image: url($urlImg) !important;
}
CSS;

$this->registerCss($app_css);