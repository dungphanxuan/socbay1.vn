<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\media\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
            <?php echo Html::a('Export', ['export'], ['class' => 'btn btn-info']) ?>
        </p>
    </div>
    <div class="clearfix"></div>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [
                'class'           => 'yii\grid\CheckboxColumn',
                'headerOptions'   => ['style' => 'width:3%;text-align:center'],
                'contentOptions'  => ['style' => 'width:3%;text-align:center'],
                'checkboxOptions' => [
                    'class' => 'select-item'
                ]
            ],
            [
                'attribute'      => 'id',
                'format'         => 'raw',
                'headerOptions'  => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            'title',
            // 'type',
            // 'view',
            [
                'attribute'      => 'episode',
                'format'         => 'raw',
                'headerOptions'  => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            // 'category_id',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'video_play_type',
            // 'url_local:url',
            // 'url_streaming:url',
            // 'youtube_id',
            // 'youtube_url:url',
            // 'vimeo_url:url',
            // 'review_url:url',
            // 'review_type',
            // 'view_count',
            // 'like_count',
            // 'dislike_count',
            // 'share_count',
            // 'favorite_count',
            // 'comment_count',
            // 'matched',
            // 'is_syn',
            // 'min_total',
            // 'next_id',
            // 'preview_id',
            // 'login_require',
            // 'is_hot',
            // 'video_status',
            [
                'class'          => \common\grid\EnumColumn::class,
                'attribute'      => 'status',
                'format'         => 'raw',
                'enum'           => [
                    Yii::t('backend', 'Not Published'),
                    Yii::t('backend', 'Published'),
                    Yii::t('backend', 'Deleted')
                ],
                'headerOptions'  => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            [
                'attribute' => 'created_by',
                'value'     => function ($model) {
                    return $model->author ? $model->author->username : '';
                }
            ],
            [
                'attribute'      => 'view_count',
                'format'         => 'raw',
                'headerOptions'  => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
            ],
            // 'updated_by',
            // 'published_at',
            'created_at:datetime',
            // 'updated_at',

            [
                'class'          => 'backend\grid\ActionColumn',
                'template'       => '{update} {copy} {delete}{show}',
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
                'buttons'        => [
                    'copy' => function ($url, $model, $key) {
                        $url = \yii\helpers\Url::to(['/media/default/create', 'type' => 'copy', 'id' => $key]);

                        return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, [
                            'title' => \Yii::t('common', 'Copy'),
                            'class' => 'btnaction btn btn-success btn-xs'
                        ]);
                    },
                    'show' => function ($url) {
                        return Html::a(
                            '<i class="fa fa-eye" aria-hidden="true"></i>',
                            $url,
                            [
                                'title'     => Yii::t('backend', 'Show'),
                                'class'     => 'btn btn-xs btn-success',
                                'target'    => '_blank',
                                'data-pjax' => 0
                            ]
                        );
                    },
                ]
            ]
        ],
    ]); ?>

</div>
