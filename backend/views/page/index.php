<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\models\search\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="page-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                    'modelClass' => 'Page',
                ]), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="clearfix"></div>
        <br>

        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'options'      => [
                'class' => 'grid-view table-responsive'
            ],
            'layout'       => "{summary}\n{items}\n<div align='center'>{pager}</div>",
            'columns'      => [
                [
                    'class'          => 'yii\grid\CheckboxColumn',
                    'headerOptions'  => ['style' => 'width:3%;text-align:center'],
                    'contentOptions' => ['style' => 'width:3%;text-align:center'],
                ],
                [
                    'attribute'      => 'id',
                    'format'         => 'raw',
                    'headerOptions'  => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:7%;text-align:center'],
                ],
                'title',
                'slug',
                [
                    'class'     => \common\grid\EnumColumn::class,
                    'attribute' => 'status',
                    'format'    => 'raw',
                    'enum'      => [
                        Yii::t('backend', 'Not Published'),
                        Yii::t('backend', 'Published')
                    ]
                ],

                [
                    'class'    => 'backend\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons'  => [
                        'view' => function ($url) {
                            return Html::a(
                                '<i class="fa fa-eye" aria-hidden="true"></i>',
                                $url,
                                [
                                    'title' => Yii::t('backend', 'View'),
                                    'class' => 'btn btn-xs btn-success'
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>

    </div>
<?php
$app_css = <<<CSS
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
CSS;

$this->registerCss($app_css);