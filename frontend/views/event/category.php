<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * Created by PhpStorm.
 * User: pxdung
 * Date: 9/14/2018
 * Time: 3:05 PM
 */
/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = Yii::t('ads', 'Events');
$imgUrl = baseUrl() . '/frontend/web/theme/images/house/1.jpg';
$bundle = AdsAsset::register($this);
?>
    <div class="search-row-wrapper events"
         style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/events/5-large_x2.jpg') ?>)">
        <div class="inner">
            <div class="container ">
                <form action="#" method="GET">
                    <div class="row">

                        <div class="col-md-3">
                            <input class="form-control keyword" type="text" placeholder="Events title">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control selecter" name="category" id="search-category">
                                <option selected="selected" value="">All Categories</option>
                                <option value="111">Accounting</option>
                                <option value="112">Administration &amp; Office Support</option>
                                <option value="113">Agriculture, Animals &amp; Conservation</option>
                                <option value="114">Architecture &amp; Design</option>
                                <option value="115">Banking &amp; Financial Services</option>
                                <option value="116">Communications, Advertising, Arts &amp; Media</option>

                                <option value="Other"> Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control selecter" name="location" id="id-location">
                                <option selected="selected" value="">All Locations</option>
                                <option value="New York"> New York</option>
                                <option value="South-West"> South West</option>
                                <option value="South-East"> South East</option>
                            </select></div>
                        <div class="col-md-3">
                            <button class="btn btn-block btn-primary  "><i class="fa fa-search"></i> Find Events
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar sidebar-modern">
                    <aside>
                        <div class="sidebar-modern-inner">
                            <div class="block-title sidebar-header">
                                <h5><a href="#">All Categories</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">

                                <ul class=" list-unstyled">
                                    <li><a href="sub-category-sub-location.html"><span
                                                    class="title">Sports</span><span class="count">&nbsp;8626</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html"><span
                                                    class="title">Fitness </span><span
                                                    class="count">&nbsp;123</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span
                                                    class="title">Photography </span><span
                                                    class="count">&nbsp;742</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span
                                                    class="title">Food & Drink </span><span
                                                    class="count">&nbsp;8525</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html"><span
                                                    class="title">For Sale </span><span
                                                    class="count">&nbsp;357</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html"><span
                                                    class="title">Music & Concert </span><span
                                                    class="count">&nbsp;3576</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Jobs </span><span
                                                    class="count">&nbsp;453</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span
                                                    class="title">Learning</span><span
                                                    class="count">&nbsp;801</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Other</span><span
                                                    class="count">&nbsp;9803</span></a></li>
                                </ul>
                            </div>    <!--/.categories-list-->

                            <div class="block-title ">
                                <h5><a href="#">Location</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">
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

                            <div class="block-title ">
                                <h5><a href="#">Price range</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">

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
                            <div class="block-title ">
                                <h5><a href="#">Posted By</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">
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
                            <div class="block-title ">
                                <h5><a href="#">Price</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="sub-category-sub-location.html">Paid <span class="count">228,705</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html">Free <span class="count">28,705</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html">All </a></li>
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
                    <div class="category-list event-category-list">

                        <div class="listing-filter listing-filter-event">
                            <div class="pull-left col-6 p-0">
                                <div class="breadcrumb-list"><a href="#" class="current"> <span>All ads</span></a>
                                    in

                                    <!-- cityName will replace with selected location/area from location modal -->
                                    <span class="cityName"> New York </span> <a href="#selectRegion" id="dropdownMenu1"
                                                                                data-toggle="modal"> <span
                                                class="caret"></span> </a></div>

                                <div class="btn-group col hidden-sm">
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

                            </div>
                            <div class="col-6 p-0 text-right listing-view-action hasEvent"><span
                                        class="e-list-view "><i class="  icon-th"></i></span> <span
                                        class="e-grid-view active"><i class=" icon-th-large "></i></span></div>
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
                                            <li class="dropdown-item"><a href="#" rel="nofollow">Relevance</a>
                                            </li>
                                            <li class="dropdown-item"><a href="#" rel="nofollow">Date</a>
                                            </li>
                                            <li class="dropdown-item"><a href="#" rel="nofollow">Company</a>
                                            </li>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->

                        <div class="adds-wrapper event-list">
                            <?php echo ListView::widget([
                                'dataProvider' => $dataProvider,
                                'options' => [
                                    'tag' => 'div',
                                    'class' => 'row',
                                    'id' => 'event-list'
                                ],
                                'itemView' => 'item/_item_event',
                                'itemOptions' => [
                                    'tag' => false,
                                ],
                                'layout' => "{items}",
                            ]);
                            ?>
                        </div>

                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center"></div>
                    </div>
                    <div class="pagination-bar text-center">
                        <nav aria-label="Page navigation " class="d-inline-b">
                            <?php
                            echo \frontend\widgets\LinkPager::widget([
                                'pagination' => $dataProvider->pagination,
                                'nextPageLabel' => 'Next'
                            ]);
                            ?>
                        </nav>
                    </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Do you get anything for sell ? </h2>
                        <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                        <a href="<?php echo Url::to(['/ads/create', 'type' => 'event']) ?>" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                    </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php
$app_css = <<<CSS
#event-list{
width: 100%;
}
CSS;

$this->registerCss($app_css);