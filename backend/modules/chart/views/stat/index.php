<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dateRange string */
/* @var $arrLabel array */
/* @var $arrDataset array */
/* @var $type */
/* @var $id */
/* @var $field */
/* @var $time_type */

$this->title = 'Stat Chart';

$this->params['breadcrumbs'][] = 'Stat Chart';
?>
    <div class="file-storage-item-index">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Stat Chart</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <?php
                                $form = ActiveForm::begin([
                                    'id' => 'stat_form',
                                    'action' => Url::to(['']),
                                    'method' => 'get',
                                ])
                                ?>
                                <?php echo Html::hiddenInput('type', $type) ?>
                                <?php echo Html::hiddenInput('id', $id) ?>
                                <?php echo Html::hiddenInput('field', $field) ?>
                                <?php echo Html::hiddenInput('time_type', $time_type) ?>

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
                        <?php echo \dosamigos\chartjs\ChartJs::widget([
                            'type' => 'line',
                            'options' => [
                                'height' => 150,
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
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?php echo Url::home() ?>" class="btn btn-info pull-right">Home</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>

        </div>

    </div>

<?php
$app_css = <<<CSS

CSS;


$app_js = <<<JS

 $('#date-range').change(function () {
    $('form#stat_form').submit();
});
JS;
$this->registerJs($app_js);
