<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/16/2018
 * Time: 11:03 AM
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\job\CompanySearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="company-search box-search">
    <?php $form = ActiveForm::begin([
        'id'                   => 'popup-form',
        'action'               => ['/job/data-search'],
        'enableAjaxValidation' => true,
        'method'               => 'get',
        'layout'               => 'horizontal'
    ]); ?>
    <?php echo Html::hiddenInput('layout', 1); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-9">
                    <?= Html::activeInput('text', $model, 'id', ['class' => 'form-control', 'autocomplete' => 'off']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Tên</label>
                <div class="col-sm-9">
                    <?= Html::activeInput('text', $model, 'title', ['class' => 'form-control', 'autocomplete' => 'off']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Mô tả</label>
                <div class="col-sm-9">
                    <?= Html::activeInput('text', $model, 'title_short', ['class' => 'form-control', 'autocomplete' => 'off']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <?php echo Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php
$app_js = <<<JS
     $('body').on('beforeSubmit', 'form#popup-form', function () {
            var form = $(this);
            //alert('ok');
            // submit form
            $.ajax({
            url    : form.attr('action'),
            type   : 'get',
            data   : form.serialize(),
            success: function (response) 
            {
                $('#search-result').html(response);
              
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
         });
JS;
$this->registerJs($app_js);
?>
