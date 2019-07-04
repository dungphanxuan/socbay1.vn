<?php

use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FileStorageItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $components array */
/* @var $totalSize integer */

$this->title = Yii::t('backend', 'File Storage Items');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="file-storage-item-index">
        <div class="row">
            <div class="col-md-6"> <?php echo Html::a('File Upload', ['file-upload'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="col-md-6">
                <div class="row text-right">
                    <div class="pull-right">
                        <div class="col-xs-12">
                            <dl>
                                <dt>
                                    <?php echo Yii::t('backend', 'Used size') ?>:
                                </dt>
                                <dd>
                                    <?php echo Yii::$app->formatter->asSize($totalSize); ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="row">
                            <div class="col-xs-12">
                                <dl>
                                    <dt>
                                        Count:
                                    </dt>
                                    <dd>
                                        <?php echo $dataProvider->totalCount ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'id' => 'list-file',
                'class' => 'grid-view table-responsive'
            ],
            'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'image',
                    'format' => 'raw',
                    'header' => 'Ảnh',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                    'value' => function ($model) {
                        return Html::a(Html::img(null, ['class' => 'imageList lazy', 'data-src' => $model->getImage()]), [
                            'view',
                            'id' => $model->id
                        ], ['title' => 'Chi tiết', 'data-pjax' => 0]);
                    },
                ],
                [
                    'attribute' => 'component',
                    'filter' => $components
                ],
                [
                    'attribute' => 'path',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return \yii\helpers\StringHelper::truncate($model->path, 22);
                    },
                ],
                'type',
                'size:size',
                //'name',
                [
                    'attribute' => 'created_by',
                    'label' => 'User',
                    'contentOptions' => ['style' => 'width:10%'],
                    'value' => function ($model) {
                        return $model->user ? $model->user->username : null;
                    },
                    'filter' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username')
                ],
                'upload_ip',
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                    'filter' => DateTimeWidget::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'phpDatetimeFormat' => 'dd.MM.yyyy',
                        'momentDatetimeFormat' => 'DD.MM.YYYY',
                        'clientEvents' => [
                            'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
                        ],
                    ])
                ],

                [
                    'class' => 'backend\grid\ActionColumn',
                    'template' => '{view} {delete}'
                ]
            ]
        ]); ?>

    </div>


<?php
$app_css = <<<CSS
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
#list-file{
    min-height: 500px !important;
}
CSS;

$this->registerCss($app_css);
