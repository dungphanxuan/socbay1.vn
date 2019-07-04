<?php

use yii\grid\GridView;
use yii\helpers\Html;
use common\grid\EnumColumn;

/* @var $this yii\web\View */
/* @var $searchModel \backend\modules\widget\models\search\WidgetCarouselSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Widget Carousels';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="widget-carousel-index">

        <div class="pull-right">
            <p>
                <?php echo Html::a(Yii::t('common', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="clearfix"></div>

        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'class' => 'grid-view table-responsive'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'headerOptions' => ['style' => 'width:3%;text-align:center'],
                    'contentOptions' => ['style' => 'width:3%;text-align:center'],
                ],
                [
                    'attribute' => 'id',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:7%;text-align:center'],
                ],
                'key',
                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'format' => 'raw',
                    'enum' => [
                        Yii::t('backend', 'Disabled'),
                        Yii::t('backend', 'Enabled')
                    ],
                ],

                [
                    'attribute' => 'total',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                    'value' => function ($model) {
                        return $model->totalItem;

                    },
                ],
                [
                    'class' => 'backend\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'contentOptions' => ['style' => 'width:15%;text-align:center'],
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