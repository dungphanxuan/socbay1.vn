<?php

use yii\grid\GridView;
use yii\helpers\Html;
use common\grid\EnumColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Article Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a(Yii::t('common', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
            <?php echo Html::a('<i class="fa fa-bar-chart" aria-hidden="true"></i> Chart', ['chart', 'object_id' => getParam('object_id')], ['class' => 'btn btn-info']) ?>
            <?php echo Html::a('<i class="fa fa-file-code-o" aria-hidden="true"></i> Export', ['export', 'object_id' => getParam('object_id')], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>

    <div class="clearfix"></div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'pager' => [
            'maxButtonCount' => 15,
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            [
                'attribute' => 'id',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            'slug',
            'title',
            [
                'class' => EnumColumn::class,
                'attribute' => 'status',
                'enum' => [
                    Yii::t('backend', 'Not Published'),
                    Yii::t('backend', 'Published')
                ]
            ],

            [
                'class' => 'backend\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
