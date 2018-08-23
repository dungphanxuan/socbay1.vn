<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/25/2017
 * Time: 9:29 AM
 */
?>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="<?php echo Url::to(['/article/index']) ?>"><span class="info-box-icon bg-aqua"><i
                            class="ion ion-ios-gear-outline"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text">Article</span>
                <span class="info-box-number"><?php echo $arrData['article'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="<?php echo Url::to(['/article/index']) ?>"><span class="info-box-icon bg-red"><i
                            class="fa fa-google-plus"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="<?php echo Url::to(['/article/index']) ?>"><span class="info-box-icon bg-green"><i
                            class="ion ion-ios-cart-outline"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="<?php echo Url::to(['/user/index']) ?>"><span class="info-box-icon bg-yellow"><i
                            class="ion ion-ios-people-outline"></i></span></a>

            <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number"><?php echo $arrData['user'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
