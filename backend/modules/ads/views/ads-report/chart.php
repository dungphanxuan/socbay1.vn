<?php

use dosamigos\chartjs\ChartJs;
use kartik\daterange\DateRangePicker;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dateRange string */
/* @var $arrLabel array */
/* @var $arrDataset array */

$this->title = 'Report Chart';

$this->params['breadcrumbs'][] = ['label' => 'Report', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Report Chart';
?>
    <div class="report-chart">

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'stats_form',
                    'action' => Url::to(['']),
                    'method' => 'get',
                ])
                ?>

                <?php
                $addon = <<< HTML
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </span>
HTML;
                echo '<label class="control-label">Date Range</label>';
                echo '<div class="input-group drp-container">';
                echo DateRangePicker::widget([
                        'name' => 'date_range',
                        'value' => $dateRange,
                        'useWithAddon' => true,
                        'presetDropdown' => true,
                        'options' => [
                            'id' => 'date-range',
                            'class' => 'form-control'
                        ],
                        'pluginOptions' => [
                            'locale' => [
                                'format' => 'YYYY-MM-DD',
                                'separator' => '-',
                            ],
                            'opens' => 'left'
                        ]
                    ]) . $addon;
                echo '</div>';

                ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
        <?php echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                'height' => 130,
                'width' => 400,

            ],
            'clientOptions' => [
                'animation' => [
                    'duration' => 0
                ]
            ],
            'data' => [
                'labels' => $arrLabel,
                'datasets' => $arrDataset
            ]
        ]);
        ?>
    </div>

<?php
$app_css = <<<CSS

CSS;

$app_js = <<<JS
 $('#date-range').change(function () {
    $('form#stats_form').submit();
});
JS;
$this->registerJs($app_js);
