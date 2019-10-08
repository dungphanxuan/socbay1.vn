<?php

use frontend\assets\AdsAsset;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $dataPopularProvider \yii\data\ActiveDataProvider */
$this->title = 'Media';
\common\assets\Plyr::register($this);
$bundle = AdsAsset::register($this);
?>
    <div class="intro-inner">
        <div class="about-intro" style="
                background:url(<?= $this->assetManager->getAssetUrl($bundle, 'images/bg/banner-media1.jpg') ?>) no-repeat center;
                background-size:cover;">

            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title" style="color: #FF5722;"> Video online </h1>
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
                    <h1 class="text-center title-1"> danh sách <strong>video</strong></h1>
                    <hr class="center-block small text-hr">
                </div>
                <div class="faq-content">
                    <div class="row">
                        <?php echo \yii\widgets\ListView::widget([
                            'dataProvider' => $dataProvider,
                            'layout' => '{items}',
                            'itemView' => '_item_index',
                            'options' => [
                                'tag' => false,
                            ],
                            'itemOptions' => [
                                'tag' => false,
                            ]
                        ]) ?>
                    </div>

                </div>


            </div>
        </div>
    </div>
<?php
$app_js = <<<JS
const player = new Plyr('#player', {
    autoplay: true
});
JS;

$this->registerJs($app_js);



