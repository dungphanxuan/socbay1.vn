<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\media\MediaCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="clearfix"></div>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'parent_id',
            // 'key',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'thumbnail_base_url_data:url',
            // 'thumbnail_path_data',
            // 'type',
            'status',
            // 'sort_number',
            'created_at:date',
            // 'updated_at',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
