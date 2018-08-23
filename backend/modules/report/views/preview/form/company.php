<?php
/* @var $this yii\web\View */
$this->title = "THÔNG TIN DOANH NGHIỆP";
?>
<div class="page-body">
    <div class="widget-body">
        <div class="form-title">
            <b>Thông tin chung</b>
        </div>
        <!--End form title-->
        <div class="registration-form">
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Tên đơn vị:</label>
                </div>
                <div class="col-sm-10">
                    <div class="form-group width-col-two">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-2" style="text-align: right;">
                    <label>Mã số thuế:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group width-col-two">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-8">
                    <span>(Mã đơn vị do cơ quan BHXH cấp cho đơn vị)</span>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Địa chỉ:</label>
                </div>
                <div class="col-sm-10">
                    <div class="form-group width-col-two">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Tỉnh/TP trực thuộc TW:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group width-col-two">
                        <select class="form-control input-sm">
                            <option>Hà Nội</option>
                            <option>Hà Nam</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2" style="text-align: right;">
                    <label>Quận/huyện:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group width-col-two">
                        <select class="form-control input-sm">
                            <option>Hà Nội</option>
                            <option>Hà Nam</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2" style="text-align: right;">
                    <label>Phường/xã:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group width-col-two">
                        <select class="form-control input-sm">
                            <option>Hà Nội</option>
                            <option>Hà Nam</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Di Động:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <label>Fax:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <label>Email:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Số tài khoản:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <label>Nơi mở tài khoản:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Loại hình kinh doanh:</label>
                </div>
                <div class="col-sm-10">
                    <div class="form-group width-col-two">
                <span>
                    <select class="form-control input-sm">
                        <option>2</option>
                        <option>1</option>
                    </select>
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <form method="post">
                <span>
                    <input type="checkbox" name="selection[]" value="3"
                           style="opacity: 1;position: relative;top: 5px;left: 0px;margin-bottom: 20px;">
                </span>
                        <span>
                    Kinh doanh trong khu kinh tế
                </span>
                    </form>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Người ký hồ sơ:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <label>Chức danh:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="form-title">
                <b>Thông tin giao dịch với cơ quan BHXH</b>
            </div>
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Tỉnh/tp:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <select class="form-control input-sm">
                        <option>Hà Nội</option>
                        <option>Hà Nam</option>
                    </select>
                </span>
                    </div>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <label>Cơ quan quản lý BHXH:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <select class="form-control input-sm">
                        <option>Cơ quan 1</option>
                        <option>Cơ quan 2</option>
                    </select>
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Email:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <label>Điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="form-title">
                <b>Thông tin người liên hệ</b>
            </div>
            <div class="row">
                <div class="col-sm-2" style="text-align: right;">
                    <label>Người liên hệ:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-2" style="text-align: right;">
                    <label>Điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
                <div class="col-sm-2" style="text-align: right;">
                    <label>Email:</label>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                <span>
                    <input type="text" class="form-control input-sm">
                </span>
                    </div>
                </div>
            </div>
            <!--End row-->
        </div>
        <!--End resgister form-->
        <div id="html5Form" class="form-horizontal">
            <div class="form-group has-feedback">
                <div class="col-lg-12 text-right">
                    <button type="submit" class="btn btn-palegreen">Lưu và thêm mới</button>
                    <a href="/backend/customer/index?type=2" type="submit" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </div>
    </div>
</div>
