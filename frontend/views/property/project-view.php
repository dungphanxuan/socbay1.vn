<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\assets\LightSlider;
use frontend\assets\PropertyAsset;
use frontend\assets\AdsAsset;
use common\models\property\Project;
use yii\widgets\ListView;
use common\helpers\PropertyHelper;

/* @var $this yii\web\View */
/* @var $model Project */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $providerPickup \yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Project') . ' ' . $model->title;

PropertyAsset::register($this);
$this->registerCssFile("@web/frontend/web/theme/assets/css/page/style-page.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::class],
]);

$projectDetail = PropertyHelper::getProjectDetail($model->id, true);
$imagesAttactment = $projectDetail['attachments'];
//dd($imagesAttactment);
//$imgDefault = 'https://showcaserealty.net/wp-content/uploads/2017/01/bg.jpg';
$imgBG = baseUrl() . '/frontend/web/images/bg/property/bgProject.jpg';
$imgDefault = baseUrl() . '/frontend/web/images/property/project_view.jpg';
$mobileDetect = new \common\helpers\Mobile_Detect();
$bundle = AdsAsset::register($this);
?>
    <div class="banner-gallery">
        <div class="caption0" style="display:none">
            <h3>Ảnh phối cảnh dự án</h3>
            <p>A gorgeous Sunset tonight captured at Coniston Water....</p>
        </div>

        <div id="aniimated-thumbnials">
            <?php if ($imagesAttactment): ?>
                <?php foreach ($imagesAttactment as $item): ?>
                    <a href="<?php echo $item[0] ?>">
                        <img src="<?php echo $imgBG ?>" data-src="<?php echo $item[0] ?>" class="lazy"
                             alt="Ảnh phối cảnh">
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <a href="<?php echo $imgDefault ?>" data-sub-html=".caption0">
                    <img src="<?php echo $imgBG ?>" data-src="<?php echo $imgDefault ?>" class="lazy"
                         alt="Ảnh phối cảnh">
                </a>
            <?php endif; ?>
        </div>
        <!--END: Aniimated-->

        <div class="box-text">
            <h2><?php echo $model->title ?></h2>
            <div class="price">
                <p>
                    <span>$ 322,000</span>
                    <span>Actual Price</span>
                </p>
                <p>
                    <span>$ 404,900</span>
                    <span>Total Return</span>
                </p>
            </div>
            <!--End: Price-->
            <div class="user">
                <div class="images">
                    <img src="" data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/3.jpg') ?>"
                         alt="images"
                         class="img-responsive lazy">
                </div>
                <div class="text">
                    <h4>Tập đoàn </h4>
                    <p class="rate">
                        <i class="fa fa-star active"></i>
                        <i class="fa fa-star active"></i>
                        <i class="fa fa-star active"></i>
                        <i class="fa fa-star active"></i>
                        <i class="fa fa-star"></i>
                    </p>
                    <p class="sale">4.5/38 Sales</p>
                </div>
            </div>
            <!--End: User-->
            <a href="#" class="btn link-green"><?php echo Yii::t('ads', 'Request Information') ?></a>
            <a href="#" class="link-fav"><i class="fa fa-heart"></i><?php echo Yii::t('frontend', 'Add to Favorites') ?>
            </a>
        </div>
        <!--End:box-text-->
    </div>
    <!--End: Banner Gallery-->

    <div class="main-container background-white">
        <div class="container">
            <div class="row">

                <div class="col-md-3  page-sidebar-right space-50">
                    <aside>

                        <div class="sidebar-panel sidebar-request d-block d-sm-none">
                            <h2><?php echo $model->title ?></h2>
                            <div class="price">
                                <p>
                                    <span>$ 322,000</span>
                                    <span>Actual Price</span>
                                </p>
                                <p>
                                    <span>$ 404,900</span>
                                    <span>Total Return</span>
                                </p>
                            </div>
                            <!--End: price-->
                            <div class="user">
                                <div class="images">
                                    <img src=""
                                         data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/3.jpg') ?>"
                                         alt="images" class="img-responsive lazy">
                                </div>
                                <div class="text">
                                    <h4>Carl Simons</h4>
                                    <p class="rate">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </p>
                                    <p class="sale">4.5/38 Sales</p>
                                </div>
                            </div>
                            <!--End: user-->
                            <a href="#" class="btn link-green">Request Information</a>
                        </div>
                        <!--End: sidebar panel-->

                        <div class="sidebar-panel sidebar-list">
                            <ul>
                                <li>
                                    <p>Property Valuation</p>
                                    <p>$119,000 - $132,000</p>
                                </li>
                                <li>
                                    <p>Estimated Market Rent</p>
                                    <p>$1,050</p>
                                </li>
                                <li>
                                    <p>Inspection Report</p>
                                    <p>Interior & Exterior</p>
                                </li>
                                <li>
                                    <p>Title</p>
                                    <p>Clearance at Closing</p>
                                </li>
                            </ul>
                            <ul class="no-icon">
                                <li>
                                    <p>Value Projection</p>
                                    <p>
                                        <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/project-view/piechart.png') ?>"
                                             alt="images" class="img-responsive"></p>
                                </li>
                                <li>
                                    <a class="download-pdf" href="#" title="download"><i class="icon"></i>Download Full
                                        Report (pdf)</a>
                                </li>
                            </ul>
                        </div>
                        <!--End: sidebar panel-->
                        <?php echo ListView::widget([
                            'dataProvider' => $providerPickup,
                            'options'      => [
                                'tag' => false,
                            ],
                            'itemView'     => '_item_project_relative',
                            'itemOptions'  => [
                                'tag' => false,
                            ],
                            'layout'       => "{items}",
                        ]);
                        ?>
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <div class="head-sort-by">
                            <ul class="breadcrumb">
                                <li><a href="#">For sale</a></li>
                                <li><a href="#"><?php echo $projectDetail['city_name'] ?></a></li>
                                <?php if ($projectDetail['district_name']): ?>
                                    <li class="active"><?php echo $projectDetail['district_name'] ?></li>
                                <?php endif; ?>
                            </ul>
                            <div class="sort-by">
                                <a href="#" title="Yearly">Yearly</a>
                                <a href="#" title="Montly">Montly</a>
                                <form action="#" class="select-sortby">
                                    <select name="sort-by">
                                        <option value="Popularity">By Popularity</option>
                                        <option value="Popularity">Popularity 1</option>
                                        <option value="Popularity">Popularity 2</option>
                                        <option value="Popularity">Popularity 3</option>
                                    </select>
                                    <i class="icon-down-open-big fa"></i>
                                </form>
                            </div>
                        </div>
                        <!--End: head sort by-->
                        <div class="content-text">
                            <div class="price-text">
                                <p class="title-price">Total return</p>
                                <div class="left">$ 498,000 <span>USD</span></div>
                                <div class="right">
                                    <p>
                                        <span>$ 2,400</span>
                                        <span>Current Rent</span>
                                    </p>
                                    <p>
                                        <span>3</span>
                                        <span>Rooms</span>
                                    </p>
                                    <p>
                                        <span>350</span>
                                        <span>sqft</span>
                                    </p>
                                </div>
                            </div>
                            <!--End: price-text-->
                            <div class="address">
                                <p><i class="fa fa-map-marker"></i>645 W 9th St Unit 328 Los Angeles, CA 900015</p>
                            </div>
                            <!--End: address-->
                            <div class="percent-text">
                                <div>
                                    <div class="item">
                                        <p>$ 3,100</p>
                                        <p>Market Rent</p>
                                    </div>
                                    <!--End: item-->
                                    <div class="item">
                                        <p>$ 7,800</p>
                                        <p>Unlevered Cash Flow</p>
                                    </div>
                                    <!--End: item-->
                                    <div class="item">
                                        <p>1.8%</p>
                                        <p>Appreciation</p>
                                    </div>
                                    <!--End: item-->
                                    <div class="item">
                                        <p>10.2%</p>
                                        <p>Gross Yield</p>
                                    </div>
                                    <!--End: item-->
                                </div>
                                <div>
                                    <div class="item">
                                        <p>12.3%</p>
                                        <p>Levered IRR</p>
                                    </div>
                                    <!--End: item-->
                                    <div class="item">
                                        <p>6.1%</p>
                                        <p>Unlevered Net Yield</p>
                                    </div>
                                    <!--End: item-->
                                    <div class="item2">
                                        <a class="download-pdf" href="#" title="download"><i class="icon"></i>Download
                                            Full Report (pdf)</a>
                                    </div>
                                    <!--End: item-->
                                </div>
                            </div>
                            <!--End: percent-text-->
                            <div class="details-text">
                                <h3>Chi tiết dự án</h3>
                                <p>At the forecasted level of rent, Gross Rental Yield would be 5.15% and the forecast
                                    Dividend Yield 3.54%</p>
                                <?php echo $model->body ?>
                                <br>
                                <a class="view-more" data-toggle="collapse" href="#collapseMore" role="button"
                                   aria-expanded="false" aria-controls="collapseMore"><i class="fa fa-plus"></i>Xem
                                    thêm</a>

                                <div class="collapse" id="collapseMore">
                                    <p>
                                        View more text
                                    </p>
                                </div>
                            </div>
                            <!--End: details-text-->
                            <div class="chara-text">
                                <h3>Characteristics</h3>
                                <ul class="list-1">
                                    <li>
                                        <p>Year Built</p>
                                        <p>1998</p>
                                    </li>
                                    <li>
                                        <p>Sq Ft</p>
                                        <p>350</p>
                                    </li>
                                    <li>
                                        <p>Bedrooms</p>
                                        <p>3</p>
                                    </li>
                                </ul>
                                <ul class="list-2">
                                    <li>
                                        <p>Lot Size</p>
                                        <p>15,755</p>
                                    </li>
                                    <li>
                                        <p>HOA</p>
                                        <p>none</p>
                                    </li>
                                    <li>
                                        <p>Bathrooms</p>
                                        <p>2</p>
                                    </li>
                                </ul>
                                <a href="#" class="view-more"><i class="fa fa-plus"></i>View more</a>
                            </div>
                            <!--End:Chara-text-->
                            <div class="slide-one-item">
                                <h3>Floorplan</h3>
                                <div class="owl-carousel slider-1-item owl-theme">
                                    <div class="item">
                                        <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/project-view/floor.jpg') ?>"
                                             alt="images" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/project-view/floor.jpg') ?>"
                                             alt="images" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <!--End slide-->
                            <div class="neigh">
                                <h3>Neighborhood</h3>
                                <div class="item">
                                    <p>35 yrs</p>
                                    <p>Average Age</p>
                                </div>
                                <div class="item">
                                    <p>28%</p>
                                    <p>Married</p>
                                </div>
                                <div class="item">
                                    <p>72%</p>
                                    <p>College Grads</p>
                                </div>
                                <div class="item">
                                    <p>1998</p>
                                    <p>Built Around</p>
                                </div>
                                <div class="item">
                                    <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/project-view/ownership.png') ?>"
                                         alt="images" class="img-responsive">
                                </div>
                            </div>
                            <!--End:Neight-->
                            <div class="utilities">
                                <h3>Utilities Estimate</h3>
                                <div class="score">
                                    <h5>
                                        <span>Score:</span>
                                        <span>Excellent</span>
                                    </h5>
                                    <p>This Property Scored 83/100 </br>Lower costs than most in the area</p>
                                </div>
                                <div class="item">
                                    <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/project-view/gas-water-elec.png') ?>"
                                         alt="images" class="img-responsive">
                                </div>
                            </div>
                            <!--End: Utilities-->
                        </div>
                        <!--End: content-text-->
                    </div>
                    <!--/.ads-details-wrapper-->
                </div>
                <!--/.page-content-->
            </div>
        </div>
    </div>
    <!-- /.main-container -->


<?php

$app_css = <<<CSS
#aniimated-thumbnials a:first-child{ 
    width: 100%;
}
#aniimated-thumbnials a:first-child img{ 
    width: 100%;
    max-height: 500px;
}
CSS;
$this->registerCss($app_css);

$app_js = <<<JS
$('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });

    $('#aniimated-thumbnials').lightGallery({
        thumbnail:true,
    });
    
    $('.slider-1-item').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        item:1,
        responsive:{
            0:{
                items:1
            }
        }
    });

JS;

$this->registerJs($app_js);
