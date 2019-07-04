<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;

/* @var $this yii\web\View */
/* @var $model common\models\media\Media */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $categories */

$urlCreateCategory = Url::to(['/media/media-category/create']);
$templateInput = <<<HTML
<div class="form-group">

<div class="input-group">
  {input}
  <a href="$urlCreateCategory"  target="_blank" class="input-group-addon" id="basic-addon2">Add category</a>
</div>
  </div>
HTML;

?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model, [
        'class' => 'alert alert-warning alert-dismissible',
        'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'excerpt')->textarea(['rows' => 6]) ?>

            <?php echo $form->field($model, 'category_id', [
                'inputTemplate' => $templateInput
            ])->dropDownList(\yii\helpers\ArrayHelper::map(
                $categories,
                'id',
                'title'
            ), ['prompt' => '']) ?>

        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'episode')->textInput() ?>
            <?php echo $form->field($model, 'source')->widget(
                Upload::class,
                [
                    //'url'         => ['/file/storage/upload'],
                    'url' => ['/file-storage/upload-storage'],
                    'maxFileSize' => 500 * 1024 * 1024, // 500 MiB
                ])->hint('Upload video');
            ?>
            <?php echo $form->field($model, 'url_local')->textInput(['maxlength' => true]) ?>

        </div>
    </div>


    <?php echo $form->field($model, 'body')->widget(
        \yii\imperavi\Widget::class,
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 250,
                'maxHeight' => 250,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => true,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
            ],
        ]
    ) ?>

    <h4 style="margin-right:10px;margin-left:10px;">Thông tin tài nguyên Video</h4>
    <hr class="b2r">
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'thumbnail')->widget(
                Upload::class,
                [
                    'url' => ['/file-storage/upload'],
                    //'url'             => ['/file-storage/upload-storage'],
                    'maxFileSize' => 5000000, // 5 MiB
                ]);
            ?>

        </div>
        <div class="col-md-8">
            <?php echo $form->field($model, 'attachments')->widget(
                Upload::class,
                [
                    //'url'             => ['/file-storage/upload'],
                    //'url'             => ['/file-storage/upload-gcloud'],
                    'url' => ['/file-storage/upload-storage'],
                    //'url'             => ['/file-storage/upload-filestack-action'],
                    //'url'             => ['/file-storage/upload-cloudinary'],

                    'sortable' => true,
                    'maxFileSize' => 10000000, // 10 MiB
                    'maxNumberOfFiles' => 10,
                ]);
            ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'video_play_type')->textInput() ?>

        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'url_streaming')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'youtube_url')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'review_url')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php echo $form->field($model, 'is_hot')->checkbox() ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->field($model, 'status')->checkbox() ?>

            <?php echo $form->field($model, 'published_at')->widget(
                DateTimeWidget::class,
                [
                    'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ',
                    'clientOptions' => [
                        'minDate' => new \yii\web\JsExpression('new Date("2018-04-01")'),
                        'allowInputToggle' => true,
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


    <hr class="b2r">

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?php echo Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Quay lại', ['index'], ['class' => 'btn btn-flat btn-default']); ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
