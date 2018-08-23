<?php

use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/27/2017
 * Time: 3:33 PM
 */
/* @var $this yii\web\View */
?>

<ul class="dropdown-menu user-menu dropdown-menu-right">

    <li class="active dropdown-item">
        <a href="<?php echo Url::to(['/user/default/index']) ?>">
            <i class="icon-home"></i> Trang cá nhân
        </a>
    </li>
    <li class="dropdown-item">
        <a href="<?php echo Url::to(['/account/ads']) ?>">
            <i class="icon-th-thumb"></i> Tin của bạn </a>
    </li>
    <li class="dropdown-item">
        <a href="<?php echo Url::to(['/account/favourite']) ?>">
            <i class="icon-heart"></i> Tin ưu thích </a>
    </li>
    <li class="dropdown-item">
        <a href="<?php echo Url::to(['/account/saved']) ?>">
            <i class="icon-star-circled"></i> Lưu tìm kiếm</a>
    </li>
    <li class="dropdown-item">
        <a href="<?php echo Url::to(['/account/archived']) ?>">
            <i class="icon-folder-close"></i> Tin lưu trữ</a>
    </li>
    <li class="dropdown-item">
        <a href="<?php echo Url::to(['/account/pending']) ?>">
            <i class="icon-hourglass"></i> Chờ duyệt </a>
    </li>
    <li class="dropdown-item">
        <a href="<?php echo Url::to(['/account/statements']) ?>">
            <i class=" icon-money "></i> Lịch sử </a>
    </li>
    <li class="dropdown-item">
        <a href="<?php echo Url::to(['/user/sign-in/logout']) ?>" data-method="post">
            <i class=" icon-logout "></i>Đăng xuất
        </a>
    </li>
</ul>
