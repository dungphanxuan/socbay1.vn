<?php

use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = 'Alert';

\common\assets\MithrilJs::register($this);
?>
    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
                <h1 class="text-center title-1"> MithrilJS </h1>
                <hr class="mx-auto small text-hr">

                <div style="clear:both">
                    <hr>
                </div>
                <div class="col-xl-12">
                    <div class="white-box text-center" style="min-height: 400px">
                        <p>Content Goes Here</p>
                        <button class="btn btn-success" id="alert">Alert</button>
                        <div id="output2">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
$app_js = <<<JS
var root = document.getElementById("output2");

m.render(root, m('h1', 'Hello World'))
JS;
$this->registerJs($app_js);