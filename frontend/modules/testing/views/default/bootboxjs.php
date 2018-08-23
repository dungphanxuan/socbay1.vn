<?php

use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */

\common\assets\Bootbox::register($this);
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
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
$app_js = <<<JS
bootbox.confirm("This is the default confirm!", function(result){ console.log('This was logged in the callback: ' + result); });
JS;

$this->registerJs($app_js);