<?php

use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/13/2017
 * Time: 8:40 AM
 */

/* @var $this yii\web\View */
?>
<div class="card sidebar-panel">
    <div class="card-header">Mẹo an toàn cho người mua</div>
    <div class="card-content">
        <div class="card-body text-left">
            <ul class="list-check">
                <li>Gặp và xem mặt hàng ở nơi công cộng</li>
                <li>Kiểm tra mặt hàng trước khi mua</li>
                <li>Chỉ thanh toán khi nhận được mặt hàng</li>
            </ul>
            <p style="text-align: center">
                <a href="<?php echo Url::to(['/page/faq']) ?>"> Tìm hiểu thêm <i class="fa fa-angle-double-right"></i>
                </a>
            </p>
        </div>
    </div>
</div>
