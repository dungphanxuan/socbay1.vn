<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\dictionaries\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\job\JobCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Categories';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];

?>
<div class="job-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Create Job Category', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="clearfix"></div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
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
            'slug',
            'parent_id',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'total_article',
            // 'sort_number',
            // 'type',
            [
                'class' => \common\grid\EnumColumn::class,
                'attribute' => 'status',
                'format' => 'raw',
                'options' => ['style' => 'width: 10%'],
                'enum' => Status::all(),
                'filter' => Status::all(),
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            [
                'attribute' => 'created_at',
                'format' => 'date',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            // 'updated_at',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
