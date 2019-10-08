<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\property\ProjectCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="clearfix">
    </div>
    <br>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => ['style' => 'width:3%;text-align:center'],
                'contentOptions' => ['style' => 'width:3%;text-align:center'],
                'checkboxOptions' => [
                    'class' => 'select-item'
                ]
            ],
            [
                'attribute' => 'id',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            'title',
            'parent_id',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'total',
            'sort_number',
            // 'type',
            'status',
            'created_at',
            // 'updated_at',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
