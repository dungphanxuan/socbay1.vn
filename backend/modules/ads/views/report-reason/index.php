<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ads\ReportReasonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Reasons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-reason-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Create Report Reason', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="clearfix"></div>

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
            // 'type',
            'status',
            // 'sort_number',
            'created_at:datetime',
            // 'updated_at',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
