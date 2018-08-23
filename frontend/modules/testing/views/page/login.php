<?php

use yii\helpers\Url;

?>

<div class="main-container inner-page">
    <div class="container">
        <div class="row clearfix">
            <h1 class="text-center title-1"> Page Title </h1>
            <hr class="mx-auto small text-hr">

            <div style="clear:both">
                <hr>
            </div>
            <div class="col-xl-12">
                <div class="white-box text-center" style="min-height: 400px">
                    <p>Content Goes Here</p>
                    <a href="<?= Url::to(['/user/sign-in/oauth', 'authclient' => 'facebook']) ?>"
                       data-popup-width="860" data-popup-height="480">Đăng nhập</a>

                </div>
            </div>

        </div>
    </div>
</div>
