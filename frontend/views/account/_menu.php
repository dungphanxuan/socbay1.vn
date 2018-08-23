<?php

use yii\helpers\Url;
use common\helpers\UserData;

/* @var $this yii\web\View */

$action = \Yii::$app->controller->action->id;
$dataStat = UserData::getUserStat(false, Yii::$app->user->id);

?>
<div class="inner-box">
    <div class="user-panel-sidebar">
        <div class="collapse-box">
            <h5 class="collapse-title no-border"> My Classified <a class="pull-right"
                                                                   aria-expanded="true" data-toggle="collapse"
                                                                   href="#MyClassified"><i
                            class="fa fa-angle-down"></i></a></h5>

            <div id="MyClassified" class="panel-collapse collapse show">
                <ul class="acc-list">
                    <li><a href="<?php echo Url::to(['/user/default/index']) ?>"
                           class="<?php echo $action == 'index' ? 'active' : '' ?>"><i class="icon-home"></i>
                            Trang cá nhân </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /.collapse-box  -->
        <div class="collapse-box">
            <h5 class="collapse-title"> Tin của bạn <a class="pull-right" aria-expanded="true" data-toggle="collapse"
                                                       href="#MyAds"><i class="fa fa-angle-down"></i></a>
            </h5>

            <div id="MyAds" class="panel-collapse collapse <?php echo detectMobile() ? '' : 'show' ?>">
                <ul class="acc-list">
                    <li><a href="<?php echo Url::to(['/account/ads']) ?>"
                           class="<?php echo $action == 'ads' ? 'active' : '' ?>"><i
                                    class="icon-docs"></i> Tin của bạn <span
                                    class="badge badge-secondary"><?php echo $dataStat['article'] ?></span>
                        </a>
                    </li>
                    <li><a href="<?php echo Url::to(['/account/favourite']) ?>"
                           class="<?php echo $action == 'favourite' ? 'active' : '' ?>"><i
                                    class="icon-heart"></i>
                            Tin ưu thích <span class="badge badge-secondary"><?php echo $dataStat['favourite'] ?></span>
                        </a>
                    </li>
                    <li><a href="<?php echo Url::to(['/account/saved']) ?>"
                           class="<?php echo $action == 'saved' ? 'active' : '' ?>"><i
                                    class="icon-star-circled"></i>
                            Lưu tìm kiếm <span class="badge badge-secondary"><?php echo $dataStat['saved'] ?></span>
                        </a></li>
                    <li><a href="<?php echo Url::to(['/account/archived']) ?>"
                           class="<?php echo $action == 'archived' ? 'active' : '' ?>"><i
                                    class="icon-folder-close"></i>
                            Tin lưu trữ <span
                                    class="badge badge-secondary"><?php echo $dataStat['archived'] ?></span></a></li>
                    <li><a href="<?php echo Url::to(['/account/pending']) ?>"
                           class="<?php echo $action == 'pending' ? 'active' : '' ?>"><i
                                    class="icon-hourglass"></i> Chờ duyệt <span
                                    class="badge"><?php echo $dataStat['pending'] ?></span></a></li>
                    <li><a href="<?php echo Url::to(['/account/message']) ?>"
                           class="<?php echo $action == 'message' ? 'active' : '' ?>"><i
                                    class="fa fa-commenting-o"></i> Tin nhắn <span
                                    class="badge"><?php echo $dataStat['message'] ?></span></a></li>

                </ul>
            </div>
        </div>

        <!-- /.collapse-box  -->
        <div class="collapse-box">
            <h5 class="collapse-title"> Trợ giúp <a class="pull-right"
                                                    aria-expanded="true" data-toggle="collapse"
                                                    href="#TerminateAccount"><i
                            class="fa fa-angle-down"></i></a></h5>

            <div id="TerminateAccount" class="panel-collapse collapse show">
                <ul class="acc-list">
                    <li><a href="<?php echo Url::to(['/account/ticket']) ?>"
                           class="<?php echo $action == 'ticket' ? 'active' : '' ?>"><i
                                    class="fa fa-ticket"></i> Ticket </a></li>
                </ul>
            </div>
        </div>
        <!-- /.collapse-box  -->
    </div>
</div>
<!-- /.inner-box  -->

