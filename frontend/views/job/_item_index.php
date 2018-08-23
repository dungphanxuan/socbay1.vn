<?php


use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$detail = \common\helpers\ArticleHelper::getDetail($model->id);

$bundle = AdsAsset::register($this);
?>
<div class="item-list job-item">
    <div class="row">


        <div class="col-sm-1  col-xs-2 no-padding photobox">
            <div class="add-image"><a href=""><img alt="company logo"
                                                   src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/jobs/company-logos/1.jpg') ?>"
                                                   class="thumbnail no-margin"></a>
            </div>
        </div>
        <!--/.photobox-->
        <div class="col-sm-10  col-xs-10  add-desc-box">
            <div class="ads-details jobs-item">
                <h5 class="company-title "><a href="">CO Engineering</a></h5>
                <h4 class="job-title"><a href="job-details.html"> Front-end
                        Developer </a>
                </h4>
                <span class="info-row">  <span class="item-location"><i
                                class="fa fa-map-marker"></i> Hà Nội, NY </span> <span
                            class="date"><i
                                class=" icon-clock"> </i>Full-time</span><span
                            class=" salary">	<i class=" icon-money"> </i> $50000 - $81000 a year</span></span>

                <div class="jobs-desc">
                    A Web Tester / Developer with experience in PHP, HTML, CSS and
                    JavaScript is needed to join a global music services company.
                </div>


                <div class="job-actions">
                    <ul class="list-unstyled list-inline">
                        <li>
                            <a class="save-job" href="#">
                                <span class="fa fa-star-o"></span>
                                Save Job
                            </a>
                        </li>
                        <li class="saved-job hide">
                            <a href="#" class="saved-job">
                                <span class="fa fa-star"></span>
                                Saved Job
                            </a>
                        </li>
                        <li>
                            <a href="#" class="email-job">
                                <i class="fa fa-envelope"></i>
                                Email Job
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

