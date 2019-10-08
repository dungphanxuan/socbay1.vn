<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\authclient\widgets\AuthChoice;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 login-box">
                    <div class="card card-default">
                        <div class="panel-intro text-center">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i
                                            class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> Rao vặt<span> Socbay </span>
                            </h2>
                        </div>
                        <div class="card-body">
                            <?php
                            $temp_input_html = <<<HTML
                                    <label for="sender-email" class="control-label">{label}:</label>

                                    <div class="input-icon"><i class="icon-user fa"></i>
                                        {input}
                                        <div class="invalid-feedback" style="display: block">{error}     </div>
                                    </div> 
HTML;
                            $tem_input_password = <<<HTML
                                    <label for="user-pass" class="control-label">{label}:</label>

                                    <div class="input-icon"><i class="icon-lock fa"></i>
                                        {input}
                                         <div class="invalid-feedback" style="display: block">{error}</div>
                                    </div>
HTML;
                            $temp_remember = <<<HTML
                            <div class="checkbox pull-left">
                                <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                    {input}
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"> Keep me logged in</span>
                                </label>
                            </div>
HTML;
                            ?>

                            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'omb_loginForm', 'autocomplete' => 'off']]); ?>

                            <?php
                            echo Html::activeHiddenInput($model, 'rememberMe', ['id' => 'hasRemember']);
                            ?>

                            <?php echo $form->field($model, 'identity', [
                                'template' => $temp_input_html
                            ])->textInput([
                                'maxlength' => true,
                                'placeholder' => 'your username',
                                'autocomplete' => 'off',
                                'readonly' => true,
                                'onfocus' => "this.removeAttribute('readonly');",
                            ]) ?>

                            <?php echo $form->field($model, 'password', [
                                'template' => $tem_input_password
                            ])->passwordInput([
                                'autocomplete' => 'off',
                                'placeholder' => 'your password',
                                'readonly' => true,
                                'onfocus' => "this.removeAttribute('readonly');",
                            ]) ?>

                            <div class="form-group">
                                <?php echo Html::submitButton(Yii::t('frontend', 'Login'), ['class' => 'btn btn-primary  btn-block', 'name' => 'login-button']) ?>
                            </div>
                            <h3 class="or-divider"><span>or</span></h3>
                            <div class="button-wrap">
                                <a href="#" class="btn-social btn-fbk"><i class="fab fa-facebook-f"></i>facebook<br>connect</a>
                                <a href="#" class="btn-social btn-ggl"><i class="fab fa-google-plus-g"></i>google<br>connect</a>
                            </div>
                            <?php ActiveForm::end(); ?>

                        </div>

                        <div class="card-footer">

                            <div class="checkbox pull-left">
                                <div class="custom-control custom-checkbox">
                                    <?= Html::checkbox('cRemember', $model->rememberMe ? true : false, ['class' => 'custom-control-input', 'id' => 'customCheck1']) ?>
                                    <label class="custom-control-label"
                                           for="customCheck1"> <?= Yii::t('common', 'Keep me logged in') ?></label>
                                </div>
                            </div>


                            <p class="text-center pull-right"><a
                                        href="<?= Url::to(['/user/sign-in/request-password-reset']) ?>"> Quên mật
                                    khẩu? </a>
                            </p>

                            <div style=" clear:both"></div>
                        </div>
                    </div>
                    <div class="login-box-btm text-center">
                        <p> Bạn chưa có tài khoản? <br>
                            <a href="<?= Url::to(['/user/sign-in/signup']) ?>"><strong>Đăng ký !</strong> </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php
$app_css = <<<CSS

CSS;

//Login JS
$app_js = <<<JS
$('#customCheck1').change(function () {
    if ($(this).is(":checked")) {
        $("#hasRemember").val(1);
    } else {
        $("#hasRemember").val(0);
    }

});
JS;
$this->registerJs($app_js);


