<?php

use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = 'Currentcy format';
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
                        <p class="number">50000000</p>
                        <p class="number">60000000</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
$app_js = <<<JS

Number.prototype.formatMoney = function(c, d, t){
    var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
var num = 5000000;

$('.number').each(function() {
    value =  $( this ).text() ;
    console.log(value);
    var a = ((parseFloat(value)).formatMoney(0, ',', '.') + ' đ');
    $( this ).text(a) ;
    
});
JS;

$this->registerJs($app_js);
