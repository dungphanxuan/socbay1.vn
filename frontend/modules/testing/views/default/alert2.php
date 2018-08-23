<?php

use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = 'Alert';

\common\assets\SweetAlert2Asset::register($this);
?>
    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
                <h1 class="text-center title-1"> Sweet Alert </h1>
                <hr class="mx-auto small text-hr">

                <div style="clear:both">
                    <hr>
                </div>
                <div class="col-xl-12">
                    <div class="white-box text-center" style="min-height: 400px">
                        <p>Content Goes Here</p>
                        <button class="btn btn-success" id="alert">Alert</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
$app_js = <<<JS
$( "#alert" ).click(function() {
  swal("Good job!", "You clicked the button!", "success");
});
JS;


$this->registerJs($app_js);