<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
/* @var $searchModel backend\models\search\ArticleCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Category') . ':' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="article-category-view">

        <div class="row">
            <div class="col-md-6">
                <p>
                    <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <?php echo Html::a('Add Item', ['create', 'parent_id' => $model->id], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>


        <?php echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'slug',
                'parent.title',
                'sort_number',
                'status',
                'created_at:datetime'
            ],
        ]) ?>
        <div class="row">
            <div class="col-md-12">
                <h4><?php echo Yii::t('common', 'Sub Category') ?>: <?php echo $model->title ?></h4>
            </div>
            <div class="col-md-12">
                <?php echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'options' => [
                        'class' => 'grid-view table-responsive'
                    ],
                    'pager' => [
                        'maxButtonCount' => 15,
                    ],
                    'columns' => [
                        [
                            'class' => 'yii\grid\CheckboxColumn',
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
                        'title',
                        'slug',

                        [
                            'class' => \common\grid\EnumColumn::class,
                            'attribute' => 'status',
                            'format' => 'raw',
                            'enum' => [
                                Yii::t('backend', 'Not Published'),
                                Yii::t('backend', 'Published')
                            ]
                        ],

                        [
                            'class' => 'backend\grid\ActionColumn',
                            'template' => '{update} {delete}'
                        ],
                    ],
                ]); ?>
            </div>
        </div>

    </div>

<?php
$app_css = <<<CSS
.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
.is-selected {
    background-color: #e0e0e0;
}
CSS;

$this->registerCss($app_css);

$app_js = <<<JS

$(document).on("change",".select-item",function() {
         if($(this).is(":checked")) {
            $(this).parents("tr").addClass("is-selected");
        }else{
            $(this).parents("tr").removeClass("is-selected");
        }
});

JS;
$this->registerJs($app_js);
