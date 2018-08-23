<?php

use frontend\assets\AdsAsset;

/* @var $this yii\web\View */

$this->title = 'Jssor Slider';
\common\assets\Jssor::register($this);
$bundle = AdsAsset::register($this);
?>
    <div class="intro-inner">
        <div class="about-intro" style="
                background:url(<?= $this->assetManager->getAssetUrl($bundle, 'images/bg2.jpg') ?>) no-repeat center;
                background-size:cover;">

            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title"> Jssor Slider </h1>
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
                    <div class="row text-center">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div id="jssor_1"
                                 style="position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                                <div data-u="slides"
                                     style="position:absolute;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                                    <div><img data-u="image"
                                              src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/jssor/001.jpg') ?>"/>
                                    </div>
                                    <div><img data-u="image"
                                              src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/jssor/002.jpg') ?>"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-1"></div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php


$this->registerJs('
var options = { $AutoPlay: 1 };
        var jssor1_slider = new $JssorSlider$("jssor_1", options);
');



