<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ads\AdsAssetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ads Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="ads-assets-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a('Create Ads Assets', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="clearfix"></div>


        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'headerOptions' => ['style' => 'width:3%;text-align:center'],
                    'contentOptions' => ['style' => 'width:3%;text-align:center'],
                    'checkboxOptions' => [
                        'class' => 'select-item'
                    ]
                ],
                [
                    'attribute' => 'id',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                ],
                [
                    'attribute' => 'thumbnail',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                    'value' => function ($model) {
                        return Html::a(Html::tag('img', null, ['class' => 'imageList lazy', 'data-src' => $model->getImgThumbnail(5)]), [
                            'update',
                            'id' => $model->id
                        ], ['title' => 'Chi tiết', 'data-pjax' => 0]);
                    },
                ],
                'title',
                //'body:ntext',
                'key',
                // 'thumbnail_base_url:url',
                // 'thumbnail_path',
                // 'thumbnail_base_url_data:url',
                // 'thumbnail_path_data',
                // 'type',
                'status',
                'sort_number',
                'created_at:date',
                // 'updated_at',

                ['class' => 'backend\grid\ActionColumn'],
            ],
        ]); ?>

    </div>

<?php
$app_css = <<<CSS
.imageList {
    width: 80px;
    height: 50px;
}

.sValue {
    cursor: pointer
}
#w5{
    min-height: 500px !important;
}
.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}

.form-group {
    margin-bottom: 5px !important;
}
.is-selected {
    background-color: #e0e0e0;
}
input[type='checkbox'] {
    cursor: pointer;
}
CSS;
$this->registerCss($app_css);