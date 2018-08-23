<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = 'File Upload';
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'File Storage Items'), 'url' => ['index']];
?>
    <div class="file-storage-item-view">

        <h3>File Upload</h3>
        <?php
        echo \trntv\filekit\widget\Upload::widget([
            'name'                => 'filename',
            'hiddenInputId'       => 'filename', // must for not use model
            'url'                 => ['/file-storage/upload-filestack-action'],
            'sortable'            => true,
            'maxFileSize'         => 10 * 1024 * 1024, // 10Mb
            //'minFileSize'         => 1 * 1024 * 1024, // 1Mb
            'maxNumberOfFiles'    => 7, // default 1,
            'acceptFileTypes'     => new \yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
            'showPreviewFilename' => false,
            'clientOptions'       => []
        ]);
        ?>
        <button type="button" class="btn btn-info">Upload Done</button>


    </div>

<?php
$app_css = <<<CSS
 .tocenter {
    margin:0 auto;
    display: inline;
    }
CSS;

$this->registerCss($app_css);
