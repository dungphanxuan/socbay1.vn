<?php
/* @var $this yii\web\View */

$this->title = 'Lịch sử giao dịch';
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 page-sidebar">
                <?php echo $this->render('_menu', []) ?>
            </div>

            <div class="col-sm-9 page-content">
                <div class="inner-box">
                    <h2 class="title-2"><i class="icon-money"></i> Xem lịch sử giao dịch </h2>
                    <div style="clear:both"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><span> ID</span></th>
                                <th>Mô tả</th>
                                <th><strong>Hình thức</strong></th>
                                <th> Giá trị</th>
                                <th> Ngày</th>
                                <th> Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#01PA</td>
                                <td> Ad Fees - Pay for a single ad <br>
                                    <strong>Ads Type</strong> Premium <br>
                                    <strong>Ads Duration</strong> 30 Days
                                </td>
                                <td>Paid by Mastercard <br> MasterCard. 52008282XXXX
                                </td>
                                <td>$40</td>
                                <td>02/21/2018 08:56</td>
                                <td><span class="badge badge-success">Done</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>

    </div>

</div>
