<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WebLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Time Request';
$this->params['breadcrumbs'][] = $this->title;
$searchParams = getParam('WebLogSearch');

?>
<div class="web-log-index">
    <div class="row">
        <div class="col-sm-10">
            <h2>Logtime lượt truy cập vào hệ thống</h2>
        </div>
        <div class="col-sm-2">
            <br>
            <?php echo Html::a('Thống kê', ['chart'], ['class' => 'btn btn-success btn-block']) ?>
            <?php echo Html::a('Clear', ['delete-all'], [
                'class' => 'btn btn-warning btn-block',
                'data' => [
                    'confirm' => "Are you sure you want to delete log?",
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>
    <br>
    <?php Pjax::begin(['id' => 'datas', 'timeout' => 3000, 'scrollTo' => 0]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'grid-view table-responsive'],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover'
        ],
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
                'filterInputOptions' => [
                    'class' => 'form-control',
                ]
            ],
            [
                'attribute' => 'type',
                'filterInputOptions' => [
                    'class' => 'form-control',
                ],
                'value' => function ($model) {
                    if ($model->type == 1) {
                        return 'Backend';
                    }

                    return 'Frontend';
                },
                'filter' => [1 => 'Backend', 2 => 'Frontend']
            ],
            [
                'attribute' => 'user_ip',
                'filterInputOptions' => [
                    'class' => 'form-control',
                ]
            ],
            [
                'attribute' => 'action',
                'filterInputOptions' => [
                    'class' => 'form-control',
                ]
            ],
            [
                'attribute' => 'execute_time',
                'value' => function ($model) {
                    return $model->execute_time * 1000;
                },
            ],
            [
                'attribute' => 'time',
                'format' => 'datetime',
                'filterInputOptions' => [
                    'class' => 'form-control',
                ],
                'filter' => \yii\jui\DatePicker::widget([
                    'name' => 'WebLogSearch[time]',
                    'language' => 'vi',
                    'dateFormat' => 'yyyy-MM-dd',
                    'value' => $searchParams['time'],
                    'options' => ['class' => 'form-control', 'placeholder' => 'Log Time',],

                    'id' => 'weblogsearch-time'
                ]),
            ],
            [
                'class' => 'backend\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
