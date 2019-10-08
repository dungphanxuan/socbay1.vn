<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\job\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = ['label' => 'Company', 'url' => ['index']];

?>
    <div class="company-index">

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
                    'headerOptions' => ['style' => 'width:3%;text-align:center'],
                    'contentOptions' => ['style' => 'width:3%;text-align:center'],
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
                    'header' => 'Ảnh',
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
                'title_short',
                // 'body:ntext',
                // 'excerpt:ntext',
                // 'view',
                // 'url:url',
                // 'email:email',
                // 'phone',
                // 'start_date',
                // 'end_date',
                // 'complete_on',
                // 'city_id',
                // 'district_id',
                // 'ward_id',
                // 'lat',
                // 'lng',
                // 'total_votes',
                // 'up_votes',
                // 'rating',
                // 'featured',
                // 'comment_count',
                // 'view_count',
                // 'sort_number',
                // 'thumbnail_base_url:url',
                // 'thumbnail_path',
                // 'type',
                // 'status',
                // 'created_by',
                // 'updated_by',
                // 'published_at',
                'created_at:date',
                // 'updated_at',

                ['class' => 'backend\grid\ActionColumn'],
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