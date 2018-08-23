<?php

use yii\helpers\Url;
use common\models\ArticleCategory;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/18/2017
 * Time: 2:59 PM
 */
/* @var $this \yii\web\View */

$cProperty = ArticleCategory::find()->where(['type' => \common\dictionaries\AdsType::PROPERTY])->one();

?>
<div class="header">
    <nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
         role="navigation">
        <div class="container">

            <div class="navbar-identity">
                <?php echo $this->render('_navbar_identity', [
                ]) ?>

            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="nav-item active"><a class="nav-link active"
                                                   href="<?php echo Url::to(['/ads/index', 'cslug' => $cProperty->slug]) ?>"><?php echo Yii::t('common', 'Property') ?></a>
                    </li>
                    <li class="nav-item active"><a class="nav-link active"
                                                   href="<?php echo Url::to(['/property/project']) ?>"><?php echo Yii::t('common', 'Project') ?></a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo Url::to(['/blog/index', 'type' => 'property']) ?>"><?php echo Yii::t('common', 'Agencies') ?></a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo Url::to(['/blog/index', 'type' => 'property']) ?>"><?php echo Yii::t('common', 'News') ?></a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo Url::to(['/property/event']) ?>"><?php echo Yii::t('common', 'Event') ?></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto navbar-right">
                    <li class="nav-item"><a href="<?php echo Url::to(['/ads/index']) ?>" class="nav-link"><i
                                    class="icon-th-thumb"></i> <?php echo Yii::t('ads', 'All Properties') ?></a>
                    </li>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <li class="nav-item"><a href="<?php echo Url::to(['/user/sign-in/login']) ?>" class="nav-link">Đăng
                                nhập</a></li>
                    <?php else: ?>

                        <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link"
                                                                  data-toggle="dropdown">

                                <span><?php echo Yii::$app->user->identity->userProfile->getFullName() ?></span> <i
                                        class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                            <?php echo $this->render('_menu_user', []) ?>
                        </li>
                    <?php endif; ?>
                    <li class="postadd nav-item"><a
                                class="btn btn-block   btn-border btn-post btn-danger nav-link"
                                href="<?php echo Url::to(['/ads/create', 'type' => 'property']) ?>"><?php echo Yii::t('ads', 'Post Free Add') ?></a>
                    </li>
                    <li class="dropdown  lang-menu nav-item">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                            <span class="lang-title">VI</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right user-menu" role="menu">
                            <li class="dropdown-item"><a class="active"
                                                         href="<?php echo Url::to(['/site/set-locale', 'locale' => 'en-US']) ?>"><span
                                            class="lang-name">English</span></a></li>
                            <li class="dropdown-item"><a
                                        href="<?php echo Url::to(['/site/set-locale', 'locale' => 'vi']) ?>"><span
                                            class="lang-name">Tiếng Việt</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
<!-- /.header -->