<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\ads\support\SupportTopicCategory;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ads\support\SupportTopicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support Topics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-topic-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Create New', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="clearfix"></div>
    <br>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [
                'class'           => 'yii\grid\CheckboxColumn',
                'headerOptions'   => ['style' => 'width:3%;text-align:center'],
                'contentOptions'  => ['style' => 'width:3%;text-align:center'],
                'checkboxOptions' => [
                    'class' => 'select-item'
                ]
            ],
            [
                'attribute'      => 'id',
                'format'         => 'raw',
                'headerOptions'  => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            'title',
            //'view',
            [
                'attribute' => 'category_id',
                'value'     => function ($model) {
                    return $model->category ? $model->category->title : null;
                },
                'filter'    => ArrayHelper::map(SupportTopicCategory::find()->all(), 'id', 'title')
            ],
            // 'category_id',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'total_votes',
            // 'up_votes',
            // 'rating',
            // 'featured',
            // 'comment_count',
            'view_count',
            // 'sort_number',
            [
                'class'          => \common\grid\EnumColumn::class,
                'attribute'      => 'status',
                'format'         => 'raw',
                'enum'           => [
                    Yii::t('backend', 'Not Published'),
                    Yii::t('backend', 'Published'),
                    Yii::t('backend', 'Deleted')
                ],
                'headerOptions'  => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            // 'created_by',
            // 'updated_by',
            // 'published_at',
            'created_at:date',
            // 'updated_at',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
