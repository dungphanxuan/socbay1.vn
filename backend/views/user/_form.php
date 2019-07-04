<?php

use common\models\User;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'username', [
            'addon' => ['prepend' => ['content' => '<i class="fa fa-user-o"></i>']]
        ]) ?>

        <?php echo $form->field($model, 'email', [
            'addon' => ['prepend' => ['content' => '<i class="fa fa-envelope"></i>']]
        ])->textInput([
            'autocomplete' => 'off',
            'readonly' => true,
            'onfocus' => "this.removeAttribute('readonly');",
        ]) ?>

        <?php echo $form->field($model, 'password', [
            'addon' => [
                'prepend' => ['content' => '<i class="fa fa-key"></i>'],
                'append' => ['content' => '<button class="btn btn-default" type="button" id="btnGenerate">Generate</button>', 'asButton' => true],
            ],
            'template' => '{label} <div class="row"><div class="col-xs-6 col-sm-6">{input}{error}{hint}</div></div>'
        ])->textInput([
            'autocomplete' => 'off',
            'readonly' => true,
            'onfocus' => "this.removeAttribute('readonly');",
        ]) ?>

        <div class="row">
            <div class="col-md-6">
                <?php echo $form->field($model, 'twofa_secret', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-lock"></i>']],
                ])->textInput(['readonly' => true]) ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->field($model, 'otp_enable')->checkbox()->label('Otp Enable')
                    ->hint(Yii::t('common', 'Turn on 2-Step Verification')) ?>

            </div>
        </div>

        <?php echo $form->field($model, 'status', [
            'template' => '{label} <div class="row"><div class="col-xs-6 col-sm-6">{input}{error}{hint}</div></div>'
        ])->dropDownList(User::statuses()) ?>

        <?php echo $form->field($model, 'roles')->checkboxList($roles) ?>

        <hr class="b2r">

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Go Back', ['index'], ['class' => 'btn btn-flat btn-default']); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

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
             $("#userform-password").val(data.body);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //Todo Reload Page
            //alert("Status: " + textStatus); alert("Error: " + errorThrown);
        }
    });
     
});
JS;

$this->registerJs($app_js);