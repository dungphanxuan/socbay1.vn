<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FileStorageItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $components array */
/* @var $totalSize integer */

$this->title = Yii::t('backend', 'File Storage Items');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 page-content">
                    <div class="inner-box">
                        <div class="file-storage-item-index">
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                            <div class="row">

                                <div class="col-md-6">
                                    <h2>File Manager</h2>
                                </div>
                                <div class="col-md-6 text-right">
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

                            <?php echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel'  => $searchModel,
                                'options'      => [
                                    'class' => 'grid-view table-responsive'
                                ],
                                'layout'       => "{summary}\n{items}",
                                'columns'      => [
                                    [
                                        'class'           => 'yii\grid\CheckboxColumn',
                                        'headerOptions'   => ['style' => 'width:3%;text-align:center'],
                                        'contentOptions'  => ['style' => 'width:3%;text-align:center'],
                                        'checkboxOptions' => [
                                            'class' => 'select-item'
                                        ]
                                    ],
                                    ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'attribute'      => 'image',
                                        'format'         => 'raw',
                                        'header'         => 'Ảnh',
                                        'headerOptions'  => ['style' => 'text-align:center'],
                                        'contentOptions' => ['style' => 'width:10%;text-align:center'],
                                        'value'          => function ($model) {
                                            return Html::a(Html::img($model->getImage(), ['class' => 'imageList']), [
                                                'view',
                                                'id' => $model->id
                                            ], ['title' => 'Chi tiết', 'data-pjax' => 0]);
                                        },
                                    ],
                                    /*[
                                        'attribute' => 'component',
                                        'filter'    => $components
                                    ],*/
                                    //'path',
                                    'type',
                                    [
                                        'attribute' => 'size',
                                        'format'    => 'size',
                                        'label'     => 'Dung lượng',
                                    ],
                                    //'name',
                                    /*[
                                        'attribute'      => 'created_by',
                                        'label'          => 'User',
                                        'contentOptions' => ['style' => 'width:10%'],
                                        'value'          => function ($model) {
                                            return $model->user ? $model->user->username : null;
                                        },
                                        'filter'         => \yii\helpers\ArrayHelper::map( \common\models\User::find()->all(), 'id', 'username' )
                                    ],*/
                                    //'upload_ip',
                                    'created_at:date',

                                    [
                                        'class'          => 'frontend\grid\ActionColumn',
                                        'template'       => '{delete-file}',
                                        'headerOptions'  => ['style' => 'text-align:center'],
                                        'contentOptions' => ['style' => 'width:10%;text-align:center'],

                                    ]
                                ]
                            ]); ?>

                            <div class="pagination-bar text-center">
                                <nav aria-label="Page navigation " class="d-inline-b">
                                    <?php
                                    echo \frontend\widgets\LinkPager::widget([
                                        'pagination' => $dataProvider->pagination,
                                    ]);
                                    ?>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


<?php
$app_css = <<<CSS
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
.summary, .empty {
     padding-left: 0 !important; 
}

CSS;

$this->registerCss($app_css);
