<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\system\models\search\SystemLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'System Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="system-log-index">

        <div class="pull-right">
            <p>
                <?php echo Html::a(Yii::t('backend', 'Clear'), false, ['class' => 'btn btn-danger', 'data-method' => 'delete']) ?>
            </p>
        </div>
        <div class="clearfix"></div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'options'      => [
                'class' => 'grid-view table-responsive'
            ],
            'pager'        => [
                'maxButtonCount' => 15,
            ],
            'layout'       => "{summary}\n{items}\n<div align='center'>{pager}</div>",
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'level',
                    'value'     => function ($model) {
                        return \yii\log\Logger::getLevelName($model->level);
                    },
                    'filter'    => [
                        \yii\log\Logger::LEVEL_ERROR         => 'error',
                        \yii\log\Logger::LEVEL_WARNING       => 'warning',
                        \yii\log\Logger::LEVEL_INFO          => 'info',
                        \yii\log\Logger::LEVEL_TRACE         => 'trace',
                        \yii\log\Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
                        \yii\log\Logger::LEVEL_PROFILE_END   => 'profile end'
                    ]
                ],
                'category',
                [
                    'attribute' => 'prefix',
                    'format'    => 'raw',
                    'value'     => function ($model) {
                        return $model->getPrefixTitle();
                    }
                ],
                [
                    'attribute' => 'log_time',
                    'format'    => 'datetime',
                    'value'     => function ($model) {
                        return (int)$model->log_time;
                    }
                ],

                [
                    'class'          => 'backend\grid\ActionColumn',
                    'template'       => '{view}{delete}',
                    'contentOptions' => ['style' => 'width:10%;text-align:center', 'class' => 'log-action'],
                ]
            ]
        ]); ?>

    </div>

<?php
$app_css = <<<CSS
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
.log-action .btn-danger{
    margin-left: 5px;
}
CSS;

$this->registerCss($app_css);
