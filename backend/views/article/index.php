<?php

use common\grid\EnumColumn;
use common\models\ArticleCategory;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\StringHelper;
use common\assets\Bootbox;
use trntv\yii\datetime\DateTimeWidget;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories ArticleCategory */

$this->title = Yii::t('backend', 'Articles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];

$gridId = 'w5';
Bootbox::register($this);
?>
    <div class="article-index">

        <div class="pull-right">
            <p>
                <?php echo Html::a('<i class="fa fa-plus-circle" aria-hidden="true"></i> ' . Yii::t('common', 'Add New'), ['create'],
                    ['class' => 'btn btn-success']) ?>
                <?php echo Html::a('<i class="fa fa-bar-chart" aria-hidden="true"></i> Chart', ['chart', 'object_id' => getParam('object_id')], ['class' => 'btn btn-info']) ?>
                <?php echo Html::a('<i class="fa fa-file-code-o" aria-hidden="true"></i> Export', ['export', 'object_id' => getParam('object_id')], ['class' => 'btn btn-primary']) ?>
            </p>
        </div>
        <div class="clearfix"></div>

        <?php echo $this->render('_search', ['model' => $searchModel, 'categories' => $categories]); ?>

        <br>
        <?php
        Pjax::begin([
            'timeout'  => 2000,
            'scrollTo' => 0,
            'id'       => 'datas'
        ]);
        ?>

        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'options'      => [
                'class' => 'grid-view table-responsive',
                'id'    => $gridId
            ],
            'pager'        => [
                'maxButtonCount' => 15,
            ],
            'layout'       => "{summary}\n{items}\n<div align='center'>{pager}</div>",
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
                [
                    'attribute'      => 'thumbnail',
                    'format'         => 'raw',
                    'headerOptions'  => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                    'value'          => function ($model) {
                        return Html::a(Html::tag('img', null, ['class' => 'imageList lazy', 'data-src' => $model->getImgThumbnail(5)]), [
                            'update',
                            'id' => $model->id
                        ], ['title' => 'Chi tiết', 'data-pjax' => 0]);
                    },
                ],
                //'slug',
                [
                    'attribute' => 'title',
                    'format'    => 'raw',
                    'value'     => function ($model) {
                        return StringHelper::truncateWords($model->title, 12);
                    },
                ],
                [
                    'attribute' => 'category_id',
                    'value'     => function ($model) {
                        return $model->category ? $model->category->title : null;
                    },
                    'filter'    => ArrayHelper::map(ArticleCategory::find()->all(), 'id', 'title')
                ],
                [
                    'attribute' => 'created_by',
                    'value'     => function ($model) {
                        return $model->author ? $model->author->username : '';
                    }
                ],
                [
                    'class'          => EnumColumn::class,
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
                    'attribute' => 'created_at',
                    'format'    => 'datetimerel',
                    'filter'    => false
                ],
                [
                    'attribute'      => 'view_count',
                    'format'         => 'raw',
                    'label'          => 'View',
                    'headerOptions'  => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                ],
                //'published_at:date',
                //'created_at:date',

                // 'updated_at',

                [
                    'class'          => 'backend\grid\ActionColumn',
                    'template'       => '{update} {copy} {delete}{show}',
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],

                    'buttons' => [
                        'copy' => function ($url, $model, $key) {
                            $url = Url::to(['/article/create', 'type' => 'copy', 'id' => $key]);

                            return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, [
                                'title'     => \Yii::t('common', 'Copy'),
                                'class'     => 'btnaction btn btn-success btn-xs',
                                'data-pjax' => 0
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
            ]
        ]); ?>
        <?php
        Pjax::end();
        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Save Success!</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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

$ajaxUrl = Url::to(['ajax-delete']);
$urlUpdate = Url::to('status');
$app_js = <<<JS
$(document).on('pjax:success', function () {
    var instance = $('.lazy').Lazy({chainable: false});
    var pjaxElements = $('#datas .lazy');

    instance.addItems(pjaxElements);
    instance.update();
});

$(".btnDelete").click(function () {
    var keys = $('#$gridId').yiiGridView('getSelectedRows');
    if (keys.length > 0) {
        bootbox.confirm({
            message: "Xác nhận xóa?",
            buttons: {
                confirm: {
                    label: 'Ok',
                    className: 'btn btn-flat-success'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn btn-flat-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    var keys = $('#$gridId').yiiGridView('getSelectedRows');
                    $.ajax({
                        url: '$ajaxUrl',
                        data: {
                            ids: keys
                        },
                        error: function () {
                            alert('Có lỗi xảy ra');
                        },
                        success: function (data) {
                            $.pjax.reload({container: "#datas"});
                        },
                        type: 'POST'
                    });
                }
            }
        });
    } else {
        bootbox.alert("Chưa chọn item!");
    }
});

$('.sValue').click(function () {
    var dataId = $(this).data("id");
    console.log('ID' + $(this).data("id"));
    //Ajax Change Status
    $.ajax({
        url: '$urlUpdate',
        type: 'post',
        data: {id: dataId},
        success: function (data) {
            console.log('done');
            $('#myModal').modal('show');
            return true;
        }
    });
    $(this).find("span").toggleClass('glyphicon-ok glyphicon-remove');
    $(this).find("span").toggleClass('text-success text-danger');
});

$(document).on("change", ".select-item", function () {
    if ($(this).is(":checked")) {
        $(this).parents("tr").addClass("is-selected");
    } else {
        $(this).parents("tr").removeClass("is-selected");
    }
});

JS;
$this->registerJs($app_js);
