<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Vietnam Location Module'
?>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">City</span>
                <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">District</span>
                <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Ward</span>
                <span class="info-box-number">13,648</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<div class="go-default-index">
    <h1><?php echo $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?php echo $this->context->action->id ?>".
        The action belongs to the controller "<?php echo get_class($this->context) ?>"
        in the "<?php echo $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?php echo __FILE__ ?></code>
    </p>
</div>
