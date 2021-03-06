<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/25/2017
 * Time: 1:55 PM
 */
?>

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
                                <li><a href="sub-category-sub-location.html"><span
                                                class="title">Electronics</span><span
                                                class="count">&nbsp;8626</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html"><span
                                                class="title">Automobiles </span><span
                                                class="count">&nbsp;123</span></a></li>
                                <li><a href="sub-category-sub-location.html"><span
                                                class="title">Property </span><span class="count">&nbsp;742</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html"><span
                                                class="title">Services </span><span class="count">&nbsp;8525</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html"><span
                                                class="title">For Sale </span><span class="count">&nbsp;357</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html"><span
                                                class="title">Learning </span><span class="count">&nbsp;3576</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html"><span class="title">Jobs </span><span
                                                class="count">&nbsp;453</span></a></li>
                                <li><a href="sub-category-sub-location.html"><span
                                                class="title">Cars & Vehicles</span><span class="count">&nbsp;801</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html"><span class="title">Other</span><span
                                                class="count">&nbsp;9803</span></a></li>
                            </ul>
                        </div>
                        <!--/.categories-list-->

                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                            <ul class="browse-list list-unstyled long-list">
                                <li><a href="sub-category-sub-location.html"> Atlanta </a></li>
                                <li><a href="sub-category-sub-location.html"> Wichita </a></li>
                                <li><a href="sub-category-sub-location.html"> Anchorage </a></li>
                                <li><a href="sub-category-sub-location.html"> Dallas </a></li>
                                <li><a href="sub-category-sub-location.html">New York </a></li>
                                <li><a href="sub-category-sub-location.html"> Santa Ana/Anaheim </a></li>
                                <li><a href="sub-category-sub-location.html"> Miami </a></li>
                                <li><a href="sub-category-sub-location.html"> Virginia Beach </a></li>
                                <li><a href="sub-category-sub-location.html"> San Diego </a></li>
                                <li><a href="sub-category-sub-location.html"> Boston </a></li>
                                <li><a href="sub-category-sub-location.html"> Houston </a></li>
                                <li><a href="sub-category-sub-location.html">Salt Lake City </a></li>
                                <li><a href="sub-category-sub-location.html"> Other Locations </a></li>
                            </ul>
                        </div>
                        <!--/.locations-list-->

                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                            <form role="form" class="form-inline ">


                                <div class="form-group col-md-4 no-padding">
                                    <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                                </div>
                                <div class="form-group col-md-1 no-padding text-center ">-</div>
                                <div class="form-group col-md-4 no-padding">
                                    <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                                </div>
                                <div class="form-group col-md-3 no-padding">
                                    <button class="btn btn-secondary float-right btn-block-sm" type="submit">GO</button>
                                </div>
                            </form>

                            <div style="clear:both"></div>
                        </div>
                        <!--/.list-filter-->
                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                            <ul class="browse-list list-unstyled long-list">
                                <li><a href="sub-category-sub-location.html"><strong>All Ads</strong> <span
                                                class="count">228,705</span></a></li>
                                <li><a href="sub-category-sub-location.html">Business <span
                                                class="count">28,705</span></a></li>
                                <li><a href="sub-category-sub-location.html">Personal <span
                                                class="count">18,705</span></a></li>
                            </ul>
                        </div>
                        <!--/.list-filter-->
                        <div class="locations-list  list-filter">
                            <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                            <ul class="browse-list list-unstyled long-list">
                                <li><a href="sub-category-sub-location.html">New <span class="count">228,705</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html">Used <span class="count">28,705</span></a>
                                </li>
                                <li><a href="sub-category-sub-location.html">None </a></li>
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
                    <div class="listing-filter">
                        <div class="pull-left col-xs-6">
                            <div class="breadcrumb-list"><a href="#" class="current"> <span>All ads</span></a> in
                                <!-- cityName will replace with selected location/area from location modal -->
                                <span class="cityName"> New York </span> <a href="#selectRegion" id="dropdownMenu1"
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


                                <div class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> Short

                                        by </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a href="" rel="nofollow">Relevance</a>
                                        </li>
                                        <li class="dropdown-item"><a href="" rel="nofollow">Date</a>
                                        </li>
                                        <li class="dropdown-item"><a href="" rel="nofollow">Company</a>
                                        </li>
                                    </ul>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <div class="menu-overly-mask"></div>
                    <!-- Mobile Filter bar End-->

                    <div class="attachment">
                        <!--BEGIN: ITEM LIST-->
                        <div class="item-list">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img class="img-responsive" src="images/thumb-attach1.png" alt="product"
                                             width="230px">
                                    </div>
                                </div>
                                <div class="col-md-5 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="att-title">
                                            <a href="#">3 BHK Apartments</a></h5>
                                        <div class="att-user">
                                            <p>By Ashiana Housing</p>
                                        </div>
                                        <div class="att-detail">
                                            <p>
                                                <span>Details:</span>
                                                <span>5.56k / sq.ft.</span>
                                            </p>
                                            <p>
                                                <span>Status:</span>
                                                <span>Unfurnished, Immediately Available</span>
                                            </p>
                                        </div>
                                        <!--End: att detail-->
                                        <div class="att-icon">
                                            <p class="bed">3 Bed</p>
                                            <p class="bath">3 Bath</p>
                                            <p class="parking">2 Parking</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="att-price">
                                        <p>25.99$ AUD - 33.93$ AUD</p>
                                        <p class="text">EMI starts at $23k</p>
                                    </div>
                                    <div class="icon-button">
                                        <a href="#" class="link-heart"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="link-contact">Contact</a>
                                    </div>
                                    <!--End: Icon Button-->
                                </div>
                            </div>
                        </div>
                        <!--END: ITEM LIST-->
                        <div class="item-list">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img class="img-responsive" src="images/thumb-attach2.png" alt="product"
                                             width="230px">
                                    </div>
                                </div>
                                <div class="col-md-5 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="att-title">
                                            <a href="#">3 BHK Apartments</a></h5>
                                        <div class="att-user">
                                            <p>By Ashiana Housing</p>
                                        </div>
                                        <div class="att-detail">
                                            <p>
                                                <span>Details:</span>
                                                <span>5.56k / sq.ft.</span>
                                            </p>
                                            <p>
                                                <span>Status:</span>
                                                <span>Unfurnished, Immediately Available</span>
                                            </p>
                                        </div>
                                        <!--End: att detail-->
                                        <div class="att-icon">
                                            <p class="bed">3 Bed</p>
                                            <p class="bath">3 Bath</p>
                                            <p class="parking">2 Parking</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="att-price">
                                        <p>25.99$ AUD - 33.93$ AUD</p>
                                        <p class="text">EMI starts at $23k</p>
                                    </div>
                                    <div class="icon-button">
                                        <a href="#" class="link-heart"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="link-contact">Contact</a>
                                    </div>
                                    <!--End: Icon Button-->
                                </div>
                            </div>
                        </div>
                        <!--END: ITEM LIST-->
                        <div class="item-list">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img class="img-responsive" src="images/thumb-attach3.png" alt="product"
                                             width="230px">
                                    </div>
                                </div>
                                <div class="col-md-5 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="att-title">
                                            <a href="#">3 BHK Apartments</a></h5>
                                        <div class="att-user">
                                            <p>By Ashiana Housing</p>
                                        </div>
                                        <div class="att-detail">
                                            <p>
                                                <span>Details:</span>
                                                <span>5.56k / sq.ft.</span>
                                            </p>
                                            <p>
                                                <span>Status:</span>
                                                <span>Unfurnished, Immediately Available</span>
                                            </p>
                                        </div>
                                        <!--End: att detail-->
                                        <div class="att-icon">
                                            <p class="bed">3 Bed</p>
                                            <p class="bath">3 Bath</p>
                                            <p class="parking">2 Parking</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="att-price">
                                        <p>25.99$ AUD - 33.93$ AUD</p>
                                        <p class="text">EMI starts at $23k</p>
                                    </div>
                                    <div class="icon-button">
                                        <a href="#" class="link-heart"><i class="fa fa-heart-o"></i></a>
                                        <a href="#" class="link-contact">Contact</a>
                                    </div>
                                    <!--End: Icon Button-->
                                </div>
                            </div>
                        </div>
                        <!--END: ITEM LIST-->
                    </div>
                    <!--/.adds-wrapper-->
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

            </div>
            <!--/.page-content-->

        </div>
    </div>
</div>
<!-- /.main-container -->


