<?php
/* @var $this yii\web\View */

$this->registerCssFile(
    '@web/web/preview/gara/style.css'
);
?>
<section>
    <div class="container">
        <div class="details clearfix">
            <div class="client left">
                <p>Gara Ô Tô Việt</p>
                <p>Duy Tân, Cầu Giấy, Hà Nội</p>
            </div>
        </div>
        <div class="details clearfix">
            <div class="center">
                <h1>Phiếu kiểm tra xe</h1>
            </div>
        </div>
        <div class="details clearfix box">
            <div class="title-text">
                <p>Thông tin xe</p>
            </div>
            <div class="col-md-6">
                <p><span>Số xe</span><span class="bold">29P-12345</span></p>
                <p><span>Kiểu xe</span><span>Camry 2.4</span></p>
                <p><span>Số khung</span><span>293383717</span></p>
                <p><span>Màu sơn</span><span>Trắng</span></p>
                <p><span>Năm SX</span><span>2012</span></p>
            </div>
            <div class="col-md-6">
                <p>Model</p>
                <p><span>Số máy</span><span>02003827</span></p>
                <p><span>Vào lúc</span><span>23:26 02/02/2018</span></p>
                <p><span>Số km</span><span>1,000</span></p>
            </div>
        </div>
        <div class="details box">
            <div class="title-text">
                <p>Yêu cầu của khách hàng</p>
            </div>
            <div class="col-md-12">
                <p>SỮA CHỮA</p>
            </div>
        </div>
        <div class="details">
            <p class="unlien bold">Nội dung yêu cầu:</p>
            <div class="col-md-6">
                <p>Thời gian bắt đầu sửa: <span>......................................................</span></p>
            </div>
            <div class="col-md-6">
                <p>Thời gian kết thúc sửa: <span>........................................................</span></p>
            </div>
        </div>
        <table class="center" border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th class="stt">STT</th>
                <th>Nội dung kiểm tra</th>
                <th>Tình trạng(%)</th>
                <th>KTV nhận xét</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                ?>
                <tr>
                    <td class="stt"><?= $i ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="box-space-10">
            <div class="col-md-3">
                <p>Thông tin</p>
            </div>
            <div class="col-md-3">
                <p><input type="checkbox" class="colored-success">KH chờ nhận xe</p>
            </div>
            <div class="col-md-3">
                <p><input type="checkbox" class="colored-success">KH không chờ nhận xe</p>
            </div>
            <div class="col-md-3">
                <p><input type="checkbox" class="colored-success">KH lấy phụ tùng cữ</p>
            </div>
        </div>
        <div class="details box bold">
            <div class="title-text">
                <p>Chú ý:</p>
            </div>
            <div class="col-md-3">
                <p>10% - 30%: Nên thay mới</p>
            </div>
            <div class="col-md-3">
                <p>30% - 50%: Gia công, thay mới</p>
            </div>
            <div class="col-md-3">
                <p>50% - 70%: Nên lưu ý</p>
            </div>
            <div class="col-md-3">
                <p>70% - 100%: Tình trạng tốt</p>
            </div>
        </div>
        <!--End details-->
    </div>
</section>

<footer>
    <div class="container center">
        <div class="col-md-4">
            <p>Người viên báo giá</p>
            <p>(Ký, họ tên)</p>
        </div>
        <div class="col-md-4">
            <p>Thủ sửa chữa</p>
            <p>(Ký, họ tên)</p>
        </div>
        <div class="col-md-4">
            <p>Quán đốc</p>
            <p>(Ký, họ tên)</p>
        </div>
    </div>
</footer>


