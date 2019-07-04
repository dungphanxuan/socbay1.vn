<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\authclient\widgets\AuthChoice;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */

$this->title = Yii::t('frontend', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2"><i class="icon-user-add"></i> Đăng ký tài khoản mới </h2>
                    <div class="row">


                        <?php
                        $temp_input_html = <<<HTML
                                    {label}

                                    <div class="col-md-6">
                                        {input}
                                        <div class="invalid-feedback" style="display: block">{error}     </div>
                                    </div>
HTML;
                        ?>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <?php $authAuthChoice = AuthChoice::begin([
                                        'baseAuthUrl' => ['user/sign-in/oauth'],
                                        'autoRender' => false
                                    ]); ?>
                                    <?php foreach ($authAuthChoice->getClients() as $client): ?>
                                        <a class="btn btn-success btn-block btn-social btn-facebook facebook auth-link"
                                           href="<?= Url::to(['/user/sign-in/oauth', 'authclient' => $client->name]) ?>"
                                           data-popup-width="860" data-popup-height="480">
                                            <span class="fa fa-facebook"></span> Đăng ký qua Facebook
                                        </a>
                                    <?php endforeach; ?>

                                    <?php
                                    AuthChoice::end()
                                    ?>
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <?php $form = ActiveForm::begin([
                                'id' => 'form-signup',
                                'layout' => 'horizontal',
                                'fieldConfig' => ['options' => ['class' => 'form-group  row']],
                            ]); ?>
                            <fieldset>

                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">

                                    </div>
                                </div>

                                <?php echo $form->field($model, 'username', [
                                    'template' => $temp_input_html,
                                    'labelOptions' => ['class' => 'col-md-4 control-label']
                                ])->textInput() ?>

                                <?php echo $form->field($model, 'email', [
                                    'template' => $temp_input_html,
                                    'labelOptions' => ['class' => 'col-md-4 control-label']
                                ])->textInput([
                                    'maxlength' => true,
                                    'placeholder' => 'your username',
                                    'autocomplete' => 'off',
                                    'readonly' => true,
                                    'onfocus' => "this.removeAttribute('readonly');",
                                ]) ?>

                                <?php echo $form->field($model, 'password', [
                                    'template' => $temp_input_html,
                                    'labelOptions' => ['class' => 'col-md-4 control-label']
                                ])->passwordInput([
                                    'autocomplete' => 'off',
                                    'readonly' => true,
                                    'onfocus' => "this.removeAttribute('readonly');",
                                ]) ?>


                                <br>
                                <div class="form-group  row ">
                                    <label class="col-md-4 control-label"></label>

                                    <div class="col-md-8">
                                        <div class="termbox mb10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">I have read and
                                                    agree to the <a href="<?= Url::to(['/page/terms-condition']) ?>">Terms
                                                        &amp; Conditions</a></label>
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                        <?php echo Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                    </div>
                                </div>
                            </fieldset>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 reg-sidebar">
                <?php echo $this->render('_reg-sidebar', []) ?>
            </div>
        </div>

    </div>

</div>

