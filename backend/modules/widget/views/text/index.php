<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\modules\widget\models\search\WidgetTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Text Blocks');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="text-block-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a(Yii::t('common', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="clearfix"></div>


        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [

                ['class' => 'yii\grid\SerialColumn'],
                [
                    'class'          => 'yii\grid\CheckboxColumn',
                    'headerOptions'  => ['style' => 'width:3%;text-align:center'],
                    'contentOptions' => ['style' => 'width:3%;text-align:center'],
                ],
                [
                    'attribute'      => 'id',
                    'format'         => 'raw',
                    'headerOptions'  => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                ],
                'key',
                'title',
                [
                    'class'     => \common\grid\EnumColumn::class,
                    'attribute' => 'status',
                    'format'    => 'raw',
                    'enum'      => [
                        Yii::t('backend', 'Disabled'),
                        Yii::t('backend', 'Enabled')
                    ],
                ],

                [
                    'class'    => 'backend\grid\ActionColumn',
                    'template' => '{update}{delete}'
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