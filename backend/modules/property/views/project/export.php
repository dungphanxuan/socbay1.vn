<?php

use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $model \common\models\property\Project */
/* @var $dataProvider */
/* @var $dataProvider1 */

$this->title = 'Media Export';
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    'id',
    'title',
    //'slug',
    //'body',
    [
        'attribute' => 'district_id',
        'value' => function ($model) {
            return $model->district ? $model->district->name : null;
        },
    ],
    [
        'attribute' => 'type',
        'format' => 'raw',
        'filter' => [1 => 'Cho thuê', 2 => 'Mua bán'],
        'value' => function ($model) {
            $showText = $model->type != 2 ? 'Cho thuê' : 'Mua bán';

            return $showText;
        },
        'headerOptions' => ['style' => 'text-align:center'],
        'contentOptions' => ['style' => 'width:10%;text-align:center'],
    ],

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