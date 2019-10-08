<?php

use common\helpers\ArticleHelper;
use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use frontend\widgets\Star;
use common\assets\PhotoSwipeAssets;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $catModel \common\models\ArticleCategory */

$this->title = $model->title;

$bundle = AdsAsset::register($this);
PhotoSwipeAssets::register($this);
$articleDetail = ArticleHelper::getDetail($model->id, true);
$sellerInfo = $articleDetail['seller_user'];

//dd($articleDetail);

$imagesAttactment = $articleDetail['attachments'];

$defaultAvatar = baseUrl() . '/frontend/web/images/avatar.png';
$imgBgBox = baseUrl() . '/frontend/web/images/bg/viewBox1.jpg';
$imgBg = baseUrl() . '/frontend/web/images/bg/bgavatar.jpg';

//dd($imagesAttactment);
//$this->registerJsFile('http://code.jquery.com/jquery.js')

// OpenGraph metatags
$urlCard = $model->getCardThumbnail();
$this->registerMetaTag(['property' => 'og:title', 'content' => Html::encode($model->title)]);
$this->registerMetaTag(['property' => 'og:type', 'content' => 'article']);
$this->registerMetaTag(['property' => 'og:site_name', 'content' => 'Rao vặt số 1 Socbay']);
$this->registerMetaTag(['property' => 'og:image', 'content' => $urlCard]);
$this->registerMetaTag(['property' => 'og:url', 'content' => Url::current([], true)]);
$this->registerMetaTag(['property' => 'og:description', 'content' => '']);
$this->registerMetaTag(['property' => 'fb:admins', 'content' => '']);

//Search Engine Index
//Check Post Ready
//$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, nofollow']);
$this->registerMetaTag(['http-equiv' => 'refresh', 'content' => '1800']);

?>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="icon-home fa"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo Url::to(['/ads/index']) ?>">All Ads</a></li>
                            <li class="breadcrumb-item"><a
                                        href="<?php echo Url::to(['/ads/index', 'cslug' => $catModel->slug]) ?>"><?php echo $articleDetail['category_text'] ?></a>
                            </li>

                            <li class="breadcrumb-item active"
                                aria-current="page">Xem chi tiết
                            </li>
                        </ol>
                    </nav>

                    <div class="pull-right backtolist">
                        <a href="<?php echo Url::to(['/ads/index', 'cslug' => $catModel->slug]) ?>"> <i
                                    class="fa fa-angle-double-left"></i> Trở lại danh
                            sách</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h2> <?php echo Html::encode($model->title) ?>
                            <small class="label label-default adlistingtype">Company ad</small>
                        </h2>
                        <span class="info-row"> <span class="date"> <i
                                        class=" icon-clock"> </i> <?php echo Yii::$app->formatter->asRelativeTime($model->updated_at) ?> <?php echo $articleDetail['updated_text'] ?> </span> - <span
                                    class="category"> <?php echo $articleDetail['category_text'] ?> </span>- <span
                                    class="item-location"><i
                                        class="fa fa-map-marker"></i> <?php echo $articleDetail['address_text'] ?> </span> </span>

                        <div class="ads-image">
                            <h1 class="pricetag"> <?php echo $articleDetail['price-show'] ?></h1>
                            <ul class="bxslider">
                                <?php foreach ($imagesAttactment as $key => $item): ?>

                                    <li><img src="<?php echo $item[2] ?>" title="Caption A" class="imgSlider"
                                             data-index="<?php echo $key ?>"
                                             alt="img"/></li>

                                <?php endforeach; ?>
                            </ul>
                            <div id="bx-pager">
                                <?php foreach ($imagesAttactment as $key => $item): ?>
                                    <a class="thumb-item-link" data-slide-index="<?php echo $key ?>" href="">
                                        <img class="lazy" src="<?php echo $imgBgBox ?>"
                                             data-src="<?php echo $item[2] ?>" alt="img"/></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!--ads-image-->

                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Thông tin mô tả</strong></h5>
                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <?php echo $model->body ?>
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin ">
                                                    <strong>Giá:</strong> <?php echo $articleDetail['price-show'] ?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Loại:</strong> Mobile Mobiles,For sale</p>
                                            </li>
                                            <li>
                                                <p class="no-margin">
                                                    <strong>Địa
                                                        điểm:</strong> <?php echo $articleDetail['address_text'] ?>
                                                </p>
                                            </li>
                                            <li>
                                                <p class=" no-margin ">
                                                    <strong>Tình
                                                        trạng:</strong> <?php echo $articleDetail['condition_text'] ?>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Nhãn hiệu:</strong> Sony</p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li>
                                                <a href="<?php echo Url::to(['/account/seller-profile', 'id' => $model->created_by]) ?>">
                                                    <i class=" fa fa-user"></i> Bài viết
                                                    bởi <?php echo $articleDetail['seller_user']['fullname'] ?> </a>
                                            </li>
                                            <?php echo Star::widget(['model' => $model]) ?>

                                            <li><a href="#"> <i class="fa fa-share-alt"></i> Chia sẻ ad </a></li>
                                            <li class="iCopy"><a href="#"> <i class="fa fa-link"></i> Copy Url </a></li>
                                            <li><a href="#reportAdvertiser" data-toggle="modal"> <i
                                                            class="fa icon-info-circled-alt"></i> Báo cáo </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer text-left">
                                <a class="btn  btn-default" data-toggle="modal"
                                   href="#contactAdvertiser"><i
                                            class=" icon-mail-2"></i> <?php echo Yii::t('common', 'Send a message') ?>
                                </a>
                                <?php
                                if (isset($sellerInfo['mobile']) && !empty($sellerInfo['mobile'])):
                                    ?>
                                    <a class="btn  btn-info"><i
                                                class=" icon-phone-1"></i> <?php echo $sellerInfo['mobile'] ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                <div class="col-md-3  page-sidebar-right">
                    <aside>
                        <div class="card sidebar-card  bg-contact-seller">
                            <div class="card-header"><?php echo Yii::t('common', 'Contact Seller') ?></div>
                            <div class="card-content user-info">
                                <div class="card-body text-center">
                                    <div class="seller-info">
                                        <a class="avatar checked"
                                           href="<?php echo Url::to(['/account/seller-profile', 'id' => $model->created_by]) ?>"
                                           title="Verified User">
                                            <img src="<?php echo $imgBg ?>" data-src="<?php echo $defaultAvatar ?>"
                                                 class="img-responsive imgAvatar lazy" alt="avatar">
                                        </a>
                                        <h3 class="no-margin"><?php echo $sellerInfo['fullname'] ?></h3>
                                        <p><?php echo Yii::t('common', 'Location') ?>:
                                            <strong><?php echo $sellerInfo['address'] ?></strong>
                                        </p>
                                        <p><?php echo Yii::t('common', 'Joined') ?>:
                                            <strong><?php echo $sellerInfo['joined_date'] ?></strong>
                                        </p>
                                    </div>
                                    <div class="user-ads-action">
                                        <a href="#contactAdvertiser" data-toggle="modal"
                                           class="btn   btn-secondary btn-block"><i
                                                    class=" icon-mail-2"></i> <?php echo Yii::t('common', 'Send a message') ?>
                                        </a>
                                        <?php
                                        if (isset($sellerInfo['mobile']) && !empty($sellerInfo['mobile'])):
                                            ?>
                                            <a class="btn  btn-info btn-block"><i
                                                        class=" icon-phone-1"></i> <?php echo $sellerInfo['mobile'] ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->render('@frontend/views/partical/_safety_tip', []) ?>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php echo $this->render('view/_item_photoswipe') ?>
<?php echo $this->render('partical/modal/_modal_contact', ['modalArticle' => $model]) ?>
    <!-- /.modal -->

<?php
$app_css = <<<CSS
.ads-details-info ul {
    margin-bottom: 20px !important;
     margin-left: 30px !important;
}
.ads-details-info ul > li {
    list-style: circle;
}
.star-wrapper .fa {
    font-size: 20px;
    font-style: normal;
    cursor: pointer;
}
.imgSlider{
    cursor: pointer;
}
.imgAvatar {
    max-width: 120px;
}
CSS;
$this->registerCss($app_css);

$app_js = <<<JS
var slider = $('.bxslider').bxSlider({
    pagerCustom: '#bx-pager',
    auto: true,
    captions: true,
    pause: 5000
});

$(".imgSlider").click(function () {
    //slider.goToNextSlide();
   // alert("The paragraph was clicked.");
   index = $(this).attr("data-index");
   console.log(index);
   openPhotoSwipe(index);
});
JS;

$this->registerJs($app_js);

$arrImagePS = $model->getImageList();
$psImage = Json::encode($arrImagePS);
$jsPhotoswipe = <<<JS
var openPhotoSwipe = function(indexI = null) {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    // build items array
    var items = $psImage;
    
    // define options (if needed)
    var options = {
        history: false,
        focus: false,
        showAnimationDuration: 0,
        hideAnimationDuration: 0
       
    };
    
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};

JS;

$this->registerJs($jsPhotoswipe);

