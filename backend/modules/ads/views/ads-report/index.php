<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use trntv\yii\datetime\DateTimeWidget;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ads\AdsReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ads Reports';
$this->params['breadcrumbs'][] = $this->title;

\common\assets\Bootbox::register($this);
?>
    <div class="ads-report-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
                <?php echo Html::a('Chart', ['chart'], ['class' => 'btn btn-primary']) ?>
                <button class="btn btn-danger btnDelete"><i class="fa fa-minus-circle" aria-hidden="true"></i> Xóa
                </button>
            </p>
        </div>
        <div class="clearfix"></div>
        <br>
        <?php Pjax::begin(['id' => 'datas', 'timeout' => 3000]); ?>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'class' => 'grid-view table-responsive',
                'id' => 'w5'
            ],
            'pager' => [
                'maxButtonCount' => 15,
            ],
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
                    'attribute' => 'reason_id',
                    'value' => function ($model) {
                        return $model->reason ? $model->reason->title : null;
                    },
                    'filter' => \yii\helpers\ArrayHelper::map(\common\models\ads\ReportReason::find()->all(), 'id', 'title')
                ],
                //'slug',
                'title',
                'report_id',
                'user_id',
                // 'user_email:email',
                // 'city_id',
                // 'district_id',
                // 'ward_id',
                // 'thumbnail_base_url:url',
                // 'thumbnail_path',
                [
                    'class' => \common\grid\EnumColumn::class,
                    'attribute' => 'status',
                    'format' => 'raw',
                    'enum' => [
                        Yii::t('backend', 'Not Published'),
                        Yii::t('backend', 'Published')
                    ]
                ],
                // 'sort_number',
                'approve_by',
                // 'created_by',
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
                        'clientOptions' => [
                            'minDate' => new \yii\web\JsExpression('new Date("2018-01-01")'),
                            'allowInputToggle' => false,
                            'sideBySide' => true,
                            'widgetPositioning' => [
                                'horizontal' => 'auto',
                                'vertical' => 'auto'
                            ]
                        ]
                    ])
                ],

                // 'updated_at',

                ['class' => 'backend\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
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

$(".btnDelete").click(function () {
    var keys = $('#w5').yiiGridView('getSelectedRows');
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
                    var keys = $('#w5').yiiGridView('getSelectedRows');
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
                            alert('Delete successful')
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