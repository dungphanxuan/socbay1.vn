<?php

use dosamigos\chartjs\ChartJs;
use kartik\daterange\DateRangePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\helpers\Enum;
use yii\widgets\ListView;

/**
 * @author Dung Phan Xuan <dungphanxuan999@gmail.com>
 */

/* @var $this yii\web\View */
/* @var $articleProvider \yii\data\ActiveDataProvider */
/* @var $arrData array */
/* @var $dateRange */
/* @var $arrLabel */
/* @var $arrDataset */

$this->title = 'Dashboard';
?>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $arrData['article'] ?></h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="<?php echo Url::to(['/sales/index']) ?>" class="small-box-footer">
                    Xem thêm<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $arrData['user'] ?></h3>

                    <p>Total Customer</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo Url::to(['/customer/index']) ?>" class="small-box-footer">
                    Xem thêm<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $arrData['user'] ?></h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo Url::to(['/user/index']) ?>" class="small-box-footer">
                    Xem thêm<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $arrData['article'] ?></h3>

                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo Url::to(['/article/index']) ?>" class="small-box-footer">
                    Xem thêm<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Articles</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin  table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Article ID</th>
                                <th>Title</th>
                                <th>View Count</th>
                                <th>Status</th>
                                <th>Popularity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            echo ListView::widget([
                                'dataProvider' => $articleProvider,
                                'options' => [
                                    'tag' => false
                                ],
                                'itemOptions' => [
                                    'tag' => false,
                                ],
                                'layout' => "{items}",
                                'itemView' => '_item_order',
                            ]);
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="<?php echo Url::to(['/article/create']) ?>" class="btn btn-sm btn-info btn-flat pull-left">Place
                        New Article</a>
                    <a href="<?php echo Url::to(['/article/index']) ?>"
                       class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Báo cáo bài viết</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <?php
                            $form = ActiveForm::begin([
                                'id' => 'chartjs_form',
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
                            'height' => 100,
                        ],
                        'clientOptions' => [
                            'animation' => [
                                'duration' => 0
                            ]
                        ],
                        'data' => [
                            'labels' => $arrLabel,
                            'datasets' => [
                                $arrDataset,
                            ]
                        ]
                    ]);
                    ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>

<?php
$app_css = <<<CSS
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
.is-selected {
    background-color: #e0e0e0;
}
CSS;

$this->registerCss($app_css);

$app_js = <<<JS

 $('#date-range').change(function () {
    $('form#chartjs_form').submit();
});
JS;
$this->registerJs($app_js);



