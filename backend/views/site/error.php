<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper error">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> <?php echo property_exists($exception, 'statusCode') ? $exception->statusCode : 500 ?></h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! <?php echo nl2br(Html::encode($message)) ?>.</h3>

                <p>
                    Nội dung trang không được tìm thấy.
                    Bạn có thể truy cập <a href="<?php echo Url::to(['/site/dashboard']) ?>">trang dashboard</a> hoặc
                    tìm kiếm
                    bên dưới.
                </p>

                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'search-form'],
                ]) ?>
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm nhanh...">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i
                                    class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
                <?php ActiveForm::end() ?>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
