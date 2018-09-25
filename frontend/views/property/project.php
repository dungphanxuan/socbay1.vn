<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/22/2017
 * Time: 3:13 PM
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
use common\models\property\Project;
use kartik\select2\Select2;
use common\models\property\ProjectCategory;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $activeIndex */
/* @var $modelCity \dungphanxuan\vnlocation\models\City */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title =  Yii::t('ads', 'Property project');
$imgUrl = baseUrl() . '/frontend/web/theme/images/house/1.jpg';

$updateData = false;
$cityCount = Project::getAllCityCount($updateData);

$cityList = Project::getCityList($updateData);
$catList = ProjectCategory::getCatSlug($updateData);

$this->registerCssFile("@web/frontend/web/theme/assets/css/box/style-page.css", [
    'depends' => [\frontend\assets\AdsAsset::class],
]);
?>

    <div class="search-row-wrapper">
        <div class="container ">
            <?php $form = ActiveForm::begin([
                'action' => ['/property/project'],
                'method' => 'get',
            ]); ?>
                <div class="row">
                    <div class="col-md-3">
                        <?php
                        echo Html::textInput('key', getParam('key'), ['class' => 'form-control keyword', 'placeholder' => 'Dự án ...'])
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo Html::dropDownList('category', getParam('category'), $catList, ['class' => 'form-control selecter', 'id' => 'id-location', 'prompt' => 'Loại hình bất động sản ...']);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo Html::dropDownList('location', getParam('location'), $cityList, ['class' => 'form-control selecter', 'id' => 'id-location', 'prompt' => 'Tỉnh/Thành Phố...']);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-block btn-primary  "><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
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
                            <?php echo $this->render('partical/_project_sidebar') ?>
                        </div>
                        <!--/.categories-list-->
                    </aside>
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
                                <li class="<?php echo $activeIndex == 1 ? 'active' : '' ?> nav-item"><a
                                            href="<?php echo Url::to(['/property/project']) ?>" class="nav-link"
                                            data-pjax="0">
                                        Dự án<span
                                                class="badge badge-pill badge-secondary"><?php echo isset($cityCount[0]) ? $cityCount[0] : 1500 ?></span></a>
                                </li>
                                <li class="nav-item <?php echo $activeIndex == 2 ? 'active' : '' ?>"><a
                                            href="<?php echo Url::to(['/property/project', 'name' => 'ha-noi', 'id' => 2]) ?>"
                                            class="nav-link" data-pjax="0">Hà Nội
                                        <span class="badge badge-pill badge-secondary"><?php echo isset($cityCount[2]) ? $cityCount[2] : 0 ?></span></a>
                                </li>
                                <li class="nav-item <?php echo $activeIndex == 3 ? 'active' : '' ?>"><a
                                            href="<?php echo Url::to(['/property/project', 'name' => 'ho-chi-minh', 'id' => 3]) ?>"
                                            class="nav-link" data-pjax="0">Hồ Chí Minh
                                        <span class="badge badge-pill badge-secondary"><?php echo isset($cityCount[3]) ? $cityCount[3] : 0 ?></span></a>
                                </li>
                                <li class="nav-item <?php echo $activeIndex == 4 ? 'active' : '' ?>"><a
                                            href="<?php echo Url::to(['/property/project', 'name' => 'da-nang', 'id' => 65]) ?>"
                                            class="nav-link" data-pjax="0">Đà Nẵng
                                        <span class="badge badge-pill badge-secondary"><?php echo isset($cityCount[65]) ? $cityCount[65] : 0 ?></span></a>
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
                                <div class="breadcrumb-list"><a href="#" class="current"> <span>All Projects</span></a>
                                    in
                                    <!-- cityName will replace with selected location/area from location modal -->
                                    <span class="cityName"> <?php echo $modelCity ? $modelCity->name : 'Hà Nội' ?> </span>
                                    <a
                                            href="#selectRegion" id="dropdownMenu1"
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
                        <div class="mobile-filter-bar col-xl-12">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="  icon-th-list"></i>
                                        Lọc dữ liệu
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


                        <div class="attachment" style="overflow:hidden;" id="allAds">

                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo \frontend\widgets\SummaryWidget::widget(['dataProvider' => $dataProvider]) ?>
                                </div>
                            </div>
                            <?php echo ListView::widget([
                                'dataProvider' => $dataProvider,
                                //'summary'      => '',
                                'layout'       => '{items}',
                                'itemView'     => '_item_project1',
                                'options'      => [
                                    'tag' => false
                                ],
                                'itemOptions'  => [
                                    'tag' => false,
                                ]
                            ]) ?>

                        </div>
                        <!--/.adds-wrapper-->

                        <br>

                        <div class="tab-box  save-search-bar text-center">
                            <a href="<?php echo Url::to(['/property/project']) ?>" data-pjax="0"> <i
                                        class=" icon-star-empty"></i>
                                <?php echo Yii::t('frontend', 'Save search') ?> </a>
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
                    <!--/.pagination-bar -->
                    <?php Pjax::end(); ?>
                    <?php echo $this->render('@frontend/views/ads/partical/_post_promo', []) ?>

                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php
$app_css = <<<CSS
.pList{
margin-top: 5px;
}
.colp7{
padding-left: 7px !important;
padding-right: 7px !important;
}
.pItem{
margin-bottom: 7px;
}
.pTitle{
padding-bottom: 0px !important;
}
CSS;

$this->registerCss($app_css);

$urlBuild = Url::to(['/property/project']);

$app_js = <<<JS
$(document).on('pjax:success', function () {
    var instance = $('.lazy').Lazy({chainable: false});
    var pjaxElements = $('#allAds .lazy');

    instance.addItems(pjaxElements);
    instance.update();
});

$(".emp-city").change(function () {
    console.log('Check');
    buildSPUrl();

});

$(".emp-price").change(function () {
    console.log('Price Check');
    buildSPUrl();
});

$(".emp-area").change(function () {
    console.log('Area Check');
    buildSPUrl();
});

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

function getPriceValue() {
    var selected = [];
    $('#pprice input:checked').each(function () {
        selected.push($(this).attr('value'));
    });

    return selected;
}

function getAreaValue() {
    var selected = [];
    $('#parea input:checked').each(function () {
        selected.push($(this).attr('value'));
    });

    return selected;
}

/*Build Property Search Url*/
function buildSPUrl() {
    var arrCity = getCityValue();
    var arrPrice = getPriceValue();
    var arrArea = getAreaValue();
    
    urlReload = '$urlBuild' + '&city=' + arrCity.join() + '&price=' + arrPrice.join()+ '&area=' + arrArea.join() +'&stype=2';
    $.pjax.reload({container: "#all-ads", url: urlReload, scrollTo:  $('#dataContent').offset().top - 80});
    return true;
}
JS;

$this->registerJs($app_js);