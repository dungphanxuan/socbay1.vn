<?php
/* @var $this yii\web\View */

$this->title = 'Invoice';
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
                <h1>Bảng báo giá sửa chữa</h1>
            </div>
        </div>
        <div class="details clearfix">
            <div class="col-md-6">
                <p><span class="bui">Kính gửi:</span><span>BẢO HIỂM BƯU ĐIỆN BÌNH DƯƠNG</span></p>
                <p><span>Địa chỉ:</span> <span>Bình Dương</span></p>
                <p><span>Điện thoại</span></p>
                <p><span>Chủ xe:</span><span>CTY TNHH BAO BÌ CON ONG XANH</span></p>
            </div>
            <div class="col-md-6">
                <p>Điện thoại: 093202333</p>
            </div>
        </div>
        <div class="details">
            <div class="details box width_50">
                <div class="title-text">
                    <p>Thông tin tiếp nhận</p>
                </div>
                <p><span>Sổ:</span><span>BG0001-2013</span></p>
                <p><span>Ngày:</span><span>26/09/2013</span></p>
                <p><span>Loại dịch vụ:</span><span>Sửa chữa</span></p>
                <p><span>Số km:</span><span>1,000</span></p>
                <p><span>Vào lúc:</span><span>23:36</span></p>
            </div>
            <!--End col-md-6-->
            <div class="details box width_50">
                <div class="title-text">
                    <p>Thông tin xe</p>
                </div>
                <p><span>Số xe:</span><span><b>29L-12345</b></span></p>
                <p><span>Kiểu xe:</span><span>Camry 2.4</span></p>
                <p><span>Năm SX</span><span>2012</span></p>
                <p><span>Màu sơn</span><span>Trắng</span></p>
                <p><span>Số khung</span><span>2933873717</span></p>
            </div>
            <!--End col-md-6-->
        </div>
        <div class="details box">
            <div class="title-text">
                <p>Yêu cầu của khách hàng</p>
            </div>
            <div class="col-md-12">
                <p>SỮA CHỮA</p>
            </div>
        </div>
        <p style="display: block;margin-bottom: 20px;">Theo yêu cầu của quý khách và sau khi xem xét, chúng tôi hân hạnh
            báo giá sửa chữa ước tính như sau: </p>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Mã</th>
                <th>Danh mục</th>
                <th>ĐVT</th>
                <th>Số lượng</th>
                <th>Đơn giá(VNĐ)</th>
                <th>Thành tiền(VNĐ)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7">
                    <p class="left"><b>Phụ tùng</b></p>
                    <p class="right"><b>1,200,000</b></p>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>10473364</td>
                <td>chổi than máy phát</td>
                <td>Bộ</td>
                <td style="text-align: right">2.00</td>
                <td style="text-align: right">237,523</td>
                <td style="text-align: right">475.00</td>
            </tr>
            <tr>
                <td>2</td>
                <td>10473364</td>
                <td>chổi than máy phát</td>
                <td>Bộ</td>
                <td style="text-align: right">2.00</td>
                <td style="text-align: right">237,523</td>
                <td style="text-align: right">475.00</td>
            </tr>
            <tr>
                <td>3</td>
                <td>10473364</td>
                <td>chổi than máy phát</td>
                <td>Bộ</td>
                <td style="text-align: right">2.00</td>
                <td style="text-align: right">237,523</td>
                <td style="text-align: right">475.00</td>
            </tr>
            </tbody>
        </table>
        <div class="no-break has-border">
            <table class="grand-total">
                <tbody>
                <tr>
                    <td>Tổng trước thuế:</td>
                    <td>1,200,000</td>
                </tr>
                <tr>
                    <td>Chiết khấu 10%:</td>
                    <td>121,200</td>
                </tr>
                <tr>
                    <td>Thuế GTGT:</td>
                    <td>109,000</td>
                </tr>
                <tr>
                    <td>Tổng thanh toán:</td>
                    <td>1,300,000</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="details">
            <p><b>Bằng chữ: </b>Một triệu băm trăm nghìn đồng chẵn</p>
            <p class="unlien"><b>Xin lưu ý:</b></p>
            <ul>
                <li>- Những chi phí phát sinh ngoài phần báo giá sẽ được thông báo sau khi tháo rõ trược tiếp</li>
                <li>- Bảng báo giá trên đã bao gồm 10% thuế giá trị gia tăng.</li>
                <li>- Các phần sửa chữa được bảo hành 6 tháng hoặc 10000 km, tùy điều kiện nào đến trước</li>
                <li>- Thu phí 5% trên tổng báo giá</li>
            </ul>
        </div>
    </div>
</section>

<footer>
    <div class="container center">
        <div class="col-md-4">
            <p>Xác nhận khách hàng</p>
            <p>(Ký, họ tên)</p>
        </div>
        <div class="col-md-4">
            <p>Cố vấn dịch vụ</p>
            <p>(Ký, họ tên)</p>
        </div>
        <div class="col-md-4">
            <p>Tư vấn bảo hiểm</p>
            <p>(Ký, họ tên)</p>
        </div>
    </div>
</footer>


