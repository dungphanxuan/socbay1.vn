<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/16/2018
 * Time: 11:32 AM
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<?php echo \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
    'layout' => "{summary}\n{items}",
    'pager' => [
        'linkOptions' => [
            'class' => 'pager-item'
        ]
    ],
    'tableOptions' => [
        'class' => 'table table-striped table-hover table-search'
    ],
    'columns' => [

        [
            'attribute' => 'id',
            'format' => 'raw',
            'headerOptions' => ['style' => 'text-align:center'],
            'contentOptions' => ['style' => 'width:10%;text-align:center'],
        ],
        'title',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{choose}',
            'contentOptions' => ['style' => 'width:10%;text-align:center'],
            'buttons' => [
                //view button
                'choose' => function ($url, $model) {
                    return Html::a('Chọn', $url, [
                        'title' => 'Chọn',
                        'class' => 'btn btn-primary btn-sm btn-callback w80',
                        'data-company_id' => $model->id,
                        'data-company_name' => $model->title,
                    ]);
                },
            ],
        ]

    ]
]);
?>
<div class="pagination-bar text-center">
    <nav aria-label="Page navigation " class="d-inline-b">
        <?php
        echo \frontend\widgets\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ]);
        ?>
    </nav>
</div>
