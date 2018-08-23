<?php

use common\helpers\ArticleHelper;
use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\Star;
use common\models\job\Company;


/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $modelDetail \common\models\ArticleDetail */
/* @var $catModel \common\models\ArticleCategory */
/* @var $modelCompany \common\models\job\Company */

$this->title = $model->title;

$bundle = AdsAsset::register($this);
$bundle = AdsAsset::register($this);
$articleDetail = ArticleHelper::getDetail($model->id, true);
$sellerInfo = $articleDetail['seller_user'];
$imagesAttactment = $articleDetail['attachments'];
$dataCompany = $articleDetail['job_company'];
$dataJob = $articleDetail['job_data'];

$defaltThumbnail = $this->assetManager->getAssetUrl($bundle, 'images/jobs/company-logos/4.jpg');
if ($dataCompany['thumbnail'] && !empty($dataCompany['thumbnail'])) {
    $defaltThumbnail = $dataCompany['thumbnail'];
}

?>

<div class="main-container">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home fa"></i></a></li>
                        <li class="breadcrumb-item"><a
                                    href="<?php echo Url::to(['/ads/index', 'type' => 'job', 'cslug' => $catModel->slug]) ?>">Việc
                                làm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?php echo Url::to(['/ads/index', 'type' => 'job', 'cslug' => $catModel->slug, 'job_cat' => $dataJob['category_slug']]) ?>"
                               style="color: #6c757d !important;"> <?php echo $dataJob['category_name'] ?></a>
                        </li>
                    </ol>
                </nav>


                <div class="pull-right backtolist"><a
                            href="<?php echo Url::to(['/ads/index', 'type' => 'job', 'cslug' => $catModel->slug]) ?>">
                        <i
                                class="fa fa-angle-double-left"></i> <?php echo Yii::t('frontend', 'Back to Results') ?>
                    </a>
                </div>

            </div>
        </div>


    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content col-thin-right">
                <div class="inner inner-box ads-details-wrapper">
                    <h2> <?php echo $model->title ?> </h2>
                    <span class="info-row"> <span class="date"><i
                                    class=" icon-clock"> </i> Đã đăng: <?php echo Yii::$app->formatter->asRelativeTime($model->updated_at) ?> <?php echo $articleDetail['updated_text'] ?> </span> - <span
                                class=""> Full Time </span> - <span class="item-location"><i
                                    class="fa fa-map-marker"></i> Hà Nội </span> </span>

                    <div class="Ads-Details ">
                        <div class="row">
                            <div class="ads-details-info jobs-details-info col-md-8">
                                <?php echo \yii\helpers\HtmlPurifier::process($model->body) ?>
                            </div>
                            <div class="col-md-4">
                                <aside class="panel panel-body panel-details job-summery">
                                    <ul>

                                        <li><p class=" no-margin "><strong>Ngày bắt đầu:</strong> ASAP </p></li>
                                        <li>
                                            <p class=" no-margin "><strong>Mức lương:</strong> Thỏa thuận</p>
                                        </li>
                                        <li>
                                            <p class="no-margin"><strong>Hình thức:</strong> Toàn thời gian</p>
                                        </li>
                                        <li>
                                            <p class="no-margin"><strong>Vị
                                                    trí:</strong> <?php echo $articleDetail['address_text'] ?> </p>
                                        </li>


                                    </ul>
                                </aside>
                                <div class="ads-action">
                                    <ul class="list-border">
                                        <li><a href="<?php echo Url::to(['/job/email']) ?>"> <i
                                                        class=" fa icon-mail"></i>
                                                Email job</a></li>
                                        <li><a href="<?php echo Url::to(['/job/print']) ?>"> <i
                                                        class="fa icon-print"></i>
                                                Print job</a>
                                        </li>
                                        <li>
                                            <?php echo \frontend\widgets\Star::widget(['model' => $model, 'view' => 'star_job_view']) ?>
                                        </li>
                                        <li><a href="#"> <i class="fa fa-share-alt"></i> Chia sẻ</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content-footer text-left">
                            <a href="#applyJob" data-toggle="modal" class="btn  btn-primary"> <i
                                        class=" icon-mail-2"></i> Nạp đơn trực tuyến </a>
                            <small> hoặc. Gửi CV tới địa chỉ email: career@gmail.com</small>
                        </div>
                    </div>
                </div>
                <!--/.ads-details-wrapper-->

            </div>
            <!--/.page-content-->

            <div class="col-md-3  page-sidebar-right">
                <aside>
                    <div class="card sidebar-card card-contact-seller">
                        <div class="card-header"><?php echo Yii::t('frontend', 'Company Information') ?></div>
                        <div class="card-content user-info">
                            <div class="card-body text-center">
                                <div class="seller-info">
                                    <div class="company-logo-thumb">
                                        <a href="<?php echo Url::to(['/job/company-profile', 'id' => $dataCompany['id']]) ?>"><img
                                                    alt="img" class="img-responsive img-circle"
                                                    src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/jobs/company-logos/17.jpg') ?>">
                                        </a></div>
                                    <h3 class="no-margin"> <?php echo $dataCompany['title'] ?></h3>

                                    <p>Vị trí: <strong><?php echo $articleDetail['address_text'] ?></strong></p>

                                    <p> Địa chỉ website: <a
                                                href="<?php echo isset($modelCompany) ? $modelCompany->url : '' ?>"
                                                target="_blank"><strong><?php echo isset($modelCompany) ? $modelCompany->url : '' ?></strong></a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php echo $this->render('@frontend/views/partical/_safety_tip_job', []) ?>
                    <!--/.categories-list-->
                </aside>
            </div>
            <!--/.page-side-bar-->
        </div>
    </div>
</div>
<!-- /.main-container -->

