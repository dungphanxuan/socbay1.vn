<?php

use frontend\assets\AdsAsset;
use common\helpers\ArticleHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $catModel \common\models\ArticleCategory */

$this->title = $model->title;

$bundle = AdsAsset::register($this);
$articleDetail = ArticleHelper::getDetail($model->id);
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="event-home.html"><i class="icon-home fa"></i></a></li>
                        <li class="breadcrumb-item"><a href="event-category.html">Events</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search Results</li>
                    </ol>
                </nav>


                <div class="pull-right backtolist"><a href="event-category.html"> <i
                                class="fa fa-angle-double-left"></i> Back to Results</a></div>

            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 page-content col-thin-right">
                <div class="ev-image">
                    <img class="img-responsive"
                         src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/1-large.jpg') ?>"
                         alt="img">
                    <div class="ev-share">

                        <ul class="list-inline social-links">
                            <li class="list-inline-item">

                                <span class="share-text">Share</span>

                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="event-details-title">
                    <h1 class="title">
                        <span class="auto-title left"><?php echo $model->title ?>  </span>
                        <span class="auto-price pull-right"> $44.00</span>
                    </h1>

                </div>
                <div class="inner inner-box ads-details-wrapper event">


                    <div class="Ads-Details">
                        <?php echo HtmlPurifier::process($model->body) ?>
                        <br>

                        <div class="content-footer text-left">
                            <div class="w100 map" id="prop-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.86637487786!2d-74.25819556904787!3d40.70531103651696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1473181424956"
                                        height="350" style="border:0;   width:100%"></iframe>
                            </div>
                            <div style="clear: both"></div>

                            <a class="btn  btn-default" data-toggle="modal" href="#contactAdvertiser"><i
                                        class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info"
                                                                                         href="tel:01680531345452"><i
                                        class=" icon-phone-1"></i> 01680 531 352 </a>
                        </div>
                    </div>
                </div>
                <!--/.ads-details-wrapper-->

            </div>
            <!--/.page-content-->

            <div class="col-md-4  page-sidebar-right">
                <aside>
                    <div class="block-cell user">
                        <div class="cell-media"><img
                                    src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/2.jpg') ?>"
                                    alt=""></div>
                        <div class="cell-content">
                            <h5 class="title">Organize by</h5>
                            <span class="name"><a href="#">David Jhone Jr. </a></span>
                            <span class="rating">top rated</span>
                        </div>
                    </div>

                    <div class="card sidebar-card">
                        <div class="card-header">EVENT DETAILS</div>
                        <div class="card-content">
                            <div class="card-body text-left">
                                <h5 class="text-uppercase"><strong>Date & Time</strong></h5>
                                <div class="ev-info-details">
                                    <div class="ev-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="ev-details">
                                        <p>
                                            <span>Wednesday August 20 2019 12:00 PM to </span>
                                            <span>Sunday October 10 2019 EST </span></p>
                                    </div>
                                </div>

                                <h5 class="text-uppercase"><strong>Location </strong></h5>
                                <div class="ev-info-details">
                                    <div class="ev-icon">
                                        <i class="fas fa-map-marked"></i>
                                    </div>
                                    <div class="ev-details">
                                        <address>Rickey S Marino <br>
                                            3277 Horseshoe Lane <br>
                                            New York 75105
                                        </address>
                                    </div>
                                </div>

                            </div>

                            <div class="ev-action">
                                <a class="btn btn-success btn-block"> GET TICKET <span class="price">$ 44 </span>
                                </a>
                                <p class="text-muted">
                                    <small>* Registration closes at the end of event</small>
                                </p>
                            </div>

                        </div>
                    </div>
                    <!--/.categories-list-->
                </aside>
            </div>
            <!--/.page-side-bar-->
        </div>
    </div>
</div>
<!-- /.main-container -->