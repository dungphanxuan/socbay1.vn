<?php
/* @var $this yii\web\View */

$this->registerCssFile(
    '@web/web/preview/gara/style.css'
);
?>
<section>
    <div class="container">
        <form>
            <input type="button" value="Print" onclick="window.print()"/>
        </form>
        <div class="details clearfix">
            <p><b>Công ty CP Thiết bị Tân Phát | Địa chỉ: 168 Phan Trọng Tuệ, Thanh Liệt, Thanh Trì, Hà Nội</b></p>
            <p><b>Điện thoại: 0473 006 345 | Email: <a href="mailto:sale@tanphat.com" style="color: #0b6ac8;">sale@tanphat.com</a>
                    | Website: tanphat.com</b></p>
            <p><b>Số TK: 04324803243 tại Ngân hàng CPTM Vietcombank | MST: 07324545</b></p>
        </div>
        <div class="details clearfix">
            <div class="center">
                <h1 style="margin-bottom: 20px;">Báo cáo hàng tồn kho</h1>
                <p>Tháng 3 năm 2017</p>
                <p>Mặt hàng: Đèn pha Honda Civic 1.8 2017</p>
            </div>
        </div>
        <p style="margin-bottom: 10px;"><b>Thông tin hàng tồn kho</b></p>
        <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;" class="center">
            <thead>
            <tr>
                <th>Mã</th>
                <th>Tên kho</th>
                <th>Số lượng</th>
                <th>Đơn vị tính</th>
                <th>Giá trị</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>10</td>
                <td>Kho Hà Nội</td>
                <td>31</td>
                <td>Cái</td>
                <td>38.130.000</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Kho Đông Anh</td>
                <td>31</td>
                <td>Cái</td>
                <td>38.130.000</td>
            </tr>
            <tr class="bold">
                <td colspan="2">Tổng</td>
                <td>62</td>
                <td colspan="2" style="text-align: right;">76.260.000</td>
            </tr>
            </tbody>
        </table>

    </div>
</section>

<footer>
    <div class="container center">
        <div class="col-md-3">
            <p>Người lập</p>
            <p>(Ký, họ tên)</p>
        </div>
        <div class="col-md-3">
            <p>Thủ kho</p>
            <p>(Ký, họ tên)</p>
        </div>
        <div class="col-md-3">
            <p>Kế toán trưởng</p>
            <p>(Ký, họ tên)</p>
        </div>
        <div class="col-md-3">
            <p>Trưởng đơn vị</p>
            <p>(Ký, họ tên)</p>
        </div>
    </div>
</footer>


