<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Bất động sản';
$bundle = AdsAsset::register($this);
?>
<!-- /.header -->
<div class="search-row-wrapper">
    <div class="container ">
        <form action="#" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <input class="form-control keyword" type="text" placeholder="e.g. Mobile Sale">
                </div>
                <div class="col-md-3">
                    <select class="form-control selecter" name="category" id="search-category">
                        <option selected="selected" value="">All Categories</option>
                        <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;"
                                disabled="disabled">- Vehicles -
                        </option>
                        <option value="Cars">Cars</option>
                        <option value="Commercial vehicles">Commercial vehicles</option>
                        <option value="Motorcycles">Motorcycles</option>
                        <option value="Motorcycle Equipment">Car &amp; Motorcycle Equipment</option>
                        <option value="Boats">Boats</option>
                        <option value="Vehicles">Other Vehicles</option>
                        <option value="House" style="background-color:#E9E9E9;font-weight:bold;"
                                disabled="disabled">- House and Children -
                        </option>
                        <option value="Appliances">Appliances</option>
                        <option value="Inside">Inside</option>
                        <option value="Games">Games and Clothing</option>
                        <option value="Garden">Garden</option>
                        <option value="Multimedia" style="background-color:#E9E9E9;font-weight:bold;"
                                disabled="disabled">- Multimedia -
                        </option>
                        <option value="Telephony">Telephony</option>
                        <option value="Image">Image and sound</option>
                        <option value="Computers">Computers and Accessories</option>
                        <option value="Video">Video games and consoles</option>
                        <option value="Real" style="background-color:#E9E9E9;font-weight:bold;"
                                disabled="disabled">- Real Estate -
                        </option>
                        <option value="Apartment">Apartment</option>
                        <option value="Home">Home</option>
                        <option value="Vacation">Vacation Rentals</option>
                        <option value="Commercial">Commercial offices and local</option>
                        <option value="Grounds">Grounds</option>
                        <option value="Houseshares">Houseshares</option>
                        <option value="Other real estate">Other real estate</option>
                        <option value="Services" style="background-color:#E9E9E9;font-weight:bold;"
                                disabled="disabled">- Services -
                        </option>
                        <option value="Jobs">Jobs</option>
                        <option value="Job application">Job application</option>
                        <option value="Services">Services</option>
                        <option value="Price">Price</option>
                        <option value="Business">Business and goodwill</option>
                        <option value="Professional">Professional equipment</option>
                        <option value="dropoff" style="background-color:#E9E9E9;font-weight:bold;"
                                disabled="disabled">- Extra -
                        </option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control selecter" name="location" id="id-location">
                        <option selected="selected" value="">All Locations</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">Hà Nội</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                        <option value="Other-Locations">Other Locations</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-block btn-primary  "><i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.search-row -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
            <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="categories-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
                            <ul class=" list-unstyled">
                                <li><a href=""><span
                                                class="title">Electronics</span><span
                                                class="count">&nbsp;8626</span></a>
                                </li>
                                <li><a href=""><span
                                                class="title">Automobiles </span><span
                                                class="count">&nbsp;123</span></a></li>
                                <li><a href=""><span
                                                class="title">Property </span><span class="count">&nbsp;742</span></a>
                                </li>
                                <li><a href=""><span
                                                class="title">Services </span><span class="count">&nbsp;8525</span></a>
                                </li>
                                <li><a href=""><span
                                                class="title">For Sale </span><span class="count">&nbsp;357</span></a>
                                </li>
                                <li><a href=""><span
                                                class="title">Learning </span><span class="count">&nbsp;3576</span></a>
                                </li>
                                <li><a href=""><span class="title">Jobs </span><span
                                                class="count">&nbsp;453</span></a></li>
                                <li><a href=""><span
                                                class="title">Cars & Vehicles</span><span class="count">&nbsp;801</span></a>
                                </li>
                                <li><a href=""><span class="title">Other</span><span
                                                class="count">&nbsp;9803</span></a></li>
                            </ul>
                        </div>
                        <!--/.categories-list-->

                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                            <ul class="browse-list list-unstyled long-list">
                                <li><a href=""> Atlanta </a></li>
                                <li><a href=""> Wichita </a></li>
                                <li><a href=""> Anchorage </a></li>
                                <li><a href=""> Dallas </a></li>
                                <li><a href="">Hà Nội </a></li>
                                <li><a href=""> Santa Ana/Anaheim </a></li>
                                <li><a href=""> Miami </a></li>
                                <li><a href=""> Virginia Beach </a></li>
                                <li><a href=""> San Diego </a></li>
                                <li><a href=""> Boston </a></li>
                                <li><a href=""> Houston </a></li>
                                <li><a href="">Salt Lake City </a></li>
                                <li><a href=""> Other Locations </a></li>
                            </ul>
                        </div>
                        <!--/.locations-list-->

                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                            <form role="form" class="form-inline ">
                                <div class="form-group col-lg-4 col-md-12 no-padding">
                                    <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                                </div>
                                <div class="form-group col-lg-1 col-md-12 no-padding text-center hidden-md"> -</div>
                                <div class="form-group col-lg-4 col-md-12 no-padding">
                                    <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                                </div>
                                <div class="form-group col-lg-3 col-md-12 no-padding">
                                    <button class="btn btn-default pull-right btn-block-md" type="submit">GO
                                    </button>
                                </div>
                            </form>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.list-filter-->
                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                            <ul class="browse-list list-unstyled long-list">
                                <li><a href=""><strong>All Ads</strong> <span
                                                class="count">228,705</span></a></li>
                                <li><a href="">Business <span
                                                class="count">28,705</span></a></li>
                                <li><a href="">Personal <span
                                                class="count">18,705</span></a></li>
                            </ul>
                        </div>
                        <!--/.list-filter-->
                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                            <ul class="browse-list list-unstyled long-list">
                                <li><a href="">New <span class="count">228,705</span></a>
                                </li>
                                <li><a href="">Used <span class="count">28,705</span></a>
                                </li>
                                <li><a href="">None </a></li>
                            </ul>
                        </div>
                        <!--/.list-filter-->
                        <div style="clear:both"></div>
                    </div>

                    <!--/.categories-list-->
                </aside>
            </div>
            <!--/.page-side-bar-->
            <div class="col-md-9 page-content col-thin-left">

                <div class="category-list">
                    <div class="tab-box ">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs add-tabs" role="tablist">
                            <li class="active nav-item"><a href="#allAds" role="tab" data-toggle="tab" class="nav-link">All
                                    Ads <span class="badge badge-pill badge-secondary">228,705</span></a>
                            </li>
                        </ul>
                        <div class="tab-filter">
                            <select title="sort by" class="selectpicker select-sort-by" data-style="btn-select"
                                    data-width="auto">
                                <option>Sort by</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                            </select>
                        </div>

                    </div>
                    <!--/.tab-box-->
                    <!--/.tab-box-->

                    <div class="listing-filter">
                        <div class="pull-left col-xs-6">
                            <div class="breadcrumb-list"><a href="#" class="current"> <span>All Properties</span></a> in
                                <!-- cityName will replace with selected location/area from location modal -->
                                <span class="cityName"> Hà Nội </span> <a href="#selectRegion" id="dropdownMenu1"
                                                                          data-toggle="modal"> <span
                                            class="caret"></span> </a></div>
                        </div>
                        <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view active"><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view "><i class=" icon-th-large "></i></span></div>
                        <div style="clear:both"></div>
                    </div>
                    <!--/.listing-filter-->

                    <!-- Mobile Filter bar-->
                    <div class="mobile-filter-bar col-xl-12  ">
                        <ul class="list-unstyled list-inline no-margin no-padding">
                            <li class="filter-toggle">
                                <a class="">
                                    <i class="  icon-th-list"></i>
                                    Filters
                                </a>
                            </li>
                            <li>


                                <div class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle">Short
                                        by </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="" rel="nofollow">Relevance</a></li>
                                        <li><a href="" rel="nofollow">Date</a></li>
                                        <li><a href="" rel="nofollow">Company</a></li>
                                    </ul>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <div class="menu-overly-mask"></div>
                    <!-- Mobile Filter bar End-->


                    <div class="adds-wrapper property-list">
                        <div class="item-list">

                            <div class="row">


                                <div class="col-md-3 no-padding photobox">
                                    <div class="add-image"><span class="photo-count"><i
                                                    class="fa fa-camera"></i> 2 </span> <a href="property-details.html"><img
                                                    class="thumbnail no-margin"
                                                    src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/thumb/2.jpg') ?>"
                                                    alt="img"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-md-6 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="add-title"><a href="property-details.html">
                                                Exclusive and modern luxury apartment Union Avenue </a></h5>
                                        <span class="info-row"> <span class="item-location">544 Union Avenue, Brooklyn, NY 11211 |  <a><i
                                                            class="fa fa-map-marker"></i> Map</a>  </span> </span>
                                        <div class="prop-info-box">

                                            <div class="prop-info">
                                                <div class="clearfix prop-info-block">
                                                    <span class="title ">4+2</span>
                                                    <span class="text">Adults | Children</span>
                                                </div>
                                                <div class="clearfix prop-info-block middle">
                                                    <span class="title prop-area">171 m²</span>
                                                    <span class="text">Area (ca.)</span>
                                                </div>
                                                <div class="clearfix prop-info-block">
                                                    <span class="title prop-room">4</span>
                                                    <span class="text">room </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-md-3 text-right  price-box">


                                    <a class="btn btn-border-thin  btn-save" title="save ads" data-toggle="tooltip"
                                       data-placement="left">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                    <a class="btn btn-border-thin  btn-share ">
                                        <i class="icon icon-export" data-toggle="tooltip" data-placement="left"
                                           title="share"></i>
                                    </a>

                                    <h3 class="item-price "><strong>$2400 - $4260 </strong></h3>
                                    <div style="clear: both"></div>

                                    <a class="btn btn-success btn-sm bold" href="property-details.html">
                                        Check Availabilty
                                    </a>


                                </div>
                                <!--/.add-desc-box-->
                            </div>
                        </div>
                        <!--/.item-list-->

                        <div class="item-list">

                            <div class="row">
                                <div class="col-md-3 no-padding photobox">
                                    <div class="add-image">
                                        <div id="properites-image-slide" class="carousel slide" data-ride="carousel"
                                             data-interval="false">
                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                <div class="item active carousel-item">
                                                    <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/thumb/4.jpg') ?>"
                                                         alt="...">
                                                </div>
                                                <div class="item carousel-item">
                                                    <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/thumb/5.jpg') ?>"
                                                         alt="...">
                                                </div>
                                                <div class="item carousel-item">
                                                    <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/thumb/6.jpg') ?>"
                                                         alt="...">
                                                </div>
                                            </div>
                                            <!-- Controls -->

                                            <a class="left carousel-control" href="#properites-image-slide"
                                               role="button"
                                               data-slide="prev">

                                                <span class="icon icon-left-open-big icon-prev"
                                                      aria-hidden="true"></span>

                                                <span class="sr-only">Previous</span>

                                            </a>
                                            <a class="right carousel-control"
                                               href="#properites-image-slide" role="button" data-slide="next">

                                                <span class="icon icon-right-open-big icon-next"
                                                      aria-hidden="true"></span>

                                                <span class="sr-only">Next</span>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-md-6 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="add-title"><a href="property-details.html">
                                                Wow ! This item has a image slider ! </a></h5>
                                        <span class="info-row"> <span class="item-location">544 Union Avenue, Brooklyn, NY 11211 |  <a><i
                                                            class="fa fa-map-marker"></i> Map</a>  </span> </span>
                                        <div class="prop-info-box">

                                            <div class="prop-info">
                                                <div class="clearfix prop-info-block">
                                                    <span class="title ">4+2</span>
                                                    <span class="text">Adults | Children</span>
                                                </div>
                                                <div class="clearfix prop-info-block middle">
                                                    <span class="title prop-area">171 m²</span>
                                                    <span class="text">Area (ca.)</span>
                                                </div>
                                                <div class="clearfix prop-info-block">
                                                    <span class="title prop-room">4</span>
                                                    <span class="text">room </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-md-3 text-right  price-box">


                                    <a class="btn btn-border-thin  btn-save" title="save ads" data-toggle="tooltip"
                                       data-placement="left">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                    <a class="btn btn-border-thin  btn-share ">
                                        <i class="icon icon-export" data-toggle="tooltip" data-placement="left"
                                           title="share"></i>
                                    </a>

                                    <h3 class="item-price "><strong>$2400 - $4260 </strong></h3>
                                    <div style="clear: both"></div>

                                    <a class="btn btn-success btn-sm bold" href="property-details.html">
                                        Check Availabilty
                                    </a>


                                </div>
                                <!--/.add-desc-box-->
                            </div>
                        </div>
                        <!--/.item-list-->

                        <div class="item-list">
                            <div class="row">

                                <div class="col-md-3 no-padding photobox">
                                    <div class="add-image"><span class="photo-count"><i
                                                    class="fa fa-camera"></i> 4 </span> <a href="property-details.html"><img
                                                    class="thumbnail no-margin"
                                                    src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/thumb/9.jpg') ?>"
                                                    alt="img"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-md-6 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="add-title"><a href="property-details.html">
                                                Exclusive and modern luxury apartment Union Avenue </a></h5>
                                        <span class="info-row"> <span class="item-location">544 Union Avenue, Brooklyn, NY 11211 |  <a><i
                                                            class="fa fa-map-marker"></i> Map</a>  </span> </span>
                                        <div class="prop-info-box">

                                            <div class="prop-info">
                                                <div class="clearfix prop-info-block">
                                                    <span class="title ">4+2</span>
                                                    <span class="text">Adults | Children</span>
                                                </div>
                                                <div class="clearfix prop-info-block middle">
                                                    <span class="title prop-area">171 m²</span>
                                                    <span class="text">Area (ca.)</span>
                                                </div>
                                                <div class="clearfix prop-info-block">
                                                    <span class="title prop-room">4</span>
                                                    <span class="text">room </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-md-3 text-right  price-box">


                                    <a class="btn btn-border-thin  btn-save" title="save ads" data-toggle="tooltip"
                                       data-placement="left">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                    <a class="btn btn-border-thin  btn-share ">
                                        <i class="icon icon-export" data-toggle="tooltip" data-placement="left"
                                           title="share"></i>
                                    </a>

                                    <h3 class="item-price "><strong>$2400 - $4260 </strong></h3>
                                    <div style="clear: both"></div>

                                    <a class="btn btn-success btn-sm bold" href="property-details.html">
                                        Check Availabilty
                                    </a>


                                </div>
                                <!--/.add-desc-box-->
                            </div>
                        </div>
                        <!--/.item-list-->

                        <div class="item-list">

                            <div class="row">
                                <div class="col-md-3 no-padding photobox">
                                    <div class="add-image"><span class="photo-count"><i
                                                    class="fa fa-camera"></i> 3 </span> <a href="property-details.html"><img
                                                    class="thumbnail no-margin"
                                                    src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/house/thumb/13.jpg') ?>"
                                                    alt="img"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-md-6 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="add-title"><a href="property-details.html">
                                                Exclusive and modern luxury apartment Union Avenue </a></h5>
                                        <span class="info-row"> <span class="item-location">544 Union Avenue, Brooklyn, NY 11211 |  <a><i
                                                            class="fa fa-map-marker"></i> Map</a>  </span> </span>
                                        <div class="prop-info-box">

                                            <div class="prop-info">
                                                <div class="clearfix prop-info-block">
                                                    <span class="title ">4+2</span>
                                                    <span class="text">Adults | Children</span>
                                                </div>
                                                <div class="clearfix prop-info-block middle">
                                                    <span class="title prop-area">171 m²</span>
                                                    <span class="text">Area (ca.)</span>
                                                </div>
                                                <div class="clearfix prop-info-block">
                                                    <span class="title prop-room">4</span>
                                                    <span class="text">room </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-md-3 text-right  price-box">


                                    <a class="btn btn-border-thin  btn-save" title="save ads" data-toggle="tooltip"
                                       data-placement="left">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                    <a class="btn btn-border-thin  btn-share ">
                                        <i class="icon icon-export" data-toggle="tooltip" data-placement="left"
                                           title="share"></i>
                                    </a>

                                    <h3 class="item-price "><strong>$2400 - $4260 </strong></h3>
                                    <div style="clear: both"></div>

                                    <a class="btn btn-success btn-sm bold" href="property-details.html">
                                        Check Availabilty
                                    </a>


                                </div>
                                <!--/.add-desc-box-->
                            </div>
                        </div>
                        <!--/.item-list-->

                    </div>
                    <!--/.adds-wrapper-->

                    <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                            Save Search </a></div>
                </div>
                <div class="pagination-bar text-center">
                    <nav aria-label="Page navigation " class="d-inline-b">
                        <ul class="pagination">

                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--/.pagination-bar -->

                <div class="post-promo text-center">
                    <h2> Do you get anything for sell ? </h2>
                    <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                    <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                </div>
                <!--/.post-promo-->

            </div>
            <!--/.page-content-->

        </div>
    </div>
</div>
<!-- /.main-container -->

