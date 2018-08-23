<?php

use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\property\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $prices */
/* @var $areas */
/* @var $ranks */
/* @var $categories */

$this->title = 'Dự án BDS';
$this->params['breadcrumbs'][] = $this->title;
$params = getParam('ProjectSearch');

$createdParam = isset($params['created_at']) ? $params['created_at'] : '';
?>
    <div class="project-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a('<i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới', ['create'], ['class' => 'btn btn-success', 'title' => 'Thêm mới dự án']) ?>
                <?php echo Html::a('<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export', ['export'], ['class' => 'btn btn-info', 'title' => 'Xuất dữ liệu']) ?>
            </p>
        </div>
        <div class="clearfix"></div>

        <?php echo $this->render('_search', [
            'model'      => $searchModel,
            'categories' => $categories,
            'prices'     => $prices,
            'areas'      => $areas,
            'ranks'      => $ranks,
        ]); ?>
        <br>
        <br>

        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'pager'        => [
                'maxButtonCount' => 15,
            ],
            'layout'       => "{summary}\n{items}\n<div align='center'>{pager}</div>",

            'columns' => [

                [
                    'class'          => 'yii\grid\CheckboxColumn',
                    'contentOptions' => ['style' => 'text-align:center'],
                    'headerOptions'  => ['style' => 'text-align:center; width:5%;'],
                ],
                [
                    'attribute'      => 'id',
                    'format'         => 'raw',
                    'headerOptions'  => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:7%;text-align:center'],
                ],
                [
                    'attribute'      => 'thumbnail',
                    'format'         => 'raw',
                    'header'         => 'Thumbnail',
                    'headerOptions'  => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:8%;text-align:center'],
                    'value'          => function ($model) {
                        return Html::a(Html::img($model->getImgThumbnail(2), ['class' => 'imageList']), [
                            'update',
                            'id' => $model->id
                        ], ['title' => 'Chi tiết', 'data-pjax' => 0]);
                    },
                ],
                [
                    'attribute' => 'title',
                    'value'     => function ($model) {
                        return $model->getShowTitle(70);
                    },
                ],
                // 'city_id',
                [
                    'attribute' => 'city_id',
                    'value'     => function ($model) {
                        return $model->city ? $model->city->name : null;
                    },
                    'filter'    => ArrayHelper::map(\dungphanxuan\vnlocation\models\City::find()->all(), 'id', 'name')
                ],
                'district_id',
                // 'ward_id',
                // 'level',
                // 'project_price_id',
                // 'price',
                // 'price_to',
                // 'num_of_rooms',
                // 'project_area_id',
                // 'thumbnail_base_url:url',
                // 'thumbnail_path',
                // 'lat',
                // 'lng',
                // 'sort_number',
                /* [
                     'attribute'      => 'type',
                     'format'         => 'raw',
                     'filter'         => [1 => 'Cho thuê', 2 => 'Mua bán'],
                     'value'          => function ($model) {
                         $showText = $model->type != 2 ? 'Cho thuê' : 'Mua bán';

                         return $showText;
                     },
                     'headerOptions'  => ['style' => 'text-align:center'],
                     'contentOptions' => ['style' => 'width:10%;text-align:center'],
                 ],*/
                [
                    'attribute'      => 'status',
                    'format'         => 'raw',
                    'filter'         => [
                        1 => Yii::t('backend', 'Published'),
                        0 => Yii::t('backend', 'Not Published')
                    ],
                    'value'          => function ($model) {
                        $options = [
                            'class' => ($model->status == 1) ? 'glyphicon glyphicon-ok text-success' : 'glyphicon glyphicon-remove text-danger',
                        ];

                        return Html::tag('p', Html::tag('span', '', $options), [
                            'class'   => 'text-center sValue',
                            'data-id' => $model->id
                        ]);
                    },
                    'headerOptions'  => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                ],
                [
                    'attribute'          => 'created_at',
                    'format'             => 'date',
                    'filterInputOptions' => [
                        'class' => 'form-control',
                    ],
                    'filter'             => \yii\jui\DatePicker::widget([
                        'name'       => 'ProjectSearch[created_at]',
                        'language'   => 'vi',
                        'dateFormat' => 'yyyy-MM-dd',
                        'value'      => $createdParam,
                        'options'    => ['class' => 'form-control', 'placeholder' => 'Ngày tạo',],

                        'id' => 'ProjectSearch-time'
                    ]),
                    'contentOptions'     => ['style' => 'width:12%'],
                ],
                // 'updated_at',

                [
                    'class'          => 'backend\grid\ActionColumn',
                    'template'       => '{update} {delete} {view}',
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                ]
            ],
        ]); ?>

    </div>

<?php
$app_css = <<<CSS
.imageList{
    width: 60px;
    height: 50px;
}
CSS;
$this->registerCss($app_css);