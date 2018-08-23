<?php

use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/18/2017
 * Time: 2:59 PM
 */
/* @var $this \yii\web\View */

?>
<div class="header">
    <nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
         role="navigation">
        <div class="container">

            <div class="navbar-identity">
                <?php echo $this->render('_navbar_identity', []) ?>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo Url::to(['/media/index']) ?>"><?php echo Yii::t('ads', 'Media') ?></a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo Url::to(['/support/index']) ?>"><?php echo Yii::t('ads', 'Help Center') ?></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto navbar-right">
                    <?php if (Yii::$app->user->isGuest): ?>
                        <li>
                            <a href="<?php echo Url::to(['/user/sign-in/login']) ?>"><?php echo Yii::t('frontend', 'Login') ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['/user/sign-in/signup']) ?>"><?php echo Yii::t('frontend', 'Sign Up') ?></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a href="<?php echo Url::to(['/ads/index']) ?>" class="nav-link"><i
                                        class="icon-th-thumb"></i> <?php echo Yii::t('ads', 'All Ads') ?></a>
                        </li>
                        <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link"
                                                                  data-toggle="dropdown">

                                <span><?php echo Yii::$app->user->identity->userProfile->getFullName() ?></span> <i
                                        class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                            <?php echo $this->render('_menu_user', []) ?>
                        </li>
                    <?php endif; ?>
                    <li class="postadd nav-item"><a
                                class="btn btn-block   btn-border btn-post btn-danger nav-link"
                                href="<?php echo Url::to(['/ads/create', 'type' => 'job']) ?>"><?php echo Yii::t('ads', 'Post A Jobs') ?></a>
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
