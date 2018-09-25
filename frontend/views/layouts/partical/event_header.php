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
    <nav class="navbar navbar-site navbar-light navbar-bodered bg-light navbar-expand-md"
         role="navigation">
        <div class="container">

            <div class="navbar-identity">


                <a href="<?php echo Url::home()?>" class="navbar-brand logo logo-title">
    			<span class="logo-icon"><i class="icon  icon-calendar-1 ln-shadow-logo "></i>
    			</span>EVENT<span>CLASSIFIED </span> </a>


                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
                        type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>


                </button>


                <button
                        class="flag-menu country-flag d-block d-md-none btn btn-secondary hidden pull-right"
                        href="#select-country" data-toggle="modal">	<span class="flag-icon flag-icon-us"></span>  <span class="caret"></span>
                </button>

            </div>


            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">

                    <li class="nav-item"><a class="nav-link" href="event-category.html">Browse Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Host Event</a></li>

                </ul>
                <ul class="nav navbar-nav ml-auto navbar-right">

                    <li class="dropdown no-arrow nav-item"><a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                            <span>Jhon Doe</span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                        <ul class="dropdown-menu user-menu dropdown-menu-right">
                            <li class="active dropdown-item"><a href="account-home.html"><i class="icon-home"></i> Personal Home

                                </a>
                            </li>
                            <li class="dropdown-item"><a href="account-myads.html"><i class="icon-th-thumb"></i> My ads </a>
                            </li>
                            <li class="dropdown-item"><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a>
                            </li>
                            <li class="dropdown-item"><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search

                                </a>
                            </li>
                            <li class="dropdown-item"><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads

                                </a>
                            </li>
                            <li class="dropdown-item"><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending

                                    approval </a>
                            </li>
                            <li class="dropdown-item"><a href="statements.html"><i class=" icon-money "></i> Payment history </a>
                            </li>
                            <li class="dropdown-item"><a href="login.html"><i class=" icon-logout "></i> Log out </a>
                            </li>
                        </ul>
                    </li>

                    <li class="postadd nav-item">
                        <a class="btn btn-block   btn-border btn-post btn-success nav-link" href="job-post.html">Create Event</a>
                    </li>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
<!-- /.header -->