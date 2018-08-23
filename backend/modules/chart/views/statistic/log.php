<?php

use miloschuman\highcharts\Highcharts;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var        $this \yii\web\View
 * @var string $device_type
 * @var string $series
 * @var string $arrDay
 * @var string $total
 */

$this->title = 'Thống kê lượt truy cập';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'       => 'Home',
     'url'         => ['/'],
     'linkOptions' => ['class' => 'btn btn-flat', 'style' => 'border: 1px solid #ccc!important;']
    ],
];

$this->registerJsFile('@web/web/assets_log' . '/js/moment.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('@web/web/assets_log' . '/js/daterangepicker.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerCssFile('@web/web/assets_log' . '/css/daterangepicker.css', [
    'rel' => 'stylesheet'
], 'css-print-theme');
?>
<div class="statistic-download">
    <div class="row">
        <?php
        $form = ActiveForm::begin([
            'id'      => 'stats_form1',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>

        <input type="hidden" name="date_start" value="<?php echo isset($fromDate) ? $fromDate : ''; ?>"/>
        <input type="hidden" name="date_end" value="<?php echo isset($toDate) ? $toDate : ''; ?>"/>

        <div class="col-md-5 pull-right">
            <div id="daterangepiker" class="pull-right">
                <i class="glyphicon glyphicon-calendar"></i>
                <span>
                        <?php
                        /** @var int $fromDate */
                        /** @var int $toDate */
                        echo date("Y/m/d", $fromDate) ?> - <?php echo date("Y/m/d", $toDate); ?>
                </span>
                <b class="caret"></b>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p></p>
            <?php echo Highcharts::widget([
                'setupOptions' => [
                    'lang' => [
                        'printChart'   => 'Tải xuống',
                        'downloadPNG'  => 'Tải xuống PNG',
                        'downloadJPEG' => 'Tải xuống JPG',
                        'downloadPDF'  => 'Tải xuống PDF',
                        'downloadSVG'  => 'Tải xuống SVG'
                    ]
                ],
                'scripts'      => [
                    'modules/exporting', // adds Exporting button/menu to chart
                ],
                'options'      => [
                    'chart'    => ['type' => 'line'],
                    'title'    => ['text' => 'Thống kê lượt truy cập'],
                    'subtitle' => ['text' => 'Số lượng truy cập vào hệ thống'],

                    'xAxis'  => [
                        'categories' => $arrDay,
                    ],
                    'yAxis'  => [
                        'title'     => [
                            'text' => 'Số lượng',
                        ],
                        'plotLines' => [
                            [
                                'value' => 0,
                                'width' => 1,
                                'color' => '#808080'
                            ]
                        ],
                    ],
                    'series' => $series,
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Tổng số lượt truy cập : <strong> <?php echo getShowFormat()->asDecimal($total); ?></strong></h3>
        </div>
        <div class="col-md-6">
            <br>
            <div class="pull-right">
                <?php
                echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Quay lại', ['/chart/web-log/index'], ['class' => 'btn btn-flat btn-default btn100']);
                ?>
            </div>
        </div>
    </div>

</div>

<?php
$app_js = <<<JS
var date_start = new Date($fromDate * 1000);
date_end = new Date($toDate* 1000);
$('#daterangepiker').daterangepicker(
    {
        ranges: {
            'Hôm nay': [moment(), moment()],
            'Hôm qua': [moment().subtract('days', 1), moment().subtract('days', 1)],
            '7 ngày trước': [moment().subtract('days', 6), moment()],
            '30 ngày trước': [moment().subtract('days', 29), moment()],
            'Tháng này': [moment().startOf('month'), moment().endOf('month')],
            'Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        opens: 'left',
        locale: {
            format: 'YYYY-MM-DD'
        },
        separator: ' to ',
        startDate: date_start,
        endDate: date_end,
        minDate: '01/01/2016',
        maxDate: '12/31/2099',
        locale: {
            applyLabel: 'Áp dụng',
            cancelLabel: 'Hủy',
            fromLabel: 'Từ ngày',
            toLabel: 'Đến ngày',
            customRangeLabel: 'Khác',
            daysOfWeek: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
            monthNames: ['Tháng giêng', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            firstDay: 1
        },
        showWeekNumbers: true,
        dateLimit: false
    },
    function (start, end) {
        $('input[name=date_start]').val(start / 1000);
        $('input[name=date_end]').val(end / 1000);
        $('form#stats_form1').submit();
        $('#daterangepiker span').html(start.format('YYYY,MM/D,') + ' - ' + end.format('YYYY,MM/D,'));
    }
);

$('#statsDownload_app_id').change(function () {
    $('form#stats_form1').submit();
});
JS;

$this->registerJs($app_js);

?>
