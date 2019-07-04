<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\media\Media */
/* @var $dataProvider */
/* @var $dataProvider1 */

$this->title = 'Media Export';
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    'id',
    'title',
    'episode',
    'view_count',
    //'slug',
    //'body',
    'thumbnail_base_url',
    'thumbnail_path',
    'status',


    'created_at',
    'created_at:date',
];
?>
<div class="media-view">

    <div class="row">
        <div class="col-md-12">
            <h3>Click vào Icon Export và chọn định dạng để xuất dữ liệu</h3>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h3>Export All</h3>
            <div class="text-center">
                <?php
                echo ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $gridColumns,
                    'fontAwesome' => true,
                ]);
                ?>
            </div>

        </div>
    </div>

</div>