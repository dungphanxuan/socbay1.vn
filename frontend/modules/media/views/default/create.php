<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */

$this->title = 'Create Media';
\common\assets\Plyr::register($this);
$bundle = AdsAsset::register($this);
?>
    <div class="intro-inner">
        <div class="about-intro" style="
                background:url(<?= $this->assetManager->getAssetUrl($bundle, 'images/bg2.jpg') ?>) no-repeat center;
                background-size:cover;">

            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title"> Media Youtube Video </h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/.about-intro -->

    </div>
    <!-- /.intro-inner -->

    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <h1 class="text-center title-1"> classified ads <strong>FAQ</strong></h1>
                    <hr class="center-block small text-hr">
                </div>
                <div class="faq-content">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <?php
                            echo FileInput::widget([
                                'name'          => 'file',
                                'options'       => [
                                    'multiple' => true
                                ],
                                'pluginOptions' => [
                                    //'uploadUrl' => Url::to(['/file-storage/upload']),
                                    //'uploadUrl' => Url::to(['/file-storage/upload-google-cloud']),
                                    'uploadExtraData' => [
                                        'album_id' => 20,
                                        'cat_id'   => 'Nature'
                                    ],
                                    'maxFileCount'    => 1
                                ]
                            ]);
                            ?>
                        </div>
                        <div class="col-md-2">Download File Mp3</a></div>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
$app_js = <<<JS
const player = new Plyr('#player',{
    autoplay: true
});
JS;

$this->registerJs($app_js);



