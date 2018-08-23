<?php
/* @var $this yii\web\View */

$this->title = 'Template Invoice';

$this->registerCssFile(
    '@web/web/preview/css/template.css'
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
                    <h1>Phiếu xuất chuyển kho</h1>
                </div>
            </div>
            <div class="details clearfix">
                <div class="client left">
                    <p>Diễn giải: Nhập kho lô hàng mua ngày 28/01/2018</p>
                    <p>Người vận chuyển: Nguyễn Xuân Hùng</p>
                </div>
                <div class="data right">
                    <p>Ngày: 02/02/2018</p>
                    <p>Số: CK00002</p>
                </div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0" class="table">
                <thead>
                <tr>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th>Nhóm hàng</th>
                    <th>HSX</th>
                    <th>Kho hàng</th>
                    <th>Trạng thái</th>
                    <th>ĐVT</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Chiết khấu</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>Sản phẩm <?= $i ?></td>
                        <td>Nhóm <?= $i ?></td>
                        <td>HSX1</td>
                        <td>Kho hàng <?= $i ?></td>
                        <td>Còn hàng</td>
                        <td>Lần</td>
                        <td>1.000.000</td>
                        <td>1</td>
                        <td>0</td>
                        <td>1.000.000</td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <div class="no-break">
                <table class="grand-total">
                    <tbody>
                    <tr>
                        <td>Tổng tiền hàng:</td>
                        <td>$5,200.00</td>
                    </tr>
                    <tr>
                        <td>Thuế VAT:</td>
                        <td>$1,300.00</td>
                    </tr>
                    <tr>
                        <td>Chiết khấu/Khuyến mãi:</td>
                        <td>$1,300.00</td>
                    </tr>
                    <tr>
                        <td>Tổng tiền thanh toán:</td>
                        <td>$6,500.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <footer>
        <div class="container center">
            <div class="col-md-3">
                <p>Người lập phiếu</p>
                <p>(Ký, họ tên)</p>
            </div>
            <div class="col-md-3">
                <p>Thủ kho xuất</p>
                <p>(Ký, họ tên)</p>
            </div>
            <div class="col-md-3">
                <p>Người vận chuyển</p>
                <p>(Ký, họ tên)</p>
            </div>
            <div class="col-md-3">
                <p>Thủ kho nhập</p>
                <p>(Ký, họ tên)</p>
            </div>
        </div>
    </footer>

<?php
$app_css = <<<CSS
@media (min-width: 1200px){
.container {
    max-width: 1240px;
}
}
CSS;
$this->registerCss($app_css);
