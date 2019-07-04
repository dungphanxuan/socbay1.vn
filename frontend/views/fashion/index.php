<?php


use frontend\assets\AdsAsset;
use common\models\data\ArticleData;
use frontend\assets\BoxAsset;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $category_id */

$this->title = 'Fashion';

$totalAds = ArticleData::getTotal(2, $category_id);
//$bannerUrl = 'https://dev.yiiframework.vn/classified/storage/web/source/2/012018/09kZVZRe3rx1YVfuqTH3wFq75DiUSUAy.png';
//$bannerUrl = 'https://dev.yiiframework.vn/classified/storage/web/source/2/012018/8gXvVRjY7huO8DtZf2S8hYok7ZwCGCTC.jpg';
$bannerUrl = 'https://d1l9wudzdx0jr.cloudfront.net/wp-content/uploads/2016/09/how-to-make-powerful-banner-ads.jpg';

$bundle = AdsAsset::register($this);
BoxAsset::register($this);
?>
<div class="search-row-wrapper">
    <div class="container ">
        <?php echo $this->render('_search', []); ?>

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
                        <?php echo $this->render('partical/_left_siderbar', ['cid' => $cid]) ?>
                    </div>
                    <!--/.categories-list-->
                </aside>
                <div class="banner-vertical">
                    <a href=""><img class="img-responsive" src="<?php echo $bannerUrl ?>" alt="banner"></a>
                </div>
            </div>
            <!--/.page-side-bar-->
            <div class="col-md-9 page-content col-thin-left">

                <div class="category-list">

                    <div class="tab-box ">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs add-tabs" role="tablist">
                            <li class="active nav-item"><a href="#allAds" role="tab" data-toggle="tab" class="nav-link">All
                                    Ads <span
                                            class="badge badge-pill badge-secondary"><?php echo $totalAds ?></span></a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo \frontend\widgets\SummaryWidget::widget(['dataProvider' => $dataProvider]) ?>
                        </div>
                    </div>
                    <!--BEGIN: CATEGORY PRODUCT-->
                    <?php echo \yii\widgets\ListView::widget([
                        'dataProvider' => $dataProvider,
                        //'summary'      => '',
                        'layout' => '{items}',
                        'itemView' => '_item',
                        'options' => [
                            'tag' => 'div',
                            'class' => 'category-product',
                        ],
                        'itemOptions' => [
                            'tag' => false,
                        ]
                    ]) ?>
                    <!--END: CATEGORY PRODUCT-->


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

                <?php echo $this->render('@frontend/views/ads/partical/_post_promo', ['type', 'property']) ?>
                <!--/.post-promo-->

            </div>
            <!--/.page-content-->

        </div>
    </div>
</div>
<!-- /.main-container -->
