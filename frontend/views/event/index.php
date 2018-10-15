<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: pxdung
 * Date: 9/14/2018
 * Time: 3:05 PM
 */
/* @var $this yii\web\View */
/* @var $modelEventCat */
/* @var $dataEventFeatureProvider \yii\data\ActiveDataProvider */
/* @var $dataEventProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('ads', 'Events');
$imgUrl = baseUrl() . '/frontend/web/theme/images/house/1.jpg';
$bundle = AdsAsset::register($this);
?>
    <div class="intro-modern">
        <div class="inner">
            <div class="container text-center">
                <p class="title-6-sub top animateme fittext3 animated fadeIn">
                    Browse Event

                </p>
                <h1 class="title-6 animated fadeInDown"> Events Classified </h1>


                <div class="row search-row animated fadeInUp">
                    <div class="col-xl-4 col-sm-4 search-col relative"><i class="icon-docs icon-append"></i>
                        <input type="text" name="ads" class="form-control has-icon"
                               placeholder="Search events nearby" value="">
                    </div>
                    <div class="col-xl-4 col-sm-4 search-col relative locationicon">
                        <i class="icon-location-2 icon-append"></i>
                        <input type="text" name="country" id="autocomplete-ajax"
                               class="form-control locinput input-rel searchtag-input has-icon"
                               placeholder="City or Location" value="">

                    </div>

                    <div class="col-xl-4 col-sm-4 search-col">
                        <button class="btn btn-primary btn-search btn-block  btn-gradient"><strong>Search</strong>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="layer-bg">

        </div>

        <div class="bg-slider-wrapper">
            <div class="bg-slider">
                <div class="bg-item"
                     style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/1-large_x2.jpg') ?>);"></div>
                <div class="bg-item"
                     style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/5-large_x2.jpg') ?>);"></div>
                <div class="bg-item"
                     style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/6-large_x2.jpg') ?>);"></div>
            </div>
        </div>
    </div>
    <!-- /.intro -->

    <section class="event-featured section-ev">
        <div class="container">
            <div class="col-12 title-box text-center section-header">
                <h2 class="title"> Featured Events in <a class="ev">Ha Noi</a></h2>
            </div>

            <div class="row">
                <?php echo \yii\widgets\ListView::widget([
                    'dataProvider' => $dataEventFeatureProvider,
                    'options' => [
                        'tag' => false
                    ],
                    'itemView' => 'item/_item_event_feature',
                    'itemOptions' => [
                        'tag' => false,
                    ],
                    'layout' => "{items}",
                ]);
                ?>
            </div>


            <div style="clear: both"></div>

        </div>
    </section>
    <!-- /.main-container -->

    <section class="event-listing section-ev">
        <div class="container">
            <div class="section-header listing-title-holder">


                <div class="row for-list align-center">
                    <div class="event-title-holder  col-lg-4 col-md-3 col-sm-12 mr-auto">
                        <h2 class="title text-left"> EXPLORE YOUR EVENTS </h2>

                    </div>

                    <div class="event-filters-wrapper col">
                        <div class="input-group row">
                            <!-- Example single danger button -->
                            <div class="btn-group col ">
                                <button type="button" class="btn btn-default btn-block btn-line dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    FEATURED EVENTS
                                </button>
                                <div class="dropdown-menu dropdown-line">
                                    <a class="dropdown-item" href="#">Featured events</a>
                                    <a class="dropdown-item" href="#">New added</a>
                                    <a class="dropdown-item" href="#">Popular</a>
                                    <a class="dropdown-item" href="#">recommended</a>
                                </div>
                            </div>

                            <div class="btn-group col ">
                                <button type="button" class="btn btn-default btn-block btn-line dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    By Date
                                </button>
                                <div class="dropdown-menu dropdown-line">
                                    <a class="dropdown-item" href="#">All Events</a>
                                    <a class="dropdown-item" href="#"> Today</a>
                                    <a class="dropdown-item" href="#"> This week</a>
                                    <a class="dropdown-item" href="#"> Next Month</a>
                                </div>
                            </div>

                            <div class="btn-group col">
                                <button type="button" class="btn btn-default btn-block btn-line dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    By Location
                                </button>

                                <div class="dropdown-menu dropdown-line has-form stay">
                                    <div class="dropdown-item ">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">5 miles from
                                                zip</label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="customRadio"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">5 miles from
                                                zip</label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="customRadio"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio3">5 miles from
                                                zip</label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio4" name="customRadio"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio4">10 miles from
                                                zip</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-item">
                                        <a class="dropdown-clear-filter">X</a>
                                    </div>

                                </div>


                            </div>

                            <div class="btn-group col">
                                <button type="button" class="btn btn-default btn-block btn-line dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    By Category
                                </button>
                                <div class="dropdown-menu dropdown-line has-form stay">
                                    <div class="dropdown-item ">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Popular</label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Music</label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Food and
                                                drink</label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label" for="customCheck5">Business </label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                            <label class="custom-control-label" for="customCheck6">Technology</label>
                                        </div>
                                    </div>

                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                            <label class="custom-control-label" for="customCheck7">Sports and
                                                fitness</label>
                                        </div>
                                    </div>


                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-item">
                                        <a class="dropdown-clear-filter">X</a>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <?php echo \yii\widgets\ListView::widget([
                    'dataProvider' => $dataEventProvider,
                    'options' => [
                        'tag' => false
                    ],
                    'itemView' => 'item/_item_event_home',
                    'itemOptions' => [
                        'tag' => false,
                    ],
                    'layout' => "{items}",
                ]);
                ?>

                <div class="load-more  col-lg-12 text-center">
                    <a class="btn btn-default btn-wide btn-more " href="<?php echo Url::to(['/ads/index', 'cslug' => $modelEventCat->slug]) ?>">
                        <i class="fas fa-plus"></i> Load More
                    </a>
                </div>

            </div>


        </div>

    </section>

    <section class="event-category section-ev">
        <div class="container">
            <div class="col-12 title-box text-center section-header">
                <h2 class="title"> Explore by category</h2>
            </div>


            <div class="row">

                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/1.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Fitness </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/9.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">

                                <div class="event-pop-info">
                                    <p class="ec-title"> Travel </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>

                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/4.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Music </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/5.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Learning </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/6.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Photography </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/7.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Opera </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/3.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Tennis </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/8.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Education </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>

                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/2.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Running </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>

                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/10.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Video Games </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>

                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/11.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Fashion & Beauty </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>

                <div class=" col-md-3 col-sm-6 col-6 event-item-col">
                    <div class="card card-event info-overlay overlay-visible card-category">
                        <div class="img has-background"
                             style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/category/12.jpg') ?>); background-size:cover ">
                            <a href="event-details.html" class="event-pop-link">


                                <div class="event-pop-info">

                                    <p class="ec-title"> Food </p>
                                </div>

                            </a>
                            <img alt="340x230" class="card-img-top img-responsive" data-holder-rendered="true"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/3x1.gif') ?>">
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>


    <div class="page-info hasOverly"
         style="background: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/bg.jpg') ?>); background-size:cover">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>100K+</span></h5>

                                    <div class="iconbox-wrap-text">Events</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>100</span></h5>

                                    <div class="iconbox-wrap-text">Categories</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>700</span></h5>

                                    <div class="iconbox-wrap-text">Location</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon icon-facebook"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>50,000</span></h5>

                                    <div class="iconbox-wrap-text"> Facebook Fans</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">

            <div class="page-bottom-info-content text-center">
                <h1>If you have any questions, comments or concerns, please call the Classified Advertising department
                    at (000) 555-5556</h1>
                <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                    <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (000) 555-5555 </a>
            </div>

        </div>
    </div>

<?php
$app_css = <<<CSS

CSS;

$this->registerCss($app_css);

$app_js = <<<JS

JS;

$this->registerJs($app_js);
?>