<?php

use backend\controllers\StatisticController;
use frontend\models\App;

/**
 * @var        $this \yii\web\View
 * @var string $device_type
 */
$this->title = 'Thống kê thành viên mới';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'       => 'Trang chủ',
     'url'         => ['/'],
     'linkOptions' => ['class' => 'btn btn-flat', 'style' => 'border: 1px solid #ccc!important;']
    ],
];

$this->registerJsFile('@web/assets_b' . '/js/moment.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('@web/assets_b' . '/js/daterangepicker.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerCssFile('@web/assets_b' . '/css/daterangepicker.css', [
    'depends' => [\yii\bootstrap\BootstrapThemeAsset::class],
    'rel'     => 'stylesheet'
], 'css-print-theme');

?>
<div class="statistic-download">

    <p></p>

    <div class="row">
        <form action="<?php echo \yii\helpers\Url::to(['statistic/request']) ?>" method="POST" id="stats_form">
            <input type="hidden" name="_csrf" value=""<?php echo Yii::$app->request->csrfToken ?>">
            <input type="hidden" name="date_start" value="<?php echo isset($fromDate) ? $fromDate : ''; ?>"/>
            <input type="hidden" name="date_end" value="<?php echo isset($toDate) ? $toDate : ''; ?>"/>

            <div class="col-md-3 pull-right">
                <div id="daterangepiker" class="pull-right">
                    <i class="glyphicon glyphicon-calendar"></i>
                    <span>
                        <?php
                        /** @var int $fromDate */
                        /** @var int $toDate */
                        echo date("F j, Y", $fromDate) ?> - <?php echo date("F j, Y", $toDate); ?>
                    </span>
                    <b class="caret""></b>
                </div>
            </div>
    </div>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <p></p>
            <?php echo \miloschuman\highcharts\Highcharts::widget([
                'scripts' => [
                    'modules/exporting', // adds Exporting button/menu to chart
                ],
                'options' => [
                    'chart'  => ['type' => 'line'],
                    'title'  => ['text' => 'User statistic'],
                    'xAxis'  => [
                        'categories' => $arrDay
                    ],
                    'yAxis'  => [
                        'title'     => ['text' => 'New user'],
                        'plotLines' => [
                            [
                                'value' => 0,
                                'width' => 1,
                                'color' => '#808080'
                            ]
                        ],

                    ],
                    'series' => $series

                ]
            ]);
            ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><?php echo 'New user' ?> : <strong> <?php echo $total; ?></strong></h3>
        </div>
    </div>

</div>
<?php
$this->registerJs(
    "
     var date_start = new Date(" . $fromDate . " * 1000), date_end =  new Date(" . $toDate . " * 1000);

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
    format: 'D/MM/YYYY',
    separator: ' to ',
    startDate: date_start,
    endDate: date_end,
    minDate: '01/01/2012',
    maxDate: '12/31/2099',
    locale: {
                        applyLabel: 'Áp dụng',
                        fromLabel: 'Từ',
                        toLabel: 'Đến',
                        customRangeLabel: 'Khoảng ngày khác',
                        daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                        monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu', 'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],
                        firstDay: 1
    },
    showWeekNumbers: true,
    dateLimit: false
    },
    function(start, end) {
        $('input[name=date_start]').val(start/1000);
        $('input[name=date_end]').val(end/1000);
        $('form#stats_form').submit();
        $('#daterangepiker span').html(start.format('D/MM,YYYY') + ' - ' + end.format('D/MM,YYYY'));
    }
);
    $('#statsDownload_app_id').change(function () {
         $('form#stats_form').submit();
    });
    "
);

?>
