<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */
$this->title = Yii::t('backend', 'Edit account')
?>
    <div class="row">
        <div class="col-md-3">
            <?php
            echo $this->render('_menu')
            ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="user-profile-form">

                        <?php $form = ActiveForm::begin(); ?>

                        <?php echo $form->field($model, 'username', [
                            'addon' => ['prepend' => ['content' => '<i class="fa fa-user-o"></i>']]
                        ]) ?>

                        <?php echo $form->field($model, 'email', [
                            'addon' => ['prepend' => ['content' => '<i class="fa fa-envelope"></i>']]
                        ]) ?>

                        <?php echo $form->field($model, 'password', [
                            'addon' => [
                                'prepend' => ['content' => '<i class="fa fa-key"></i>'],
                                'append'  => ['content' => '<button class="btn btn-default" type="button" id="btnGenerate">Generate</button>', 'asButton' => true],
                            ],
                        ])->passwordInput() ?>

                        <?php echo $form->field($model, 'password_confirm', [
                            'addon' => [
                                'prepend' => ['content' => '<i class="fa fa-key"></i>'],
                            ],
                        ])->passwordInput() ?>

                        <hr class="b2r">

                        <div class="form-group">
                            <div class="col-md-6" style="padding-left: 0 !important;">
                                <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
                            </div>
                            <div class="col-md-6" style="padding-right:0 !important;">
                                <div class="pull-right">
                                    <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> ' . Yii::t('common', 'Back'), Url::home(), ['class' => 'btn btn-default']); ?>
                                </div>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
$urlAjax = Url::to(['/user/ajax-password']);
$app_js = <<<JS
$("#btnGenerate").click(function(){
    //Ajax Get Password
     $.ajax({
        url: '$urlAjax',
        type: 'get',
        data: {
            length: 16
        },
        success: function (data) {
             $("#accountform-password").attr("type","text");
             $("#accountform-password_confirm").attr("type","text");
             $("#accountform-password").val(data.body);
             $("#accountform-password_confirm").val(data.body);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //Todo Reload Page
            //alert("Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
     
});
JS;

$this->registerJs($app_js);