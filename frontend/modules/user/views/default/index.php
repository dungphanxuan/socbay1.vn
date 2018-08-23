<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */
/* @var $profile \common\models\UserProfile */
/* @var $dataStat */

$this->title = Yii::t('frontend', 'User Settings');
$profile = $model->getModel('profile');
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 page-sidebar">
                <?php echo $this->render('@frontend/views/account/_menu', []) ?>
            </div>

            <div class="col-sm-9 page-content">
                <div class="inner-box">
                    <div class="row">
                        <div class="col-md-5 col-xs-4 col-xxs-12">
                            <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg"
                                                                                             src="<?= $model->getModel('profile')->getAvatar() ?>"
                                                                                             alt="user"> <?= $profile->getFullName() ?>
                                </a></h3>
                        </div>
                        <div class="col-md-7 col-xs-8 col-xxs-12">
                            <div class="header-data text-center-xs">

                                <div class="hdata">
                                    <div class="mcol-left">

                                        <i class="fa fa-eye ln-shadow"></i></div>
                                    <div class="mcol-right">

                                        <p><a href="#"><?= $dataStat['visit'] ?></a> <em>visits</em></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="hdata">
                                    <div class="mcol-left">

                                        <i class="icon-th-thumb ln-shadow"></i></div>
                                    <div class="mcol-right">

                                        <p><a href="#"><?= $dataStat['article'] ?></a><em>Ads</em></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="hdata">
                                    <div class="mcol-left">

                                        <i class="fa fa-user ln-shadow"></i></div>
                                    <div class="mcol-right">

                                        <p><a href="#"><?= $dataStat['favourite'] ?></a> <em>Favorites </em></p>
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
                            Hello <?= $model->getModel('profile')->fullname ?> </h3>
                        <span class="page-sub-header-sub small">You last logged in at: 01-01-2018 12:40 AM [UK time (GMT + 6:00hrs)]</span>
                    </div>
                    <div id="accordion" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapseB1" data-toggle="collapse"> My
                                        details </a></h4>
                            </div>
                            <div class="panel-collapse collapse in" id="collapseB1">
                                <div class="panel-body">
                                    <div class="user-profile-form">

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

                                        <?php echo $form->field($model->getModel('profile'), 'picture')->widget(
                                            Upload::class,
                                            [
                                                'url' => ['avatar-upload']
                                            ]
                                        ) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'firstname')->textInput(['maxlength' => 255]) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'middlename')->textInput(['maxlength' => 255]) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'lastname')->textInput(['maxlength' => 255]) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'address')->textInput(['maxlength' => 255]) ?>

                                        <?php
                                        echo $form->field($model->getModel('profile'), 'phone')->textInput(['maxlength' => 255])
                                            ->hint('Nhập số điện thoại theo định dạng VD: 0981234567')
                                        ?>

                                        <?php echo $form->field($model->getModel('profile'), 'url')->textInput(['maxlength' => 255]) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'bio')->textarea(['rows' => 3]) ?>

                                        <?php echo $form->field($model->getModel('profile'), 'locale')->dropDownlist(Yii::$app->params['availableLocales'])->label('Ngôn ngữ') ?>

                                        <?php echo $form->field($model->getModel('profile'), 'gender')->dropDownlist([
                                            \common\models\UserProfile::GENDER_FEMALE => Yii::t('frontend', 'Female'),
                                            \common\models\UserProfile::GENDER_MALE   => Yii::t('frontend', 'Male')
                                        ], ['prompt' => ''])->label('Giới tính') ?>

                                        <h2><?php echo Yii::t('frontend', 'Account Settings') ?></h2>

                                        <?php echo $form->field($model->getModel('account'), 'username') ?>

                                        <?php echo $form->field($model->getModel('account'), 'email') ?>

                                        <?php echo $form->field($model->getModel('account'), 'password')->passwordInput() ?>

                                        <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>

                                        <div class="form-group">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-8">
                                                <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
                                            </div>
                                        </div>

                                        <?php ActiveForm::end(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapseB2" data-toggle="collapse"> Settings </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapseB2">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        Comments are enabled on my ads </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-default">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#collapseB3" data-toggle="collapse">
                                        Preferences </a></h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapseB3">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    I want to receive newsletter. </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    I want to receive advice on buying and selling. </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

