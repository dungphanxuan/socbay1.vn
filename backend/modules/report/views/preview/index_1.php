<?php

use backend\assets_b\PreviewAsset;

/* @var $this yii\web\View */
$this->title = 'Preview Example';
$bundle = PreviewAsset::register($this);

//$this->registerCssFile('@web/web/preview/css/style.css');
?>
<button class="btn btn-info">Ok</button>
<div class="container">
    <div class="row">
        <div class="col-xs-6">a</div>
        <div class="col-xs-6">a</div>
    </div>
</div>
<h2>Striped Rows</h2>
<table class="table">
    <thead>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
    </tr>
    <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
    </tr>
    <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
    </tr>
    </tbody>
</table>
<h1 class="bg-info =">OK</h1>
