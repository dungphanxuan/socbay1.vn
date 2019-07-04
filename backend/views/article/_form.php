<?php

use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\money\MaskMoney;
use yii\web\JsExpression;
use froala\froalaeditor\FroalaEditorWidget;
use common\widgets\UploadCloudinary;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $ranks */
/* @var $dataSubCategory array */


?>

    <div class="article-form">

        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <?php echo $form->errorSummary($model, [
            'class' => 'alert alert-warning alert-dismissible',
            'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
        ]); ?>

        <?php echo $form->field($model, 'title', [
            'addon' => ['prepend' => ['content' => '<i class="fa fa-id-card-o"></i>']]
        ])->textInput(['maxlength' => true]) ?>

        <?php echo $form->field($model, 'slug')
            ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
            ->textInput(['maxlength' => true]) ?>

        <?php
        /*echo $form->field($model, 'slug', [
            'addon' => ['prepend' => ['content' => '<i class="fa fa-link"></i>']]
        ])
            ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
            ->textInput(['maxlength' => true])*/
        ?>

        <div class="row">
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'category_id', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-folder-open-o"></i>']]
                ])->widget(\kartik\widgets\Select2::class, [
                    'data' => ArrayHelper::map($categories, 'id', 'title'),
                    'options' => [
                        'placeholder' => 'Chọn category ...',
                        'id' => 'ccatid'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'addon' => [
                        'append' => [
                            'content' => '<a href="' . Url::to(['/article-category/index']) . '" target="_blank" class="fa fa-plus blue imouse"></a>',
                            'asButton' => false
                        ]
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'sub_category_id', [
                ])->widget(DepDrop::class, [
                    'options' => ['id' => 'sub-cat-id'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'data' => $dataSubCategory,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['ccatid'],
                        'placeholder' => 'Chọn Sub Category...',
                        'url' => Url::to(['/article-category/subcat'])
                    ]
                ]);
                ?>
            </div>
        </div>

        <?php
        echo $form->field($model, 'body')->widget(
            \yii\imperavi\Widget::class,
            [
                'plugins' => ['fullscreen', 'fontcolor', 'video'],
                'options' => [
                    'minHeight' => 200,
                    'maxHeight' => 250,
                    'buttonSource' => true,
                    'convertDivs' => false,
                    'removeEmptyTags' => false,
                    'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
                ]
            ]
        );
        ?>

        <?php
        /*echo $form->field($model, 'body')->widget(
            FroalaEditorWidget::class,
            [
                'options'         => [
                ],
                'csrfCookieParam' => '_csrf',
                'clientOptions' => [
                    'toolbarInline'       => false,
                    'toolbarSticky'       => false,
                    'height'              => 250,
                    'imageDefaultWidth'   => 680,
                    'imageStyles'         => [
                        'class1' => '12'
                    ],
                    'theme'               => 'gray',//royal
                    'language'            => 'vi',
                    //'toolbarButtons' => ['fullscreen', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage'],
                    'imageUploadURL'      => Url::to(['/file-storage/upload-froala']),
                    //'imageUploadURL'      => Url::to(['/file-storage/upload-storage']),
                    //'imageUploadURL'      => Url::to(['/file-storage/upload-google-cloud']),
                    'fileUploadURL'       => Url::to(['/file-storage/upload-froala']),
                    'imageManagerLoadURL' => Url::to(['/file-storage/file-froala'])
                ],
                //'clientPlugins' => []
                'clientPlugins' => ['align', 'fullscreen', 'table', 'url', 'paragraph_format', 'word_paste', 'colors', 'code_view']
            ]
        );*/
        ?>

        <?php echo $form->field($model, 'excerpt', [
        ])->textarea(['rows' => 3]) ?>

        <?php
        /*echo $form->field($model, 'body')->widget(\common\widgets\SimpleMDEWidget::class, [
        ])*/
        ?>

        <hr class="b2r">

        <div class="row">
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'city_id', [
                ])->widget(Select2::class, [
                    'data' => ArrayHelper::map($cities, 'id', 'name'),
                    'language' => 'vi',
                    'options' => ['id' => 'ccity-id', 'placeholder' => 'Chọn Tỉnh/Thành Phố ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'district_id', [
                ])->widget(DepDrop::class, [
                    'options' => ['id' => 'cdistrict-id'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'data' => $dataDistrict,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['ccity-id'],
                        'initialize' => true,
                        'initDepends' => ['ccity-id'],
                        'placeholder' => 'Chọn Quận/Huyện...',
                        'url' => Url::to(['/go/district/subcat'])
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'ward_id', [
                ])->widget(DepDrop::class, [
                    'options' => ['id' => 'ward-id'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'data' => $dataWard,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['cdistrict-id'],
                        'initialize' => true,
                        'initDepends' => ['cdistrict-id'],
                        'placeholder' => 'Chọn Phường/Xã...',
                        'url' => Url::to(['/go/ward/subcat'])
                    ]
                ]);
                ?>
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col-md-4">
                <?php
                /*echo $form->field($model, 'price', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-id-card-o"></i>']]
                ])->textInput(['maxlength' => true]);*/

                echo $form->field($model, 'price')->widget(MaskMoney::class, [
                    'pluginOptions' => [
                        'prefix' => 'đ ',
                        'thousands' => ' ',
                        'precision' => 0
                    ],
                    'options' => [
                        'maxlength' => '16'
                    ]
                ]);

                ?>

            </div>

            <div class="col-md-4">
                <?php echo $form->field($model, 'price_text', [
                ])->textInput(['maxlength' => true, 'placeholder' => 'Nhập text giá '])
                    ->hint('Nhập text khi giá sản phẩm lớn')
                ?>
            </div>

            <div class="col-md-4">
                <?php echo $form->field($model, 'condition_type', [
                ])->dropDownList([1 => 'Mới', 2 => 'Cũ'], ['prompt' => Yii::t('common', 'Condition') . ' ...']) ?>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?php echo $form->field($model, 'thumbnail')->widget(
                    UploadCloudinary::class,
                    [
                        'maxFileSize' => 5000000, // 5 MiB
                        'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                    ])->hint(Yii::t('common', 'Thumbnail Image'));
                ?>
            </div>
            <div class="col-md-8" id="box-attachments">
                <?php echo $form->field($model, 'attachments')->widget(
                    UploadCloudinary::class,
                    [
                        'url' => ['/file-storage/upload'],
                        'sortable' => true,
                        'maxFileSize' => 10000000, // 10 MiB
                        'maxNumberOfFiles' => 10,
                        'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                    ]);
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php echo $form->field($model, 'tagNames', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'tags',
                        'defaultOptions' => ['class' => 'text-warning'],
                    ]])->widget(\dosamigos\selectize\SelectizeTextInput::class, [
                    // calls an action that returns a JSON object with matched
                    // tags
                    'loadUrl' => ['article/list-tags'],
                    'options' => ['class' => 'form-control'],
                    'clientOptions' => [
                        'plugins' => ['remove_button'],
                        'valueField' => 'name',
                        'labelField' => 'name',
                        'searchField' => ['name'],
                        'create' => true,
                    ],
                ])->hint(Yii::t('common', 'Use commas to separate tags')) ?>

            </div>
        </div>

        <?php echo $form->field($model, 'status')->checkbox(['label' => Yii::t('common', 'Publish')]) ?>

        <div class="row">
            <div class="col-md-4">
                <?php echo $form->field($model, 'published_at', [
                ])->widget(
                    DateTimeWidget::class,
                    [
                        'phpDatetimeFormat' => 'yyyy-MM-dd',
                        'clientOptions' => [
                            'minDate' => new JsExpression('new Date("2017-01-01")'),
                            'allowInputToggle' => true,
                            'sideBySide' => true,
                            'locale' => 'vi',
                            'widgetPositioning' => [
                                'horizontal' => 'auto',
                                'vertical' => 'auto'
                            ]
                        ]
                    ]
                ) ?>
            </div>
            <div class="col-md-4">
                <?php echo $form->field($model, 'public_from', [
                ])->widget(
                    DateTimeWidget::class,
                    [
                        'phpDatetimeFormat' => 'yyyy-MM-dd',
                        'clientOptions' => [
                            'minDate' => new JsExpression('new Date("2017-01-01")'),
                            'allowInputToggle' => true,
                            'sideBySide' => true,
                            'locale' => 'vi',
                            'widgetPositioning' => [
                                'horizontal' => 'auto',
                                'vertical' => 'auto'
                            ]
                        ]
                    ]
                ) ?>
            </div>
            <div class="col-md-4">
                <?php echo $form->field($model, 'public_to', [
                ])->widget(
                    DateTimeWidget::class,
                    [
                        'phpDatetimeFormat' => 'yyyy-MM-dd',
                        'clientOptions' => [
                            'minDate' => new JsExpression('new Date("2017-01-01")'),
                            'allowInputToggle' => true,
                            'sideBySide' => true,
                            'locale' => 'vi',
                            'widgetPositioning' => [
                                'horizontal' => 'auto',
                                'vertical' => 'auto'
                            ]
                        ]
                    ]
                ) ?>
            </div>
        </div>

        <?php echo $form->field($model, 'sort_number', [
            'addon' => ['prepend' => ['content' => '<i class="fa fa-sort"></i>']],
            'template' => '{label} <div class="row"><div class="col-xs-4 col-sm-4">{input}{error}{hint}</div></div>'
        ])->textInput()->hint(Yii::t('common', 'Sort By Asc')) ?>

        <hr class="b2r">

        <br>
        <div class="form-group">
            <div class="col-sm-<?php echo $model->isNewRecord ? '2' : '2' ?> col-xs-2"></div>
            <div class="col-sm-3 col-xs-4">
                <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> ' . Yii::t('common', 'Back'), ['index'], ['class' => 'btn btn-flat btn-default btn200']); ?>
            </div>
            <div class="col-sm-3 col-xs-4">
                <?php echo Html::submitButton(
                    $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
                    ['class' => $model->isNewRecord ? 'btn btn-flat btn-success btn200' : 'btn btn-flat btn-primary btn200']) ?>
            </div>
            <div class="col-sm-3 col-xs-2 ">
                <?php
                if (!$model->isNewRecord) {
                    echo Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-flat btn-warning btn200 bold',
                            'data' => [
                                'confirm' => Yii::t('common', 'Are you sure to delete?'),
                                'method' => 'post',
                            ]
                        ]);
                }
                ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php

$app_css = <<<CSS
#box-attachments .upload-kit .upload-kit-item.image > img{
    max-width: 195px !important;
}
CSS;

$this->registerCss($app_css);

$app_js = <<<JS

JS;

