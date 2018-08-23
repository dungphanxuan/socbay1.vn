<?php


use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$bundle = AdsAsset::register($this);

$detail = \common\helpers\ArticleHelper::getDetail($model->id);
$dataCompany = $detail['job_company'];
$defaltThumbnail = $this->assetManager->getAssetUrl($bundle, 'images/jobs/company-logos/4.jpg');
if ($dataCompany['thumbnail'] && !empty($dataCompany['thumbnail'])) {
    $defaltThumbnail = $dataCompany['thumbnail'];
}

?>
<div class="item-list job-item">
    <div class="row">

        <div class="col-sm-1  col-xs-2 no-padding photobox">
            <div class="add-image"><a data-pjax="0" title="<?php echo $dataCompany['title'] ?>"
                                      href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"><img
                            alt="company logo" title="<?php echo $dataCompany['title'] ?>"
                            src="<?php echo $defaltThumbnail ?>"
                            class="thumbnail no-margin"></a></div>
        </div>
        <!--/.photobox-->
        <div class="col-sm-10  col-xs-10  add-desc-box">
            <div class="ads-details jobs-item">
                <h5 class="company-title "><a data-pjax="0" title="<?php echo $dataCompany['title'] ?>"
                                              href="<?php echo Url::to(['/job/company-profile', 'id' => $dataCompany['id']]) ?>"><?php echo $dataCompany['title'] ?></a>
                </h5>
                <h4 class="job-title"><a target="_blank" data-pjax="0" title="<?php echo $model->title ?>"
                                         href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"><?php echo $model->title ?></a>
                </h4>
                <span class="info-row">  <span class="item-location"><i
                                class="fa fa-map-marker"></i> <?php echo isset($model->address_text) ? $model->address_text : $detail['address_text'] ?></span> <span
                            class="date"><i class=" icon-clock"> </i>Toàn thời gian</span><span
                            class=" salary">	<i class=" icon-money"> </i> Thỏa thuận</span></span>

                <div class="jobs-desc"> <?php echo \yii\helpers\StringHelper::truncateWords($model->excerpt, 20) ?></div>


                <div class="job-actions">
                    <ul class="list-unstyled list-inline">
                        <li>
                            <?php echo \frontend\widgets\Star::widget(['model' => $model, 'view' => 'star_job']) ?>
                        </li>
                        <li class="saved-job hide">
                            <a href="#" data-pjax="0" class="saved-job">
                                <span class="fa fa-share"></span>
                                Chia sẻ
                            </a>
                        </li>
                        <li>
                            <a href="#" data-pjax="0" class="email-job">
                                <i class="fa fa-envelope"></i>
                                Gửi Email
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <!--/.add-desc-box-->

        <!--/.add-desc-box-->
    </div>
</div>
<!--/.job-item-->

