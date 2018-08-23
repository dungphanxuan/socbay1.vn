<?php

use frontend\assets\AdsAsset;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/29/2017
 * Time: 9:11 AM
 */
/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$bundle = AdsAsset::register($this);
\frontend\assets\BoxAsset::register($this);

$this->title = 'Category';
?>

<div class="main-container">
    <div class="container">
        <div class="row">
            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
            <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                <aside>
                    <div class="inner-box">
                        <?php echo $this->render('partical/_left_sidebar_mobile') ?>
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
                                <option>Sắp xếp bởi</option>
                                <option>Giá: Thấp tới cao</option>
                                <option>Giá: Cao tới thấp</option>
                            </select>
                        </div>

                    </div>
                    <!--/.tab-box-->
                    <div class="listing-filter">
                        <div class="pull-left col-xs-6">
                            <div class="breadcrumb-list"><a href="#" class="current"> <span>All ads</span></a> in
                                <!-- cityName will replace with selected location/area from location modal -->
                                <span class="cityName"> Hà Nội </span> <a href="#selectRegion" id="dropdownMenu1"
                                                                          data-toggle="modal"> <span
                                            class="caret"></span> </a></div>
                        </div>
                        <div class="pull-right col-xs-6 text-right listing-view-action">
                            <span class="list-view active"><i class="  icon-th"></i></span>
                            <span class="compact-view"><i class=" icon-th-list  "></i></span>
                            <span class="grid-view "><i class=" icon-th-large "></i></span>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <!--/.listing-filter-->

                    <!-- Mobile Filter bar-->
                    <div class="mobile-filter-bar col-xl-12  ">
                        <ul class="list-unstyled list-inline no-margin no-padding">
                            <li class="filter-toggle">
                                <a class="">
                                    <i class="  icon-th-list"></i>
                                    Lọc tìm kiếm
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

                    <?php echo \yii\widgets\ListView::widget([
                        'dataProvider' => $dataProvider,
                        //'summary'      => '',
                        'layout'       => '{items}',
                        'itemView'     => '_item',
                        'options'      => [
                            'tag'   => 'div',
                            'class' => 'adds-wrapper',
                        ],
                        'itemOptions'  => [
                            'tag' => false,
                        ]
                    ]) ?>
                    <!--/.adds-wrapper-->


                    <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                            Lưu tìm kiếm </a></div>
                </div>

                <div class="pagination-bar text-center">
                    <nav aria-label="Page navigation " class="d-inline-b">
                        <?php
                        echo \frontend\widgets\LinkPager::widget([
                            'pagination' => $dataProvider->pagination,
                        ]);
                        ?>
                    </nav>
                </div>
                <!--/.pagination-bar -->
                <?php echo $this->render('@frontend/views/ads/partical/_post_promo', []) ?>
                <!--/.post-promo-->

            </div>
            <!--/.page-content-->

        </div>
    </div>
</div>
<!-- /.main-container -->

