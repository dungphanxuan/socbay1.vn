<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\property\ProjectPickupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dự án nổi bật';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-pickup-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="pull-right">
        <p>
            <?php echo Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="clearfix"></div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'contentOptions' => ['style' => 'text-align:center'],
                'headerOptions' => ['style' => 'text-align:center; width:5%;'],
            ],

            [
                'attribute' => 'id',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            [
                'attribute' => 'project_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->project ? $model->project->title : '', [
                        'update',
                        'id' => $model->id
                    ]);
                },
            ],
            [
                'attribute' => 'lang_id',
                'format' => 'raw',
                'filter' => [1 => 'Tiếng Việt', 2 => 'Tiếng Anh'],
                'value' => function ($model) {
                    $iconName = $model->lang_id != 2 ? 'vn' : 'en';

                    return Html::img('@web/web/img/i-' . $iconName . '.png', ['class' => 'imageh20']);
                },
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            [
                'attribute' => 'sort_number',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:15%;text-align:center'],
            ],

            [
                'class' => 'backend\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions' => ['style' => 'width:15%;text-align:center'],
            ],
        ],
    ]); ?>

</div>
