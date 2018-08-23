<?php

use yii\widgets\Pjax;
use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\widgets\ListView;
use common\models\data\ArticleData;
use frontend\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $catModel \common\models\ArticleCategory */
/* @var $category_id */

$this->title = 'Bất động sản';

$totalAds = ArticleData::getTotal(2, $category_id);

$bannerUrl = 'https://d1l9wudzdx0jr.cloudfront.net/wp-content/uploads/2016/09/how-to-make-powerful-banner-ads.jpg';

$bundle = AdsAsset::register($this);
?>
    <!-- /.header -->
    <div class="search-row-wrapper">
        <div class="container ">
            <?php echo $this->render('partical/_form_search_property', ['searchModel' => $searchModel]) ?>
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
                            <?php echo $this->render('partical/_property_sidebar') ?>
                        </div>

                        <!--/.categories-list-->
                    </aside>

                    <div class="banner-vertical">
                        <a href=""><img class="img-responsive" src="<?php echo $bannerUrl ?>" alt="banner"></a>
                    </div>
                </div>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-left">

                    <?php Pjax::begin([
                        'id'       => 'all-ads',
                        'timeout'  => 2000,
                        'scrollTo' => 0
                    ]) ?>

                    <div class="category-list">
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" role="tablist">
                                <li class="active nav-item"><a href="#allAds" role="tab" data-toggle="tab"
                                                               class="nav-link"><?php echo Yii::t('ads', 'All Ads') ?>
                                        <span
                                                class="badge badge-pill badge-secondary"><?php echo $totalAds ?></span></a>
                                </li>
                                <li class="nav-item"><a href="<?php echo Url::to(['/ads/index']) ?>"
                                                        class="nav-link"><?php echo Yii::t('ads', 'For sell') ?>
                                        <span class="badge badge-pill badge-secondary">228</span></a>
                                </li>
                                <li class="nav-item"><a href="<?php echo Url::to(['/ads/index']) ?>"
                                                        class="nav-link"><?php echo Yii::t('ads', 'For rent') ?>
                                        <span class="badge badge-pill badge-secondary">228</span></a>
                                </li>
                            </ul>
                            <div class="tab-filter">
                                <select title="sort by" class="selectpicker select-sort-by" data-style="btn-select"
                                        data-width="auto">
                                    <option><?php echo Yii::t('ads', 'Sort by') ?></option>
                                    <option><?php echo Yii::t('ads', 'Price') ?>
                                        : <?php echo Yii::t('ads', 'Low to High') ?></option>
                                    <option><?php echo Yii::t('ads', 'Price') ?>
                                        : <?php echo Yii::t('ads', 'High to Low') ?></option>
                                </select>
                            </div>

                        </div>
                        <!--/.tab-box-->
                        <!--/.tab-box-->

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                                <div class="breadcrumb-list"><a href="#" class="current">
                                        <span><?php echo Yii::t('ads', 'All Properties') ?></span></a> in
                                    <!-- cityName will replace with selected location/area from location modal -->
                                    <span class="cityName"> Hà Nội </span> <a href="#selectRegion" id="dropdownMenu1"
                                                                              data-toggle="modal"> <span
                                                class="caret"></span> </a></div>
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                        class="list-view active"><i
                                            class="  icon-th"></i></span> <span class="compact-view"><i
                                            class=" icon-th-list  "></i></span> <span class="grid-view"><i
                                            class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->

                        <!-- Mobile Filter bar-->
                        <div class="mobile-filter-bar col-xl-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class=""><i class="  icon-th-list"></i><?php echo Yii::t('ads', 'Filter') ?></a>
                                </li>
                                <li>

                                    <div class="dropdown">
                                        <a data-toggle="dropdown"
                                           class="dropdown-toggle"><?php echo Yii::t('ads', 'Short by') ?> </a>
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

                        <?php echo ListView::widget([
                            'dataProvider' => $dataProvider,
                            //'summary'      => '',
                            'layout'       => '{summary}{items}',
                            'itemView'     => '_item',
                            'options'      => [
                                'tag'   => 'div',
                                'class' => 'adds-wrapper property-list',
                            ],
                            'itemOptions'  => [
                                'tag' => false,
                            ]
                        ]) ?>
                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-star-empty"></i>
                                <?php echo Yii::t('ads', 'Save Search ') ?> </a></div>
                    </div>
                    <div class="pagination-bar text-center">
                        <nav aria-label="Page navigation " class="d-inline-b">
                            <?php
                            echo LinkPager::widget([
                                'pagination' => $dataProvider->pagination,
                            ]);
                            ?>
                        </nav>
                    </div>
                    <!--/.pagination-bar -->
                    <?php Pjax::end(); ?>
                    <?php echo $this->render('@frontend/views/ads/partical/_post_promo', ['type', 'property']) ?>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php
$app_css = <<<CSS
.banner-vertical {
    position: sticky;
    top: 10px;
    z-index: 9;
    transition: all 0.3s ease 0s;
}

.banner-vertical.margin-top {
    top: 90px;
}

CSS;
$this->registerCss($app_css);

$urlBuild = Url::to(['/ads/index', 'cslug' => $catModel->slug, 'page' => 2]);
$urlBuild1 = Url::to(['/ads/index', 'cslug' => $catModel->slug, 'page' => 1]);

$app_js = <<<JS
console.log('Check');
$(document).on('pjax:success', function () {
    var instance = $('.lazy').Lazy({chainable: false});
    var pjaxElements = $('#all-ads .lazy');

    instance.addItems(pjaxElements);
    instance.update();
});

$(".emp-city").change(function () {
    console.log('Check');
    var arrCity = getCityValue();
    urlReload = '$urlBuild1' + '&city=' + arrCity.join();
    
    console.log(urlReload);
   $.pjax.reload({container: "#all-ads", url: urlReload, scrollTo: 0});

});

$(".emp-area").change(function () {
    console.log('Check');
    $.pjax.reload({container: "#all-ads", url: "$urlBuild1", scrollTo: 0});
});

$("#bt1").click(function () {
    var a = getCheckedType();
    console.log(a);
});

/*setTimeout(function() {
    console.log('Start');
    
    $.pjax.reload({container: "#all-ads", url: "$urlBuild",scrollTo: 0});
}, 2000);*/

function getCheckedType() {
    var selected = [];
    $('#ptype input:checked').each(function () {
        selected.push($(this).attr('value'));
    });
}

function getCityValue() {
    var selected = [];
    $('#pcity input:checked').each(function () {
        selected.push($(this).attr('value'));
    });

    return selected;
}

JS;

$this->registerJs($app_js);
