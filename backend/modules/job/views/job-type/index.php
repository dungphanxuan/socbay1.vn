<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\dictionaries\Status;

/* @var $this yii\web\View */
/* @var $searchModel common\models\job\JobTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Types';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>
<div class="job-type-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>


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
            [
                'class'          => \common\grid\EnumColumn::class,
                'attribute'      => 'status',
                'format'         => 'raw',
                'options'        => ['style' => 'width: 10%'],
                'enum'           => Status::all(),
                'filter'         => Status::all(),
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            //'type',
            'sort_number',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
