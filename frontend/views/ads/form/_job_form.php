<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/11/2018
 * Time: 9:22 AM
 */

use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\money\MaskMoney;
use trntv\filekit\widget\Upload;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\data\ArticlePackage;
use dungphanxuan\vnlocation\models\City;
use froala\froalaeditor\FroalaEditorWidget;
use yii\web\JsExpression;
use frontend\assets\Datepicker;
use frontend\widgets\DatePickerWidget;

/* @var $this yii\web\View */
/* @var $dataWard */
/* @var $dataSubCat */
/* @var $article_type */
/* @var $cities */
/* @var $model \common\models\Article|\yii\db\ActiveRecord */
/* @var $modelDetail \common\models\ArticleDetail|\yii\db\ActiveRecord */
/* @var $categories */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $dataSubCat */
/* @var $article_type */
/* @var $cities */
/* @var $model \common\models\ads\AdsReport|\yii\db\ActiveRecord */
/* @var $categories */
/* @var $dataDistrict */
/* @var $jobTypes */
/* @var $jobCategories */

$this->title = 'Việc làm mới';

$tempTextInput = <<<HTML
<div class="form-group row">
    {label}

    <div class="col-md-8">
        {input}
        {error}
        {hint}
    </div>
</div>
HTML;

$tempTextInput2 = <<<HTML
<div class="form-group row">
    {label}

    <div class="col-md-8">
        {input}
        {hint}
    </div>
</div>
HTML;

$urlRegCompany = Url::to(['/jobc/company/register', 'type' => 1]);
$tempInputCompany = <<<HTML
<div class="form-group row">
    {label}
    <div class="col-md-8">
        <div class="input-group mb-3" style="margin-bottom: 0 !important;">
            {input}
            <div class="input-group-append">
                <button class="btn  btn-primary btn-sm" type="button" id="btnSearchC">Tìm kiếm cty</button>
            </div>
        </div>
        <span class="form-text text-muted"><a href="$urlRegCompany" target="_blank">Đăng ký thông tin công ty</a></span>
    </div>
</div>
HTML;

Datepicker::register($this);
?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
]); ?>
    <fieldset>
        <?php echo $form->errorSummary($model, [
            'class'  => 'alert alert-warning alert-dismissible',
            'header' => '<h2 class="alert-heading">Vui lòng sửa các lỗi sau!</h2>',
            'footer' => '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>'
        ]); ?>

        <?php echo Html::activeHiddenInput($model, 'category_id', ['id' => 'ads-category_id']) ?>
        <?php echo Html::activeHiddenInput($modelDetail, 'job_company_id', ['id' => 'job-company_id']) ?>
        <!-- Text input-->

        <?php if (!isUserRole()): ?>
            <?php echo $form->field($model, 'company_name', [
                'template'     => $tempInputCompany,
                'hintOptions'  => [
                    'tag'   => 'span',
                    'class' => 'form-text text-muted'
                ],
                'labelOptions' => [
                    'class' => 'col-sm-3 col-form-label'
                ],
            ])->textInput([
                'maxlength'   => true,
                'placeholder' => 'Tên công ty',
                'class'       => 'form-control input-md',
                'id'          => 'ads-company_name',
            ])->label('Công ty') ?>
        <?php else: ?>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="CompanyName">Công ty</label>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-9">
                            <?php echo Html::activeTextInput($model, 'company_name', ['class' => 'form-control-plaintext', 'readonly' => true]); ?>
                        </div>
                        <div class="col-md-3">
                            <a href="<?php echo $urlRegCompany ?>" target="_blank"
                               class="btn btn-block btn-outline-primary btn-sm active" tabindex="-1"
                               role="button" aria-disabled="true">Quản lý</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php echo $form->field($model, 'title', [
            'template'     => $tempTextInput,
            'hintOptions'  => [
                'tag'   => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => '',
            'class'       => 'form-control input-md'
        ])->label('Tiêu đề')->hint('Tiêu đề nên đặt ít nhất 60 ký tự.') ?>

        <!-- Select Basic -->

        <?php
        echo $form->field($modelDetail, 'job_category', [
            'template' => $tempTextInput,
        ])->dropDownList($jobCategories, ['prompt' => 'Chọn danh mục..', 'class' => 'form-control form-control-sm'])
            ->label('Danh mục')
        ?>

        <!-- Textarea -->
        <?php echo $form->field($model, 'body', [
            'template'     => $tempTextInput,
            'hintOptions'  => [
                'tag'   => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->widget(\yii\imperavi\Widget::class, [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight'       => 250,
                'maxHeight'       => 250,
                'buttonSource'    => true,
                'convertDivs'     => false,
                'removeEmptyTags' => true,
                'imageUpload'     => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi']),
            ],
        ])->label('Mô tả')->hint('Mô tả các trách nhiệm, kinh nghiệm, kỹ năng, học vấn.') ?>

        <?php echo $form->field($model, 'excerpt', [
            'template' => $tempTextInput
        ])->textarea(['class' => 'form-control tah120']);
        ?>

        <div class="row">
            <div class="col-md-12">
                <h3 style="padding-bottom: 5px">Thông tin chi tiết</h3>
                <hr class="b2r">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="CompanyName">Địa điểm</label>

            <div class="col-md-8">
                <?php
                echo Html::activeTextInput($model, 'address_text', ['class' => 'form-control input-md', 'placeholder' => 'City or Postcode'])
                ?>
                <br>
                <div class="row">
                    <div class="col">
                        <?php
                        echo Html::activeDropDownList($model, 'city_id', ArrayHelper::map($cities, 'id', 'name'), ['id' => 'ccity-id', 'class' => 'form-control form-control-sm'])
                        ?>
                    </div>
                    <div class="col">
                        <?php echo DepDrop::widget([
                            'model'          => $model,
                            'attribute'      => 'district_id',
                            'options'        => ['id' => 'cdistrict-id', 'class' => 'form-control form-control-sm'],
                            'type'           => DepDrop::TYPE_SELECT2,
                            'data'           => $dataDistrict,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true], 'theme' => Select2::THEME_BOOTSTRAP],
                            'pluginOptions'  => [
                                'depends'     => ['ccity-id'],
                                'initialize'  => true,
                                'initDepends' => ['ccity-id'],
                                'placeholder' => 'Chọn Quận/Huyện...',
                                'url'         => Url::to(['/go/ajax/district-subcat'])
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Multiple Radios (inline) -->

        <?php echo $form->field($modelDetail, 'job_type', [
            'template' => $tempTextInput,
        ])->dropDownList(ArrayHelper::map(
            $jobTypes,
            'id',
            'title'
        ), ['prompt' => 'Type', 'class' => 'form-control form-control-sm'])->label('Hình thức') ?>

        <!-- Prepended text-->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="Salary ">Mức lương </label>

            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input id="Salary " name="Salary " class="form-control"
                           placeholder="Salary " type="text">

                    <div class="input-group-btn">


                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            Type
                        </button>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item">mỗi giờ</a></li>
                            <li><a class="dropdown-item">mỗi tháng</a></li>
                        </ul>
                    </div>
                </div>


            </div>
            <div class="col-md-3">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Thương lượng
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="CompanyName">Thời gian đăng tuyển</label>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5">
                        <?php echo DatePickerWidget::widget([
                            'model'            => $model,
                            'attribute'        => 'public_from',
                            'startDate'        => new \yii\web\JsExpression('new Date("2018-04-01")'),
                            'format'           => 'yyyy/mm/dd',
                            'autoHide'         => true,
                            'zIndex'           => 2048,
                            'containerOptions' => [
                                'id' => 'publicFromW'
                            ]
                        ]); ?>
                    </div>
                    <div class="col-md-2">
                        <div class="text-center">~</div>
                    </div>
                    <div class="col-md-5">
                        <?php echo DatePickerWidget::widget([
                            'model'            => $model,
                            'attribute'        => 'public_to',
                            'startDate'        => new \yii\web\JsExpression('new Date("2018-04-01")'),
                            'autoHide'         => true,
                            'zIndex'           => 2048,
                            'containerOptions' => [
                                'id' => 'publicToW'
                            ]
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $form->field($modelDetail, 'job_email', [
            'template'     => $tempTextInput2,
            'hintOptions'  => [
                'tag'   => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => '',
            'class'       => 'form-control input-md'
        ])->label('Email')->hint('Gửi thông tin các hồ sơ việc làm vào email này') ?>


        <div class="content-subheading">
            <i class="icon-user fa"></i> <strong>Thông tin công ty</strong>
        </div>

        <!-- Text input-->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="textinput-name">Tên cty</label>

            <div class="col-sm-8">
                <input id="textinput-name" name="textinput-name"
                       placeholder="Seller Name" class="form-control input-md"
                       type="text">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="textinput-name">Website</label>

            <div class="col-sm-8">
                <input id="textinput-name" name="textinput-name"
                       placeholder="Url" class="form-control input-md"
                       type="text">
            </div>
        </div>

        <!-- Appended checkbox -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="seller-email"> Địa chỉ email</label>

            <div class="col-sm-8">
                <input id="Company-email" name="Company-email" class="form-control"
                       placeholder="Email" type="text">

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox">
                        <small>Không hiển thị email công ty</small>
                    </label>
                </div>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="seller-Number">Số điện thoại</label>

            <div class="col-sm-8">
                <input id="seller-Number" name="seller-Number"
                       placeholder="Phone Number" class="form-control input-md"
                       type="text">
            </div>
        </div>

        <?php
        //echo $this->render('_ads_action', [])
        ?>

        <!-- terms -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label p-0">Các điều khoản</label>

            <div class="col-sm-8">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Xác nhận đồng ý với các điều khoản thông
                        tin</label>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <hr class="b2r">
            </div>
        </div>
        <!-- Button  -->
        <div class="form-group row">
            <label class="col-md-3 col-form-label"></label>
            <div class="col-sm-7">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('ads', 'Post a Job') : Yii::t('common', 'Update Ads'), ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-custom' : 'btn btn-primary btn-lg btn-custom', 'data-style' => 'expand-right']) ?>
            </div>
            <div class="col-sm-2">
                <div class="pull-right">
                    <?php echo Html::a('<span class="fa fa-arrow-left"></span> ' . Yii::t('common', 'Back'), ['/ads/index', 'cslug' => $modelCategory->slug], ['class' => 'btn btn-lg btn-default hide-mobile']); ?>
                </div>
            </div>
        </div>
    </fieldset>
<?php ActiveForm::end(); ?>
    <!--Modal Show choose company-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="modal-company" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><i class=" icon-search-2"></i>Tìm kiếm công ty</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="company-body" data-route="<?= Url::toRoute('/job/company-search', true) ?>">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


<?php
$app_css = <<<CSS
.has-success .form-control {
    border-color: #28a745;
}
.has-error .form-control {
    border-color: #dc3545;
}
.has-error .help-block-error {
    color: #dc3545;
}
.tah120{
height: 120px;
}
.jobselect{
display: block !important;
}
.select2-container--bootstrap .select2-selection--single{
height: 38px !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__rendered{
padding-top: 2px !important;
}
CSS;

$this->registerCss($app_css);

$app_js = <<<JS
$('#publicFromW input').change(function() { 
    var from = $(this).val();
    var to = $('#publicToW input').val();
    if(from > to){
        //$('#publicToW input').datepicker('setDate', $(this).val());
        $('#publicToW input').datepicker('setStartDate', $(this).val());
    }
    
});


 $("#btnSearchC").click(function(){
     getCompany();
        $('#modal-company').modal('show');
        
    });

$(document).on('click','.btn-callback',function(e){
        e.preventDefault();
        var company_id = $(this).data('company_id');
        var company_name = $(this).data('company_name');
        $('#ads-company_name').val(company_name);
        $('#job-company_id').val(company_id) 
        $('#modal-company').modal('hide');
        
    });
    
function getCompany() {
       $.ajax({
            url: $('#company-body').data('route'),
            type: 'GET',
            data : {
                popup : 1,
            },
            success: function(data){
                $('#company-body').html(data);
        }
    });
    };

JS;

$this->registerJs($app_js);