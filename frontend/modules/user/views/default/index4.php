<?php

use trntv\filekit\widget\Upload;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */
/* @var $profile \common\models\UserProfile */
/* @var $dataStat */

$this->title = Yii::t('frontend', 'User Settings');

$formatter = \Yii::$app->formatter;
$userData = $model->getModel('account');
$profile = $model->getModel('profile');

$defaultThumb = 'https://i0.wp.com/cdn.auth0.com/avatars/' . strtolower(substr($profile->getFullName(), 0, 1)) . '.png?ssl=1';
$avatarImg = $model->getModel('profile')->getAvatar($defaultThumb);
$imgBg = baseUrl() . '/frontend/web/images/bg/bguser.jpg';

$loginTime = Yii::$app->user->identity->logged_at;

?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3 page-sidebar">
                    <?php echo $this->render('@frontend/views/account/_menu', []) ?>
                </div>
                <!--/.page-sidebar-->

                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <div class="row">
                            <div class="col-md-5 col-xs-4 col-xxs-12">
                                <h3 class="no-padding text-center-480 useradmin">
                                    <a href=""><img class="userImg lazy" data-src="<?= $avatarImg ?>"
                                                    src="<?php echo $imgBg ?>"
                                                    alt="user"> <?= $profile->getFullName() ?></a></h3>
                            </div>
                            <div class="col-md-7 col-xs-8 col-xxs-12">
                                <div class="header-data text-center-xs">

                                    <!-- Traffic data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with red background -->
                                            <i class="fa fa-eye ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#"><?= $dataStat['visit'] ?></a> <em>visits</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- revenue data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with green background -->
                                            <i class="icon-th-thumb ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#"><?= $dataStat['article'] ?></a><em>Ads</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- revenue data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with blue background -->
                                            <i class="fa fa-user ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#"><?= $dataStat['favourite'] ?></a> <em>Favorites </em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with blue background -->
                                            <i class="fa fa-file ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p>
                                                <a href="<?= \yii\helpers\Url::to(['/account/file-storage']) ?>"><?= $dataStat['file'] ?></a>
                                                <em>File </em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inner-box">
                        <div class="welcome-msg">
                            <h3 class="page-sub-header2 clearfix no-padding">
                                Thành viên <?= $model->getModel('profile')->fullname ?> </h3>
                            <span class="page-sub-header-sub small"><?= Yii::t('ads', 'You last logged in at') ?>
                                : <?= $formatter->asDatetime($loginTime, 'long') ?></span>
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <a href="#collapseB1" aria-expanded="true"
                                           data-toggle="collapse"> <?= Yii::t('ads', 'My details') ?> </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse show" id="collapseB1">
                                    <div class="card-body">
                                        <?php $form = ActiveForm::begin([
                                            'layout'      => 'horizontal',
                                            'fieldConfig' => [
                                                'template'             => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                                'horizontalCssClasses' => [
                                                    'label'   => 'col-sm-3 col-xs-3',
                                                    'wrapper' => 'col-sm-8 col-xs-8',
                                                    'error'   => '',
                                                    'hint'    => '',
                                                ],
                                            ],
                                        ]); ?>

                                        <?php echo $form->errorSummary($model->getModel('profile'), [
                                            'class'  => 'alert alert-warning alert-dismissible',
                                            'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
                                        ]); ?>

                                        <h2><?php echo Yii::t('frontend', 'Profile settings') ?></h2>


                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php
                                                // echo $form->field($model->getModel('profile'), 'firstname')->textInput(['maxlength' => 255])
                                                ?>

                                                <?php
                                                //echo $form->field($model->getModel('profile'), 'middlename')->textInput(['maxlength' => 255])
                                                ?>

                                                <?php
                                                //echo $form->field($model->getModel('profile'), 'lastname')->textInput(['maxlength' => 255])
                                                ?>
                                                <?php
                                                echo $form->field($model->getModel('profile'), 'displayname')->textInput(['maxlength' => 255])->label('Tên hiển thị')
                                                ?>

                                            </div>
                                            <div class="col-md-4">
                                                <?php echo $form->field($model->getModel('profile'), 'picture', [
                                                    'horizontalCssClasses' => [
                                                        'label'   => '',
                                                        'wrapper' => '',
                                                    ]
                                                ])->widget(
                                                    Upload::class,
                                                    [
                                                        'url' => ['avatar-upload']
                                                    ]
                                                ) ?>
                                            </div>
                                        </div>

                                        <?php echo $form->field($model->getModel('profile'), 'address')->textInput(['maxlength' => 255]) ?>

                                        <?php
                                        echo $form->field($model->getModel('profile'), 'phone')->textInput(['maxlength' => 255])
                                            ->hint('Nhập số điện thoại theo định dạng VD: 0981234567')
                                        ?>

                                        <?php echo $form->field($model->getModel('profile'), 'url')->textInput(['maxlength' => 255]) ?>
                                        <?php echo $form->field($model->getModel('profile'), 'company_name')->textInput(['maxlength' => 255]) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'bio')->textarea(['class' => 'form-control bio-class']) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'locale')->dropDownlist(Yii::$app->params['availableLocales'])->label('Ngôn ngữ') ?>

                                        <?php echo $form->field($model->getModel('profile'), 'gender')->dropDownlist([
                                            \common\models\UserProfile::GENDER_FEMALE => Yii::t('frontend', 'Female'),
                                            \common\models\UserProfile::GENDER_MALE   => Yii::t('frontend', 'Male')
                                        ], ['prompt' => ''])->label('Giới tính') ?>


                                        <h2><?php echo Yii::t('frontend', 'Account Settings') ?></h2>
                                        <hr class="b2r">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php echo $form->field($model->getModel('account'), 'username', [
                                                    'horizontalCssClasses' => [
                                                        'label'   => 'col-md-12',
                                                        'wrapper' => 'col-md-12',
                                                    ]
                                                ]) ?>

                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $form->field($model->getModel('account'), 'email', [
                                                    'horizontalCssClasses' => [
                                                        'label'   => '',
                                                        'wrapper' => '',
                                                    ]
                                                ]) ?>

                                            </div>
                                        </div>


                                        <?php echo $form->field($model->getModel('account'), 'password', [

                                        ])->passwordInput([
                                            'maxlength'    => true,
                                            'placeholder'  => 'new password',
                                            'autocomplete' => 'off',
                                            'readonly'     => true,
                                            'onfocus'      => "this.removeAttribute('readonly');",
                                        ]) ?>

                                        <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>

                                        <hr class="b2r">

                                        <div class="form-group">
                                            <div class="row" style="margin-left: 0 ">
                                                <div class="col-sm-6 col-6">
                                                    <div class="pull-left">
                                                        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-6">
                                                    <div class="pull-right">
                                                        <?= Html::a('<span class="fa fa-arrow-left"></span> Quay lại', ['/ads/index'], ['class' => 'btn btn-flat btn-default']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="#collapseB3" aria-expanded="true"
                                                              data-toggle="collapse"><?= Yii::t('ads', 'Preferences') ?> </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseB3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">I want to receive newsletter. </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">I want to receive advice on buying and
                                                        selling. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->
<?php
$app_css = <<<CSS
.b2r {
    height: 2px;
    color: red;
    border-top: 2px solid #64B5F6;
}

.glyphicon {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.glyphicon-plus-sign:before {
    content: "\\f055";
}

.glyphicon-remove-circle:before {
    content: "\\f05c";
}

.glyphicon-chevron-down:before {
    content: "\\f078";
}

.glyphicon-chevron-up:before {
    content: "\\f077";
}

.hidden {
    display: none !important;
}
.bio-class{
height: 110px;
}
@media (max-width: 575px) {
    .form-group .control-label, .form-group .col-sm-8, .form-group .col-md-12 {
        padding-left: 0 !important;
    }
}

CSS;

$this->registerCss($app_css);
