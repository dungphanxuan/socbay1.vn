<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsAssets */
/* @var $form yii\bootstrap\ActiveForm */
?>

    <div class="ads-assets-form">

        <?php $form = ActiveForm::begin([]); ?>

        <?php echo $form->errorSummary($model, [
            'class'  => 'alert alert-warning alert-dismissible',
            'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?php echo $form->field($model, 'body')->widget(
            \yii\imperavi\Widget::class,
            [
                'plugins' => ['fullscreen', 'fontcolor', 'video'],
                'options' => [
                    'minHeight'       => 300,
                    'maxHeight'       => 300,
                    'buttonSource'    => true,
                    'convertDivs'     => false,
                    'removeEmptyTags' => true,
                    'imageUpload'     => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi']),
                ],
            ]
        ) ?>
        <hr class="b2r">

        <div class="row">
            <div class="col-md-12">
                <?php echo $form->field($model, 'thumbnail')->widget(
                    Upload::class,
                    [
                        'url'         => ['/file-storage/upload'],
                        'maxFileSize' => 5000000, // 5 MiB
                    ]);
                ?>
            </div>
            <div class="col-md-12">
                <?php echo $form->field($model, 'attachments')->widget(
                    Upload::class,
                    [
                        'url'              => ['/file-storage/upload'],
                        'sortable'         => true,
                        'maxFileSize'      => 10000000, // 10 MiB
                        'maxNumberOfFiles' => 10,
                    ]);
                ?>
            </div>
        </div>

        <?php echo $form->field($model, 'type')->textInput() ?>

        <?php echo $form->field($model, 'status')->checkbox() ?>

        <?php echo $form->field($model, 'sort_number')->textInput() ?>
        <hr class="b2r">
        <div class="form-group">
            <?php echo Html::submitButton($model->isNewRecord
                ? 'Create' : 'Update',
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
