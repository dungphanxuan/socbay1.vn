<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $dataProvider */
/* @var $dataProvider1 */

$this->title = Yii::t('common', 'Article Export');
$this->params['breadcrumbs'][] = ['label' => 'Article', 'url' => ['index']];
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    'id',
    'title',
    'slug',
    'category_id',
    'view_count',
    'thumbnail_base_url',
    'thumbnail_path',
    'status',
    //'body',

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