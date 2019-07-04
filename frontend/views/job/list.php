<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\data\LocationData;
use common\models\job\JobCategory;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $catModel \common\models\ArticleCategory */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $providerJobCat \yii\data\ArrayDataProvider */

$bundle = AdsAsset::register($this);
$jobCategories = \common\models\job\JobCategory::getAllArray();
$jobLocation = LocationData::getList();
$getTitle = getParam('title', null);
$getLocationCity = getParam('location', null);

$cityId = 0;
$categoryId = 0;
if ($getLocationCity) {
    /** @var \dungphanxuan\vnlocation\models\City $cityModel */
    $cityModel = LocationData::getCity($getLocationCity, 2);
    if ($cityModel) {
        $cityId = $cityModel['slug'];
    }
}

$catSearchValue = null;
$catJobName = null;
$getCategorySearch = getParam('jcategory', null);
if ($getCategorySearch) {
    /** @var JobCategory $catData */
    $catData = JobCategory::find()->where(['id' => $getCategorySearch])->one();
    if ($catData) {
        $catSearchValue = $catData->id;
        $catJobName = $catData->title;
    }
}

$this->title = 'Việc làm mới nhất';
?>
    <!-- /.header -->
    <div class="search-row-wrapper">
        <div class="container ">
            <form action="<?php echo Url::to(['/ads/index', 'cslug' => $catModel->slug]) ?>" method="GET">
                <div class="row">

                    <div class="col-md-3">
                        <?php
                        echo Html::textInput('title', $getTitle, ['class' => 'form-control keyword', 'placeholder' => 'Tiêu đề, từ khóa ...'])
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo Html::dropDownList('jcategory', $catSearchValue, $jobCategories, ['class' => 'form-control selecter', 'id' => 'job_search-category', 'prompt' => 'Danh mục ...'])
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo Html::dropDownList('location', $cityId, $jobLocation, ['class' => 'form-control selecter', 'id' => 'job_search-location', 'prompt' => 'Tỉnh/Thành Phố'])
                        ?>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-block btn-primary">
                            <i class="fa fa-search"></i> <?php echo Yii::t('ads', 'Find Jobs') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row" id="dataContent">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                            <?php echo $this->render('partical/_left_sidebar', ['providerJobCat' => $providerJobCat]) ?>
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-left">
                    <?php Pjax::begin([
                        'id' => 'all-ads',
                        'timeout' => 2000,
                        'scrollTo' => 0
                    ]) ?>
                    <div class="category-list">
                        <div class="tab-box clearfix">

                            <!-- Nav tabs -->
                            <div class="col-xl-12  box-title no-border">
                                <div class="inner">
                                    <h2> <?php echo $catJobName ? $catJobName : 'Việc làm' ?>
                                        <small> <?php echo $dataProvider->getTotalCount() ?>+ Việc làm được tìm thấy
                                        </small>


                                    </h2>
                                </div>
                            </div>

                            <!-- Mobile Filter bar -->
                            <div class="mobile-filter-bar col-xl-12  ">
                                <ul class="list-unstyled list-inline no-margin no-padding">
                                    <li class="filter-toggle">
                                        <a class="">
                                            <i class="  icon-th-list"></i>
                                            Lọc tìm kiếm
                                        </a>
                                    </li>
                                    <li>

                                        <div class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle">
                                                Sắp xếp bởi </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="" rel="nofollow">Việc liên quan</a></li>
                                                <li><a href="" rel="nofollow">Ngày</a></li>
                                                <li><a href="" rel="nofollow">Cùng công ty</a></li>
                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <div class="menu-overly-mask"></div>
                            <!-- Mobile Filter bar End-->


                            <div class="tab-filter hide-xs">

                                <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto">
                                    <option value="Sort by ">Sắp xếp bởi</option>
                                    <option value="Relevance">Việc liên quan</option>
                                    <option value="Company">Cùng công ty</option>
                                </select>
                            </div>
                            <!--/.tab-filter-->

                        </div>
                        <!--/.tab-box-->

                        <div class="listing-filter hidden-xs">
                            <div class="pull-left col-sm-6 col-xs-12">
                                <div class="breadcrumb-list text-center-xs">
                                    <a class="jobs-s-tag" rel="nofollow" title="Software Architect"> Việc
                                        làm <?php echo $catJobName ? $catJobName : '' ?> </a>
                                    tại <a rel="nofollow" class="jobs-s-tag"> Hà Nội</a></div>
                            </div>
                            <div class="pull-right col-sm-6 col-xs-12 text-right text-center-xs listing-view-action">
                                <a class="clear-all-button text-muted"><?php echo Yii::t('ads', 'Clear all') ?></a>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->

                        <?php echo \yii\widgets\ListView::widget([
                            'dataProvider' => $dataProvider,
                            //'summary'      => '',
                            'layout' => '{summary}{items}',
                            'itemView' => '_item',
                            'options' => [
                                'tag' => 'div',
                                'class' => 'adds-wrapper jobs-list',
                            ],
                            'itemOptions' => [
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
                    <?php Pjax::end(); ?>
                    <div class="post-promo text-center">
                        <h2> <?php echo Yii::t('ads', 'Looking for a job?') ?> </h2>
                        <h5> <?php echo Yii::t('ads', 'Upload your CV and easily apply to jobs from any device!') ?> </h5>
                        <a href="<?php echo Url::to(['/job/add-cv']) ?>"
                           class="btn btn-lg btn-border btn-post btn-danger"><?php echo Yii::t('ads', 'Upload your CV') ?> </a>
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
$urlBuild = Url::to(['/ads/index', 'cslug' => $catModel->slug]);

$app_js = <<<JS
$(document).on('pjax:success', function () {
    var instance = $('.lazy').Lazy({chainable: false});
    var pjaxElements = $('#all-ads .lazy');

    instance.addItems(pjaxElements);
    instance.update();
});
//Pjax Search Filter
$(".emp-city").change(function () {
    console.log('Check');
    var arrCity = getCityValue();
    urlReload = '$urlBuild' + '&city=' + arrCity.join();
    
    console.log(urlReload);
    $.pjax.reload({container: "#all-ads", url: urlReload, scrollTo: 0});

});

$(".emp-type").change(function () {
    console.log('Check');
    buildSPUrl();

});


$(".emp-price").change(function () {
    console.log('Price Check');
    buildSPUrl();
});

$(".emp-city").change(function () {
    console.log('Check');
    buildSPUrl();

});

function getTypeValue() {
    var selected = [];
    $('#pjType input:checked').each(function () {
        selected.push($(this).attr('value'));
    });

    return selected;
}

function getPriceValue() {
    var selected = [];
    $('#pprice input:checked').each(function () {
        selected.push($(this).attr('value'));
    });

    return selected;
}

function getCityValue() {
    var selected = [];
    $('#pcity input:checked').each(function () {
        selected.push($(this).attr('value'));
    });

    return selected;
}


/*Build Job Search Url*/
function buildSPUrl() {
    var arrType = getTypeValue();
    var arrCity = getCityValue();
    
    urlReload = '$urlBuild' + '?type=' + arrType.join() + '&price=' + arrCity.join();
    $.pjax.reload({container: "#all-ads", url: urlReload, scrollTo:  $('#dataContent').offset().top - 80});
    return true;
}
JS;

$this->registerJs($app_js);

