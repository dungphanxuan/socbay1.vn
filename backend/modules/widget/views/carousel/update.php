<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WidgetCarousel */
/* @var $carouselItemsProvider */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Widget Carousel',
    ]) . ' ' . $model->key;
$this->params['breadcrumbs'][] = ['label' => 'Widget Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
    <div class="widget-carousel-update">

        <?php echo $this->render('_form', [
            'model' => $model,
        ]) ?>

        <p>
            <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                'modelClass' => 'Widget Carousel Item',
            ]), [
                '/widget/widget-carousel-item/create',
                'carousel_id' => $model->id
            ], ['class' => 'btn btn-success']) ?>
        </p>

        <?php echo GridView::widget([
            'dataProvider' => $carouselItemsProvider,
            'options'      => [
                'class' => 'grid-view table-responsive'
            ],
            'columns'      => [
                'order',
                [
                    'attribute'      => 'path',
                    'format'         => 'raw',
                    'value'          => function ($model) {
                        return $model->path ? Html::img($model->getImageUrl(), [
                            'style' => 'width: 100%',
                            'class' => 'imageList'
                        ]) : null;
                    },
                    'contentOptions' => ['style' => 'width:18%;text-align:center'],

                ],
                'url:url',
                [
                    'format'    => 'html',
                    'attribute' => 'caption',
                    'options'   => ['style' => 'width: 20%']
                ],
                [
                    'class'     => \common\grid\EnumColumn::class,
                    'attribute' => 'status',
                    'enum'      => [
                        Yii::t('backend', 'Not Published'),
                        Yii::t('backend', 'Published')
                    ]
                ],
                [
                    'class'          => 'backend\grid\ActionColumn',
                    'controller'     => '/widget/widget-carousel-item',
                    'template'       => '{update} {delete}',
                    'contentOptions' => ['style' => 'width:8%;text-align:center'],
                ],
            ],
        ]); ?>


    </div>

<?php
$app_css = <<<CSS
.imageList{
    width: 60px;
    height: 60px;
}
CSS;
$this->registerCss($app_css);

