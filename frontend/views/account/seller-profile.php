<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use frontend\assets\AdsAsset;
use common\models\data\ArticleData;

/* @var $this yii\web\View */
/* @var $modelUser \common\models\User */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Seller Profile';

$bundle = AdsAsset::register($this);
$profile = $modelUser->userProfile;

$totalAds = ArticleData::getTotal(4, Yii::$app->user->id);
?>
    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="inner-box ">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="seller-info seller-profile">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="seller-profile-img">
                                            <a><img src="<?php echo $profile->getAvatar() ? $profile->getAvatar() : $this->assetManager->getAssetUrl($bundle, 'images/user.jpg') ?>"
                                                    class="img-responsive thumbnail rounded " alt="img"> </a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="no-margin no-padding link-color uppercase "> <?php echo $modelUser->userProfile->getFullName() ?></h3>

                                        <div class="text-muted">
                                            99.8% <?php echo Yii::t('ads', 'positive Feedback') ?>
                                        </div>
                                        <div class="user-ads-action">
                                            <a class="btn btn-sm   btn-default " data-toggle="modal"
                                               href="#contactAdvertiser"><i class=" icon-mail-2"></i> Gửi tin nhắn
                                            </a>
                                            <a class="btn btn-sm  btn-success "><i class=" icon-plus"></i> Theo dõi </a>
                                        </div>

                                        <div class="seller-social-list">

                                            <ul class="share-this-post">
                                                <li><a class="google-plus" href="https://www.google.com/"
                                                       target="_blank"><i
                                                                class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li><a class="facebook" href="https://www.facebook.com/"
                                                       target="_blank"><i
                                                                class="fa fa-facebook"></i></a>
                                                </li>
                                                <li><a href="https://www.twitter.com/" target="_blank"><i
                                                                class="fa fa-twitter"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="col-sm-6">

                            <div class="seller-contact-info">

                                <h3 class="no-margin uppercase color-danger"> Thông tin liên hệ </h3>

                                <dl class="dl-horizontal">

                                    <dt>Địa chỉ:</dt>
                                    <dd class="contact-sensitive"> <?php echo $profile->address ?> <br>
                                        <?php echo $profile->address2 ?>
                                    </dd>
                                    <dt>Điện thoại:</dt>
                                    <dd class="contact-sensitive"><?php echo $profile->phone ? $profile->phone : ' ' ?></dd>
                                    <dt>Công ty:</dt>
                                    <dd class="contact-sensitive"><?php echo $profile->company_name ? $profile->company_name : '' ?></dd>
                                    <dt>Email:</dt>
                                    <dd class="contact-sensitive"><?php echo $modelUser->email ?></dd>
                                </dl>


                            </div>

                        </div>
                    </div>

                </div>

                <div class="section-block">
                    <div class="row">
                        <div class="col-sm-9 col-thin-left page-content ">

                            <div class="category-list">
                                <div class="tab-box ">


                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs add-tabs" role="tablist">
                                        <li class="active nav-item"><a href="#allAds" role="tab" data-toggle="tab"
                                                                       class="nav-link"><?php echo Yii::t('ads', 'User all ads') ?>
                                                <span
                                                        class="badge badge-pill badge-secondary"><?php echo $totalAds ?></span></a>
                                        </li>
                                    </ul>
                                    <div class="tab-filter">
                                        <?php echo $this->render('@frontend/views/ads/partical/_tab_filter', []) ?>
                                    </div>


                                </div>
                                <!--/.tab-box-->

                                <div class="listing-filter">
                                    <div class="pull-left col-xs-6">
                                        <div class="breadcrumb-list"><a href="#" class="current">
                                                <span><?php echo Yii::t('ads', 'All ads') ?></span></a> tại Hà Nội <a
                                                    href="#selectRegion"
                                                    id="dropdownMenu1"
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
                                <?php echo ListView::widget([
                                    'dataProvider' => $dataProvider,
                                    'summary' => '',
                                    'layout' => '{items}',
                                    //'itemView'     => '_item_seller',
                                    'itemView' => '@frontend/views/ads/_item',
                                    'options' => [
                                        'tag' => 'div',
                                        'class' => 'adds-wrapper',
                                    ],
                                    'itemOptions' => [
                                        'tag' => false,
                                    ]
                                ]) ?>

                                <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-plus"></i>
                                        <?php echo Yii::t('frontend', 'Follow User') ?> </a></div>
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

                            <?php echo $this->render('@frontend/views/ads/partical/_post_promo', []) ?>

                            <!--/.post-promo-->

                        </div>


                        <div class="col-md-3  page-sidebar-right">
                            <aside>
                                <div class="card sidebar-card card-contact-seller">
                                    <div class="card-header"><?php echo Yii::t('frontend', 'Follwing') ?> <span
                                                class="badge badge-secondary">3</span>
                                    </div>
                                    <div class="card-content user-info">
                                        <div class="card-body text-center">
                                            <ul class="list-unstyled list-user-list">

                                                <li><a><img alt="img"
                                                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/13.jpg') ?>"
                                                            class="img-circle   "></a></li>
                                                <li><a><img alt="img"
                                                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/9.jpg') ?>"
                                                            class="img-circle   "></a></li>
                                                <li><a><img alt="img"
                                                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/7.jpg') ?>"
                                                            class="img-circle   "></a></li>
                                            </ul>


                                        </div>
                                    </div>
                                </div>
                                <div class="card sidebar-card card-contact-seller">
                                    <div class="card-header"><?php echo Yii::t('frontend', 'Followers') ?> <span
                                                class="badge badge-secondary">81</span>
                                    </div>
                                    <div class="card-content user-info">
                                        <div class="card-body text-center">
                                            <ul class="list-unstyled list-user-list long-list-user">

                                                <li><a><img alt="img"
                                                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/1.jpg') ?>"
                                                            class="img-circle   "></a></li>
                                                <li><a><img alt="img"
                                                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/2.jpg') ?>"
                                                            class="img-circle   "></a></li>
                                                <li><a><img alt="img"
                                                            src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/users/3.jpg') ?>"
                                                            class="img-circle   "></a></li>
                                            </ul>


                                        </div>
                                    </div>
                                </div>
                                <!--Safety tip-->
                                <?php echo $this->render('@frontend/views/partical/_safety_tip', []) ?>

                                <!--/.categories-list-->
                            </aside>
                        </div>
                        <!--/.page-side-bar-->
                    </div>
                </div>


            </div>

        </div>
    </div>


    <!-- Modal contactAdvertiser -->

    <div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class=" icon-mail-2"></i> Liên hệ thành viên </h4>

                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Name:</label>
                            <input class="form-control required" id="recipient-name" placeholder="Your name"
                                   data-placement="top" data-trigger="manual"
                                   data-content="Must be at least 3 characters long, and must only contain letters."
                                   type="text">
                        </div>
                        <div class="form-group">
                            <label for="sender-email" class="control-label">E-mail:</label>
                            <input id="sender-email" type="text"
                                   data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual"
                                   data-placement="top" placeholder="email@you.com" class="form-control email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
                            <input type="text" maxlength="60" class="form-control" id="recipient-Phone-Number">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Message <span
                                        class="text-count">(300) </span>:</label>
                            <textarea class="form-control" id="message-text" placeholder="Your message here.."
                                      data-placement="top" data-trigger="manual"></textarea>
                        </div>
                        <div class="form-group">
                            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
                                valid. </p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right">Send message!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /.modal -->
<?php

$app_css = <<<CSS

CSS;

$app_js = <<<JS

JS;

$this->registerJs($app_js);