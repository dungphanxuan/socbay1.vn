<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use frontend\assets\AdsAsset;
use common\assets\Loader;
use yii\widgets\Pjax;
use common\models\data\ArticleData;
use common\models\ArticleCategory;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $category_id */
/* @var $cid */

$this->title = 'Chuyên mục rao vặt';

if ($cid) {
    $modelCat = ArticleCategory::getDetail($category_id, true);
    $this->title = $modelCat['title'];
}
$bannerUrl = baseUrl() . '/frontend/web/images/banner/banner-ads.jpg';

$bundle = AdsAsset::register($this);
$totalAds = ArticleData::getTotal(1, $category_id);
?>
    <div class="search-row-wrapper" style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/bg.jpg') ?>)">
        <div class="container">
            <?php echo $this->render('_search', []); ?>
        </div>
    </div>
    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row" id="adsList">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                            <?php echo $this->render('partical/_left_sidebar', ['cid' => $cid, 'cat_id' => $category_id]) ?>
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
                        'id'       => 'allAds',
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
                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                                <div class="breadcrumb-list"><a href="#" class="current">
                                        <span><?php echo Yii::t('ads', 'All ads') ?></span></a> tại
                                    <!-- cityName will replace with selected location/area from location modal -->
                                    <span class="cityName"> Hà Nội </span>
                                    <a href="#selectRegion" id="dropdownMenu1" data-toggle="modal"> <span
                                                class="caret"></span> </a>
                                </div>
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
                                <li class="filter-toggle"><a class=""><i
                                                class="  icon-th-list"></i><?php echo Yii::t('ads', 'Filters') ?></a>
                                </li>
                                <li>

                                    <div class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> Sắp
                                            xếp </a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="" rel="nofollow">Mới nhất</a></li>
                                            <li class="dropdown-item"><a href="" rel="nofollow">Xem nhiều</a></li>
                                            <li class="dropdown-item"><a href="" rel="nofollow">Xu hướng</a></li>
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
                                'id'    => 'w5',
                                'class' => 'adds-wrapper',
                            ],
                            'itemOptions'  => [
                                'tag' => false,
                            ]
                        ]) ?>
                        <!--/.adds-wrapper-->


                        <div class="tab-box  save-search-bar text-center"><a
                                    href="<?php echo Url::to(['/account/saved']) ?>">
                                <i class=" icon-star-empty"></i><?php echo Yii::t('ads', 'Save Search') ?> </a>
                        </div>
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
                    <?php Pjax::end(); ?>

                    <!--/.pagination-bar -->
                    <?php echo $this->render('partical/_post_promo', []) ?>

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

$app_js = <<<JS
$(document).on('pjax:success', function () {
    var instance = $('.lazy').Lazy({chainable: false});
    var pjaxElements = $('#allAds .lazy');

    instance.addItems(pjaxElements);
    instance.update();
});

JS;

$this->registerJs($app_js);
