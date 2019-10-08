<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\data\ArticlePackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-package-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="clearfix"></div>
    <br>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

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
            'title',
            // 'view',
            // 'url:url',
            'price',
            'day',
            // 'promo_day',
            // 'auto_renewal',
            // 'start_date',
            // 'end_date',
            // 'sort_number',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'show_feature',
            // 'show_top',
            // 'promo_sign',
            // 'recommended_sign',
            [
                'class' => \common\grid\EnumColumn::class,
                'attribute' => 'status',
                'enum' => [
                    Yii::t('backend', 'Not Published'),
                    Yii::t('backend', 'Published')
                ]
            ],
            //'created_at',
            'updated_at:date',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
