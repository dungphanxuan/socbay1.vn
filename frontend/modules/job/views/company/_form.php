<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use trntv\filekit\widget\Upload;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\job\Company */
/* @var $form yii\widgets\ActiveForm */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */

$tempTextInput = <<<HTML
<div class="form-group row">
    {label}

    <div class="col-md-8">
        {input}
        {hint}
        {error}
    </div>
</div>
HTML;

?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
]); ?>
    <fieldset>
        <?php echo $form->errorSummary($model, [
            'class' => 'alert alert-warning alert-dismissible',
            'header' => '<h2 class="alert-heading">Vui lòng sửa các lỗi sau!</h2>',
            'footer' => '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>'
        ]); ?>


        <?php echo $form->field($model, 'title', [
            'template' => $tempTextInput,
            'hintOptions' => [
                'tag' => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->textInput([
            'maxlength' => true,
            'placeholder' => '',
            'class' => 'form-control input-md',
        ])->label('Tên công ty')->hint('Tên đầy đủ công ty.') ?>

        <?php echo $form->field($model, 'title_short', [
            'template' => $tempTextInput,
            'hintOptions' => [
                'tag' => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->textInput([
            'maxlength' => true,
            'placeholder' => '',
            'class' => 'form-control input-md'
        ])->label('Tên ngắn') ?>


        <!-- Select Basic -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Danh mục</label>

            <div class="col-md-8">
                <select title="category" name="category-group" id="category-group" class="form-control">
                    <option value="0" selected="selected"> Select a category...</option>
                    <option value="111">Accounting</option>
                    <option value="112">Administration &amp; Office Support</option>
                </select>
            </div>
        </div>

        <!-- Textarea -->
        <?php echo $form->field($model, 'body', [
            'template' => $tempTextInput,
            'hintOptions' => [
                'tag' => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->widget(\yii\imperavi\Widget::class, [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 250,
                'maxHeight' => 250,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => true,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi']),
            ],
        ])->label('Mô tả')->hint('Mô tả thông tin thêm về công ty.') ?>

        <!-- Text input-->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="CompanyName">Địa điểm</label>

            <div class="col-md-8">
                <?php
                echo Html::activeTextInput($model, 'address', ['class' => 'form-control input-md', 'placeholder' => 'City or Postcode'])
                ?>
                <br>
                <div class="row">
                    <div class="col">
                        <?php
                        echo Html::activeDropDownList($model, 'city_id', \yii\helpers\ArrayHelper::map($cities, 'id', 'name'), ['id' => 'ccity-id', 'class' => 'form-control form-control-sm'])
                        ?>
                    </div>
                    <div class="col">
                        <?php echo DepDrop::widget([
                            'model' => $model,
                            'attribute' => 'district_id',
                            'options' => ['id' => 'cdistrict-id', 'class' => 'form-control form-control-sm'],
                            'type' => DepDrop::TYPE_SELECT2,
                            'data' => $dataDistrict,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true], 'theme' => Select2::THEME_BOOTSTRAP],
                            'pluginOptions' => [
                                'depends' => ['ccity-id'],
                                'initialize' => true,
                                'initDepends' => ['ccity-id'],
                                'placeholder' => 'Chọn Quận/Huyện...',
                                'url' => Url::to(['/go/ajax/district-subcat'])
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>


        <?php echo $form->field($model, 'thumbnail', [
            'template' => $tempTextInput,
            'hintOptions' => [
                'tag' => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->widget(
            Upload::class,
            [
                'url' => ['/file-storage/upload'],
                'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                'maxFileSize' => 5000000, // 5 MiB
            ])->label('Ảnh logo');
        ?>


        <?php echo $form->field($model, 'url', [
            'template' => $tempTextInput,
            'hintOptions' => [
                'tag' => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->textInput([
            'maxlength' => true,
            'placeholder' => '',
            'class' => 'form-control input-md'
        ]) ?>
        <?php echo $form->field($model, 'email', [
            'template' => $tempTextInput,
            'hintOptions' => [
                'tag' => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->textInput([
            'maxlength' => true,
            'placeholder' => '',
            'class' => 'form-control input-md'
        ]) ?>

        <?php echo $form->field($model, 'phone', [
            'template' => $tempTextInput,
            'hintOptions' => [
                'tag' => 'span',
                'class' => 'form-text text-muted'
            ],
            'labelOptions' => [
                'class' => 'col-sm-3 col-form-label'
            ],
        ])->textInput([
            'maxlength' => true,
            'placeholder' => '',
            'class' => 'form-control input-md'
        ]) ?>

        <div class="content-subheading"><i class="icon-user fa"></i> <strong>Company
                information</strong></div>

        <!-- Text input-->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="textinput-name">Name</label>

            <div class="col-sm-8">
                <input id="textinput-name" name="textinput-name"
                       placeholder="Seller Name" class="form-control input-md" type="text">
            </div>
        </div>

        <!-- Appended checkbox -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="seller-email"> Company
                Email</label>

            <div class="col-sm-8">
                <input id="Company-email" name="Company-email" class="form-control"
                       placeholder="Email" type="text">

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox">
                        <small>Hide the Email on this jobs</small>
                    </label>
                </div>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="seller-Number">Phone
                Number</label>

            <div class="col-sm-8">
                <input id="seller-Number" name="seller-Number"
                       placeholder="Phone Number" class="form-control input-md"
                       type="text">
            </div>
        </div>


        <!-- Button  -->
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
                <?php echo Html::submitButton('Submit', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-custom' : 'btn btn-primary btn-lg btn-custom', 'data-style' => 'expand-right']) ?>
            </div>
            <div class="col-sm-2">
                <div class="pull-right">
                    <?php echo Html::a('<span class="fa fa-arrow-left"></span> ' . Yii::t('common', 'Back'), ['/ads/index'], ['class' => 'btn btn-lg btn-default hide-mobile']); ?>
                </div>
            </div>
        </div>
    </fieldset>
<?php ActiveForm::end(); ?>


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

.has-success .form-control {
    border-color: #28a745;
}
.has-error .form-control {
    border-color: #dc3545;
}
.has-error .help-block-error {
    color: #dc3545;
}

@media (max-width: 575px) {
    .form-group .control-label, .form-group .col-sm-8, .form-group .col-md-12 {
        padding-left: 0 !important;
    }
}

CSS;

$this->registerCss($app_css);