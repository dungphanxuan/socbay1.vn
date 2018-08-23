<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="main-container inner-page">
    <div class="container">
        <div class="row clearfix">
            <h1 class="text-center title-1"> <?php echo Html::encode($this->title) ?> </h1>
            <hr class="mx-auto small text-hr">

            <div style="clear:both">
                <hr>
            </div>
            <div class="col-xl-12">
                <div class="white-box text-center" style="min-height: 400px">
                    <div class="alert alert-danger">
                        <?php echo nl2br(Html::encode($message)) ?>
                    </div>

                    <p>
                        Yêu cầu của bạn hệ thống chưa kịp xử lí hoặc nội dung không tìm thấy!
                    </p>
                    <p>
                        Vui lòng <a href="<?php echo \yii\helpers\Url::to(['/site/contact']) ?>">liên hệ</a> với chúng
                        tôi nếu
                        bạn cho rằng đây là lỗi máy chủ. Cảm ơn bạn.
                    </p>
                </div>
            </div>


        </div>
    </div>
</div>
