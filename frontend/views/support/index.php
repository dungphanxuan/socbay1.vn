<?php

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */


$this->title = 'Hỗ trợ';

$this->registerCssFile("@web/frontend/web/classified/assets/css/page/style-page.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::class],
]);
?>
    <div class="search-box-support">
        <div class="container">
            <div class="title-support">
                <i class="fa  fa-life-ring""></i>
                <h3><?php echo Yii::t('ads', 'Bạn cần trợ giúp?') ?></h3>
                <p><?php echo Yii::t('ads', 'Mô tả vấn đền bạn gặp phải cần hỗ trợ') ?></p>
            </div>
            <!--End: title-->
            <div class="box-search">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'method' => 'get',
                    'options' => ['class' => 'search'],
                ]) ?>
                <input type="text" class="form-control" name="title"
                       placeholder="<?php echo Yii::t('ads', 'Hướng dẫn đăng tin') ?>">
                <button type="submit" class="btn btn-info btn-search"><?php echo Yii::t('ads', 'Search') ?></button>
                <?php ActiveForm::end() ?>
            </div>
            <!--End:box-search-->
        </div>
        <!--End: container-->
    </div>
    <!--End: search box support-->
    <div class="wrap-item-content">
        <div class="container">
            <h4 class="title-text"><?php echo Yii::t('ads', 'Browse by topic') ?></h4>
            <div class="row">
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-file"></i>
                        </div>
                        <p><b>Tasks and Projects</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-cog"></i>
                        </div>
                        <p><b>Account settings</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <p><b>Billing information</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-user"></i>
                        </div>
                        <p><b>Users and coworkers</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-cloud-upload"></i>
                        </div>
                        <p><b>Advanced options</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-pencil-square-o"></i>
                        </div>
                        <p><b>Customize this template</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-mobile"></i>
                        </div>
                        <p><b>Mobile</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-search"></i>
                        </div>
                        <p><b>Search & Discussions</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo Url::to(['/support/topic']) ?>" title="title">
                        <div>
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <p><b>Reports & Clients</b></p>
                    </a>
                    <p>Learn how to change tasks and assign projects to all your teammates</p>
                </div>
            </div>
        </div>
        <!--End: container-->
    </div>
    <!--End: wrap item content-->

<?php
$app_css = <<<CSS
.navbar-brand.logo {
     padding-top: 20px !important; 
}
CSS;

//$this->registerCss($app_css);

