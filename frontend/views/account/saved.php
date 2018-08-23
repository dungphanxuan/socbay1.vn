<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Lưu tìm kiếm';

$adsUrl = Url::to(['/ads/index']);
$bundle = AdsAsset::register($this);
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 page-sidebar">
                <aside>
                    <?php echo $this->render('_menu', []) ?>
                </aside>
            </div>
            <!--/.page-sidebar-->

            <div class="col-md-9 page-content">
                <div class="inner-box">
                    <h2 class="title-2"><i class="icon-star-circled"></i> Lưu tìm kiếm </h2>

                    <div class="row">
                        <div class="col-sm-4">
                            <ul class="list-group list-group-unstyle">
                                <li class="list-group-item active"><a href="<?php echo $adsUrl ?>" class="">
                                        <span> SAMSUNG GALAXY MOBILE...</span>
                                        <span class=" label label-warning">14+</span> </a> <span
                                            class="delete-search-result">&times;</span></li>
                                <li class="list-group-item "><a href="<?php echo $adsUrl ?>" class="">
                                        <span> SAMSUNG GALAXY MOBILE...</span> </a></li>
                            </ul>
                        </div>
                        <div class="col-sm-8">
                            <div class="adds-wrapper">
                                <div class="item-list">
                                    <div class="row">
                                        <div class="col-md-2 no-padding photobox">
                                            <div class="add-image"><span class="photo-count"><i
                                                            class="fa fa-camera"></i> 2 </span> <a
                                                        href="<?php echo $adsUrl ?>"><img
                                                            class="thumbnail no-margin"
                                                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/item/tp/Image00014.jpg') ?>"
                                                            alt="img"></a></div>
                                        </div>
                                        <!--/.photobox-->
                                        <div class="col-sm-8 add-desc-box">
                                            <div class="ads-details">
                                                <h5 class="add-title"><a href="<?php echo $adsUrl ?>"> SAMSUNG GALAXY S
                                                        CORE
                                                        Duos </a></h5>
                                                <span class="info-row"> <span class="add-type business-ads tooltipHere"
                                                                              data-toggle="tooltip"
                                                                              data-placement="right"
                                                                              title="Business Ads">B </span> <span
                                                            class="date"><i
                                                                class=" icon-clock"> </i> Today 1:21 pm </span> - <span
                                                            class="category">Electronics </span>- <span
                                                            class="item-location"><i class="fa fa-map-marker"></i> Hà Nội </span> </span>
                                            </div>
                                        </div>
                                        <!--/.add-desc-box-->

                                        <div class="col-sm-2 text-right text-center-xs price-box">
                                            <h4 class="item-price"> $ 230</h4>
                                        </div>
                                    </div>
                                </div>
                                <!--/.item-list-->
                            </div>
                        </div>
                    </div>

                    <!--/.row-box End-->

                </div>
            </div>
            <!--/.page-content-->
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>


