<?php

use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/8/2017
 * Time: 11:39 AM
 */
/* @var $this \yii\web\View */
?>
<div class="reg-sidebar-inner text-center">
    <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>
        <h3><strong><?php echo Yii::t('ads', 'Post a Free Classified') ?></strong></h3>
        <p> <?php echo Yii::t('ads', 'Sell your products online FOR FREE. It\'s easier than you think !') ?> </p>
    </div>
    <div class="panel sidebar-panel">
        <div class="panel-heading uppercase">
            <small><strong><?php echo Yii::t('ads', 'How to sell quickly?') ?></strong></small>
        </div>
        <div class="panel-content">
            <div class="panel-body text-left">
                <ul class="list-check">
                    <li> Sử dụng tiêu đề và mô tả ngắn gọn của mặt hàng</li>
                    <li> Chọn đúng danh mục của mặt hàng</li>
                    <li> Thêm vài ảnh vào mặt hàng</li>
                    <li> Đặt một mức giá hợp lý</li>
                    <li> Kiểm tra mặt hàng trước khi xuất bản</li>
                </ul>
                <p style="text-align: center">
                    <a class="float-right"
                       href="<?php echo Url::to(['/page/faq']) ?>"> <?php echo Yii::t('common', 'View more') ?> <i
                                class="fa fa-angle-double-right"></i> </a>
                </p>
            </div>
        </div>
    </div>
</div>
