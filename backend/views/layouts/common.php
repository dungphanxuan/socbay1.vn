<?php
/**
 * @var $this yii\web\View
 * @var $content
 */

use backend\assets_b\BackendAsset;
use backend\models\SystemLog;
use backend\widgets\Menu;
use common\models\TimelineEvent;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\log\Logger;
use yii\widgets\Breadcrumbs;

$action = \Yii::$app->controller->id;
$imgBg = baseUrl() . '/web/img/anonymous.jpg';

$bundle = BackendAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/base.php'); ?>
<div class="wrapper">
    <!-- header logo: style can be found in header.less -->
    <header class="main-header">
        <a href="<?php echo Yii::$app->urlManagerFrontend->createAbsoluteUrl('/') ?>" target="_blank" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Socbay </b>Ads</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only"><?php echo Yii::t('backend', 'Toggle navigation') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <ul class="add-new nav navbar-nav pull-left hidden-xs">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown add-new-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-plus"></i>
                    </a>
                    <div class="dropdown-menu">
                        <ul class="list-inline">
                            <li>
                                <ul class="list-unstyled">
                                    <li class="header"><i class="fa fa-money"></i> &nbsp;<span
                                                style="font-weight: 600;">Content</span></li>
                                    <li>
                                        <div class="slimScrollDiv"
                                             style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                            <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                                <li><a href="<?php echo Url::to(['/article/create']) ?>">Add Article</a>
                                                </li>
                                                <li><a href="<?php echo Url::to(['/article/index']) ?>">Article List</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="list-unstyled">
                                    <li class="header"><i class="fa fa-shopping-cart"></i> &nbsp;<span
                                                style="font-weight: 600;">Catalog</span></li>
                                    <li>
                                        <div class="slimScrollDiv"
                                             style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                            <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                                <li><a href="<?php echo Url::to(['/new-business/create']) ?>">Add
                                                        New</a>
                                                </li>
                                                <li><a href="<?php echo Url::to(['/new-business/index']) ?>">New
                                                        List</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="list-unstyled">
                                    <li class="header"><i class="fa fa-cubes"></i> &nbsp;<span
                                                style="font-weight: 600;">Ads</span></li>
                                    <li>
                                        <div class="slimScrollDiv"
                                             style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                            <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                                <li><a href="">Add Recruitment</a></li>
                                                <li><a href="">Recruitment</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="<?php echo $action == 'article' ? 'active' : '' ?>"><a
                            href="<?php echo Url::to(['/article/index']) ?>">Article</a>
                </li>
                <li class="<?php echo $action == 'media' ? 'active' : '' ?>"><a
                            href="<?php echo Url::to(['/media/default/index']) ?>">Media</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Content <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo Url::to(['/ads/ads-assets/index']) ?>">Assets</a></li>
                        <li><a href="<?php echo Url::to(['/article/index']) ?>">Request</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Classified <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo Url::to(['/ads/advertising/index']) ?>">Advertising</a></li>
                        <li><a href="<?php echo Url::to(['/article/index']) ?>">Request</a></li>
                        <li><a href="<?php echo Url::to(['/ads/ads-report/index']) ?>">Report</a></li>
                        <li><a href="<?php echo Url::to(['/article/index']) ?>">Messenser</a></li>
                        <li><a href="<?php echo Url::to(['/ads/support-topic/index']) ?>">Support</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Other <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo Url::to(['/ads/media/index']) ?>">Media</a></li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li id="timeline-notifications" class="notifications-menu">
                        <a href="<?php echo Url::to(['/timeline-event/index']) ?>">
                            <i class="fa fa-bell"></i>
                            <span class="label label-success">
                                    <?php echo TimelineEvent::find()->today()->count() ?>
                                </span>
                        </a>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li id="log-dropdown" class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-warning"></i>
                            <span class="label label-danger">
                                <?php echo SystemLog::find()->count() ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><?php echo Yii::t('backend', 'You have {num} log items', ['num' => SystemLog::find()->count()]) ?></li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php foreach (SystemLog::find()->orderBy(['log_time' => SORT_DESC])->limit(5)->all() as $logEntry): ?>
                                        <li>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['/system/log/view', 'id' => $logEntry->id]) ?>">
                                                <i class="fa fa-warning <?php echo $logEntry->level === Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow' ?>"></i>
                                                <?php echo $logEntry->category ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <?php echo Html::a(Yii::t('backend', 'View all'), ['/system/log/index']) ?>
                            </li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="<?php echo Url::to(['/crm/task/index']) ?>">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $imgBg ?>"
                                 data-src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                                 class="user-image lazy">
                            <span><?php echo Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header light-blue">
                                <img src="<?php echo $imgBg ?>"
                                     data-src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                                     class="img-circle lazy" alt="User Image"/>
                                <p>
                                    <?php echo Yii::$app->user->identity->username ?>
                                    <small>
                                        <?php echo Yii::t('backend', 'Member since {0, date, short}', Yii::$app->user->identity->created_at) ?>
                                    </small>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?php echo Html::a(Yii::t('backend', 'Profile'), ['/sign-in/profile'], ['class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-left">
                                    <?php echo Html::a(Yii::t('backend', 'Account'), ['/sign-in/account'], ['class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-right">
                                    <?php echo Html::a(Yii::t('backend', 'Logout'), ['/sign-in/logout'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?php echo Html::a('<i class="fa fa-cogs"></i>', ['/site/settings']) ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src=""
                         data-src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                         class="img-circle lazy"/>
                </div>
                <div class="pull-left info">
                    <p><?php echo Yii::t('backend', 'Hello, {username}', ['username' => Yii::$app->user->identity->getPublicIdentity()]) ?></p>
                    <a href="<?php echo Url::to(['/sign-in/profile']) ?>">
                        <i class="fa fa-circle text-success"></i>
                        <?php echo Yii::$app->formatter->asDatetime(time()) ?>
                    </a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form" id="form-search">
                <div class="input-group" id="search">
                    <input type="text" name="search" class="form-control" id="input-search" placeholder="Tìm kiếm...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php echo Menu::widget([
                'options'         => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
                'linkTemplate'    => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                'activateParents' => true,
                'items'           => [
                    [
                        'label'   => Yii::t('backend', 'Main'),
                        'options' => ['class' => 'header']
                    ],
                    /* [
                         'label'        => Yii::t('backend', 'Timeline'),
                         'icon'         => '<i class="fa fa-bar-chart-o"></i>',
                         'url'          => ['/timeline-event/index'],
                         'badge'        => TimelineEvent::find()->today()->count(),
                         'badgeBgClass' => 'label-success',
                     ],*/
                    [
                        'label' => Yii::t('backend', 'Dashboard'),
                        'icon'  => '<i class="fa fa-dashboard"></i>',
                        'url'   => ['/site/dashboard'],
                    ],

                    [
                        'label'   => Yii::t('backend', 'Ads Management'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-cubes"></i>',
                        'options' => ['class' => 'treeview'],
                        'active'  => in_array(Yii::$app->controller->id, ['article', 'article-package']),
                        'items'   => [
                            ['label' => Yii::t('backend', 'All Ads'), 'url' => ['/article/index'], 'icon' => '<i class="fa fa-circle-o"></i>', 'active' => (Yii::$app->controller->id == 'article')],
                            ['label' => Yii::t('backend', 'Pending Ads'), 'url' => ['/article/index', 'status' => 3], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Package'), 'url' => ['/catalog/article-package/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'Content'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-edit"></i>',
                        'options' => ['class' => 'treeview'],
                        'active'  => in_array(Yii::$app->controller->id, ['page', 'article-category', 'widget-text', 'widget-menu', 'widget-carousel']),
                        'items'   => [
                            ['label' => Yii::t('backend', 'Static pages'), 'url' => ['/page/index'], 'icon' => '<i class="fa fa-circle-o"></i>', 'active' => (Yii::$app->controller->id == 'page')],
                            //['label' => Yii::t('backend', 'Article'), 'url' => ['/article/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            //['label' => Yii::t('backend', 'Article Revision'), 'url' => ['/article-revision/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Article Category'), 'url' => ['/article-category/index'], 'icon' => '<i class="fa fa-circle-o"></i>', 'active' => (Yii::$app->controller->id == 'article-category')],
                            ['label' => Yii::t('backend', 'Text Widgets'), 'url' => ['/widget/text/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Menu Widgets'), 'url' => ['/widget/menu/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Carousel Widgets'), 'url' => ['/widget/carousel/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Ads Message'), 'url' => ['/widget/message/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'Property'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-list"></i>',
                        'options' => ['class' => 'treeview'],
                        'active'  => in_array(Yii::$app->controller->id, ['project', 'event', 'project-area', 'project-price', 'project-status', 'project-type', 'project-feature']),
                        'items'   => [
                            ['label' => Yii::t('backend', 'Project'), 'url' => ['/property/project/index'], 'icon' => '<i class="fa fa-circle-o"></i>', 'active' => (Yii::$app->controller->id == 'project')],
                            ['label' => Yii::t('backend', 'Property'), 'url' => ['/property/category/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Event'), 'url' => ['/property/event/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Company'), 'url' => ['/job/company/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            [
                                'label'   => Yii::t('backend', 'Property Setting'),
                                'url'     => '#',
                                'icon'    => '<i class="fa fa-flag"></i>',
                                'options' => ['class' => 'treeview'],
                                'active'  => in_array(Yii::$app->controller->id, ['project-area', 'project-price', 'project-type', 'project-status']),
                                'items'   => [
                                    [
                                        'label' => Yii::t('backend', 'Category'),
                                        'url'   => ['/property/project-category/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Type'),
                                        'url'   => ['/property/project-type/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Status'),
                                        'url'   => ['/property/project-status/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Feature'),
                                        'url'   => ['/property/project-feature/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Price'),
                                        'url'   => ['/property/project-price/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Area'),
                                        'url'   => ['/property/project-area/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                ],
                            ],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'Job'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-cubes"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => Yii::t('backend', 'Job Type'), 'url' => ['/job/job-type/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Job Category'), 'url' => ['/job/job-category/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Company'), 'url' => ['/job/company/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Job List'), 'url' => ['/catalog/category/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'Catalog'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-globe"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => Yii::t('backend', 'Support'), 'url' => ['/catalog/product/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Product'), 'url' => ['/catalog/category/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            [
                                'label'   => Yii::t('backend', 'CRM'),
                                'url'     => '#',
                                'icon'    => '<i class="fa fa-flag"></i>',
                                'options' => ['class' => 'treeview'],
                                'active'  => in_array(Yii::$app->controller->id, ['rbac-auth-assignment', 'rbac-auth-item', 'rbac-auth-item-child', 'rbac-auth-rule']),
                                'items'   => [
                                    [
                                        'label' => Yii::t('backend', 'Auth Assignment'),
                                        'url'   => ['/rbac/rbac-auth-assignment/index'],
                                        'icon'  => '<i class="fa fa-angle-double-right"></i>',
                                    ],
                                ],
                            ],
                            [
                                'label'   => Yii::t('backend', 'Finance'),
                                'url'     => '#',
                                'icon'    => '<i class="fa fa-cubes"></i>',
                                'options' => ['class' => 'treeview'],
                                'items'   => [
                                    ['label' => Yii::t('backend', 'Banking'), 'url' => ['/catalog/product/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                                    ['label' => Yii::t('backend', 'Report'), 'url' => ['/catalog/category/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                                ]
                            ],
                        ]
                    ],
                    /*[
                        'label'   => Yii::t('backend', 'Catalog'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-cubes"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => Yii::t('backend', 'Product'), 'url' => ['/catalog/product/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Category'), 'url' => ['/catalog/category/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],*/
                    /*[
                        'label'   => Yii::t('backend', 'Sale'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-shopping-cart"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => Yii::t('backend', 'Order'), 'url' => ['/sale/order/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Invoice'), 'url' => ['/sale/invoice/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Customer'), 'url' => ['/sale/customer/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'Marketing'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-globe"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => Yii::t('backend', 'Campaign'), 'url' => ['/marketing/campaign/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Mail'), 'url' => ['/marketing/mail/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],*/
                    /*[
                        'label'   => Yii::t('backend', 'Report'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-bar-chart"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => Yii::t('backend', 'Sales'), 'url' => ['/report/sale/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Product'), 'url' => ['/report/product/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Customer'), 'url' => ['/report/customer/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Marketing'), 'url' => ['/report/marketing/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],
                    */
                    [
                        'label'   => Yii::t('backend', 'Service'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-cubes"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => 'Filestack', 'url' => ['/saas/filestack/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Product Create'), 'url' => ['/product/create'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'System'),
                        'options' => ['class' => 'header']
                    ],
                    [
                        'label'   => Yii::t('backend', 'Statistic'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-bar-chart"></i>',
                        'options' => ['class' => 'treeview'],
                        'items'   => [
                            ['label' => Yii::t('backend', 'Ads Chart'), 'url' => ['/report/sale/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Order'), 'url' => ['/report/product/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Customer'), 'url' => ['/report/customer/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'Marketing'), 'url' => ['/report/marketing/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'Users'),
                        'icon'    => '<i class="fa fa-users"></i>',
                        'url'     => ['/user/index'],
                        'visible' => Yii::$app->user->can('administrator')
                    ],
                    [
                        'label'   => Yii::t('backend', 'Other'),
                        'url'     => '#',
                        'icon'    => '<i class="fa fa-cogs"></i>',
                        'options' => ['class' => 'treeview'],
                        'active'  => in_array(Yii::$app->controller->id, ['i18n-source-message', 'i18n-message', 'key-storage', 'file-storage', 'cache', 'file-manager', 'system-information', 'log', 'rbac-auth-assignment', 'rbac-auth-item', 'rbac-auth-item-child', 'rbac-auth-rules']),
                        'items'   => [
                            ['label' => Yii::t('backend', 'Key-Value Storage'), 'url' => ['/system/key-storage/index'], 'icon' => '<i class="fa fa-circle-o"></i>', 'active' => (Yii::$app->controller->id == 'key-storage')],
                            ['label' => Yii::t('backend', 'File Storage'), 'url' => ['/file-storage/index'], 'icon' => '<i class="fa fa-circle-o"></i>', 'active' => (Yii::$app->controller->id == 'storage')],
                            ['label' => Yii::t('backend', 'Cache'), 'url' => ['/system/cache/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            ['label' => Yii::t('backend', 'File Manager'), 'url' => ['/file/manager/index'], 'icon' => '<i class="fa fa-circle-o"></i>'],
                            /*[
                                'label' => Yii::t('backend', 'System Information'),
                                'url'   => ['/system-information/index'],
                                'icon'  => '<i class="fa fa-circle-o"></i>'
                            ],
                            [
                                'label'        => Yii::t('backend', 'Logs'),
                                'url'          => ['/system/log/index'],
                                'icon'         => '<i class="fa fa-circle-o"></i>',
                                'badge'        => SystemLog::find()->count(),
                                'badgeBgClass' => 'label-danger',
                            ],*/
                            [
                                'label'   => Yii::t('backend', 'RBAC Rules'),
                                'url'     => '#',
                                'icon'    => '<i class="fa fa-flag"></i>',
                                'options' => ['class' => 'treeview'],
                                'active'  => in_array(Yii::$app->controller->id, ['rbac-auth-assignment', 'rbac-auth-item', 'rbac-auth-item-child', 'rbac-auth-rule']),
                                'items'   => [
                                    [
                                        'label' => Yii::t('backend', 'Auth Assignment'),
                                        'url'   => ['/rbac/rbac-auth-assignment/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Auth Items'),
                                        'url'   => ['/rbac/rbac-auth-item/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Auth Item Child'),
                                        'url'   => ['/rbac/rbac-auth-item-child/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                    [
                                        'label' => Yii::t('backend', 'Auth Rules'),
                                        'url'   => ['/rbac/rbac-auth-rule/index'],
                                        'icon'  => '<i class="fa fa-circle-o"></i>',
                                    ],
                                ],
                            ],
                        ]
                    ],
                    [
                        'label'   => Yii::t('backend', 'Help Ticket'),
                        'icon'    => '<i class="fa fa-circle-o text-aqua"></i>',
                        'url'     => ['/ticket/index'],
                        'options' => [
                            'class' => 'bg-ticket'
                        ]
                        //'visible' => Yii::$app->user->can('company')
                    ],
                ]
            ]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $this->title ?>
                <?php if (isset($this->params['subtitle'])): ?>
                    <small><?php echo $this->params['subtitle'] ?></small>
                <?php endif; ?>
            </h1>

            <?php echo Breadcrumbs::widget([
                'tag'   => 'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php if (Yii::$app->session->hasFlash('alert')): ?>
                <?php echo Alert::widget([
                    'body'    => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                    'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                ]) ?>
            <?php endif; ?>
            <?php echo $content ?>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <?php echo Yii::powered() ?><?php echo Yii::getVersion() ?>
        </div>
        <strong>Copyright © 2018 <a href="https://yiiframework.com"
                                    target="_blank"><?php echo Yii::$app->name ?></a>.</strong>
        All rights reserved.
    </footer>
</div><!-- ./wrapper -->

<?php $this->endContent(); ?>
