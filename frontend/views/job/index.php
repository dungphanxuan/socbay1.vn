<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $modelJobCat \common\models\ArticleCategory */
/* @var $dataJobProvider \yii\data\ActiveDataProvider */
/* @var $dataCompanyProvider \yii\data\ActiveDataProvider */
/* @var $providerJobCat \yii\data\ArrayDataProvider */

$this->title = 'Tìm kiếm Việc làm';
//\frontend\assets\AutoComplete::register($this);
$jobCat = \common\models\ArticleCategory::getDetail(null, false, \common\dictionaries\AdsType::JOB);

$jobAction = Url::to(['/ads/index', 'cslug' => $jobCat['slug']]);
$bundle = AdsAsset::register($this);
//Seo tag

?>
    <div class="intro jobs-intro hasOverly"
         style="background-image: url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/jobs/1.jpg') ?>); background-position: center center;">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center" style="max-width: 950px">
                    <h1 class="intro-title animated"> Tìm kiếm việc làm </h1>

                    <p class="sub animateme fittext3 animated"> <?php echo Yii::t('frontend', 'Find the latest jobs available in your area') ?>
                        . </p>
                    <form action="<?php echo $jobAction ?>">
                        <div class="row search-row">

                            <div class="col-xl-3 col-sm-3 search-col relative locationicon">
                                <div class="search-col-inner">
                                    <i class="icon-location-2 icon-append"></i>
                                    <div class="search-col-input">
                                        <input type="text" name="country" id="autocomplete-ajax"
                                               class="form-control locinput input-rel searchtag-input has-icon"
                                               placeholder="Tỉnh/Thành phố" value="">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-3 col-sm-3 search-col relative">
                                <div class="search-col-inner">
                                    <i class="icon-docs icon-append"></i>
                                    <div class="search-col-input">
                                        <input type="text" name="ads" class="form-control has-icon"
                                               placeholder="Danh mục" value=""></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-3 search-col relative">
                                <div class="search-col-inner">
                                    <i class="icon-search icon-append"></i>
                                    <div class="search-col-input">
                                        <input type="text" name="ads" class="form-control has-icon"
                                               placeholder="từ khóa" value=""></div>
                                </div>

                            </div>
                            <div class="col-xl-3 col-sm-3 search-col">
                                <button class="btn btn-primary btn-search btn-block  btn-gradient"><i class="icon-search"></i><strong>
                                        Tìm kiếm</strong></button>
                            </div>

                        </div>
                    </form>

                    <div class="resume-up">
                        <a><i class="icon-doc-4"></i></a> <a href="<?php echo Url::to(['/job/add-cv']) ?>"><b>Tải lên CV
                            </b></a> dễ dàng ứng tuyển công việc của bạn.
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.intro -->

    <div class="main-container">
        <div class="container">


            <div class="col-xl-12 content-box ">
                <div class="row row-featured row-featured-category row-featured-company">
                    <div class="col-xl-12  box-title ">
                        <div class="inner"><h2><span>Công ty</span>
                                Nổi bật <a class="sell-your-item" href="<?php echo Url::to(['/job/company']) ?>"> Xem
                                    thêm công
                                    ty <i
                                            class="  icon-th-list"></i> </a></h2>
                        </div>
                    </div>

                    <?php echo ListView::widget([
                        'dataProvider' => $dataCompanyProvider,
                        'layout' => '{items}',
                        'itemView' => '_item_company',
                        'options' => [
                            'tag' => false,
                        ],
                        'itemOptions' => [
                            'tag' => false,
                        ]
                    ]) ?>
                </div>
            </div>

            <div style="clear: both"></div>

            <div class="row">


                <div class="col-md-9 page-content col-thin-right">
                    <div class="content-box col-xl-12">
                        <div class="row row-featured row-featured-category">
                            <div class="col-xl-12  box-title no-border">
                                <div class="inner"><h2><span>Việc làm</span>
                                        Mới nhất <a
                                                href="<?php echo Url::to(['/ads/index', 'cslug' => $modelJobCat->slug]) ?>"
                                                class="sell-your-item"> Xem
                                            thêm <i
                                                    class="  icon-th-list"></i> </a></h2>
                                </div>
                            </div>

                            <div class="adds-wrapper jobs-list">
                                <?php echo ListView::widget([
                                    'dataProvider' => $dataJobProvider,
                                    'options' => [
                                        'tag' => false,
                                    ],
                                    'itemView' => '_item',
                                    'itemOptions' => [
                                        'tag' => false,
                                    ],
                                    'layout' => "{items}",
                                ]);
                                ?>
                            </div>

                            <div class="tab-box  save-search-bar text-center"><a class="text-uppercase"
                                                                                 href="<?php echo Url::to(['/ads/index', 'cslug' => $modelJobCat->slug]) ?>">
                                    <i
                                            class=" icon-briefcase "></i> <?php echo Yii::t('frontend', 'View all jobs') ?>
                                </a></div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box no-padding">
                            <div class="inner-box-content">
                                <a href="#">
                                    <img class="img-responsive lazy" src=""
                                         data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/app.jpg') ?>"
                                         alt="tv"></a>
                            </div>
                        </div>
                        <div class="inner-box">
                            <h2 class="title-2">Việc làm theo chuyên môn </h2>

                            <div class="inner-box-content">
                                <ul class="cat-list arrow">
                                    <?php echo ListView::widget([
                                        'dataProvider' => $providerJobCat,
                                        'layout' => '{items}',
                                        'itemView' => 'item/_item_job_cat_sidebar',
                                        'options' => [
                                            'tag' => false,
                                        ],
                                        'itemOptions' => [
                                            'tag' => false,
                                        ]
                                    ]) ?>
                                </ul>
                            </div>
                        </div>

                        <div class="inner-box no-padding">
                            <img class="img-responsive"
                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/add2.jpg') ?>"
                                 alt="">
                        </div>
                    </aside>
                </div>
            </div>

            <div style="clear: both"></div>
            <div class="col-xl-12 content-box ">
                <div class="row row-featured">

                    <div style="clear: both"></div>

                    <div class=" relative w100 content  clearfix">

                        <div class="tab-lite w100">

                            <!-- Nav tabs -->
                            <ul role="tablist" class="nav nav-tabs ">
                                <li class="active nav-item" role="presentation"><a data-toggle="tab" role="tab"
                                                                                   aria-controls="tab1" href="#tab1"
                                                                                   aria-expanded="true"
                                                                                   class="nav-link"><i
                                                class="icon-location-2"></i>Việc làm theo vị trí</a>
                                </li>
                                <li role="presentation" class="nav-item"><a data-toggle="tab" role="tab"
                                                                            aria-controls="tab2" href="#tab2"
                                                                            aria-expanded="false"
                                                                            class="nav-link"><i
                                                class="icon-briefcase"></i>Việc làm theo chuyên môn</a>
                                </li>
                                <li role="presentation" class="nav-item"><a data-toggle="tab" role="tab"
                                                                            aria-controls="tab3" href="#tab3"
                                                                            aria-expanded="false"
                                                                            class="nav-link"><i
                                                class="icon-commerical-building"></i>Việc làm theo công ty</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab1">
                                    <div class="col-xl-12 tab-inner">
                                        <div class="row">
                                            <?php echo $this->render('partical/_top_location', []); ?>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab2">
                                    <div class="col-xl-12 tab-inner">
                                        <div class="row">
                                            <?php echo $this->render('partical/_top_specialism', []); ?>
                                        </div>
                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab3">

                                    <div class="col-xl-12 tab-inner">
                                        <div class="row">
                                            <?php echo $this->render('partical/_top_company', []); ?>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /.main-container -->

<?php echo $this->render('partical/_page_bottom', []); ?>


<?php
$app_css = <<<CSS
.tab-lite .nav-tabs > li.active > a {
    font-weight: bold;
}
CSS;

$this->registerCss($app_css);

$app_js = <<<JS

JS;

$this->registerJs($app_js);
