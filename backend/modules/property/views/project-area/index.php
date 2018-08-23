<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\property\ProjectAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Areas';
$this->params['breadcrumbs'][] = $this->title;
\kartik\file\SortableAsset::register($this);
?>
    <div class="row">
        <div class="col-md-3">
            <?php
            echo $this->render('@backend/modules/property/views/default/_menu')
            ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <div class="project-area-index">

                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <div class="pull-right">
                            <p>
                                <?php echo Html::a('Create Project Area', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>
                        </div>
                        <div class="clearfix"></div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th width="5%" class="rmiddle b2x">ID</th>
                                <th class="nobrbottom nopb">Tiêu đề</th>
                                <th class="rmiddle b2x" style="text-align: center">Sắp xếp</th>
                                <th class="rmiddle b2x"></th>
                                <th class="rmiddle b2x"></th>
                            </tr>
                            </thead>
                            <tbody class="datas">
                            <?php echo \yii\widgets\ListView::widget([
                                'dataProvider' => $dataProvider,
                                'summary'      => '',
                                'itemView'     => '_item',
                                'layout'       => "{items}\n <tr class='lpagination'><td colspan=\"10\">{pager}</td></tr>",
                                'itemOptions'  => [
                                    'tag'   => false,
                                    'class' => 'item'
                                ],
                            ]) ?>
                            </tbody>
                        </table>

                        <?php
                        /*		echo GridView::widget( [
                                    'dataProvider' => $dataProvider,
                                    'filterModel'  => $searchModel,
                                    'columns'      => [
                                        [
                                            'class'          => 'yii\grid\CheckboxColumn',
                                            'contentOptions' => [ 'style' => 'text-align:center' ],
                                            'headerOptions'  => [ 'style' => 'text-align:center; width:5%;' ],
                                        ],
                                        [
                                            'attribute'      => 'id',
                                            'format'         => 'raw',
                                            'headerOptions'  => [ 'style' => 'text-align:center' ],
                                            'contentOptions' => [ 'style' => 'width:10%;text-align:center' ],
                                        ],
                                        'title',
                                        'slug',
                                        'sort_number',

                                        [
                                            'class'    => 'backend\grid\ActionColumn',
                                            'template' => '{update} {delete}'
                                        ],
                                    ],
                                ] );
                                */
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>


<?php
$app_css = <<<CSS
.imageList{
    width: 80px;
    height: 50px;
}

.table>thead>tr>th,
.table>tbody>tr>th,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>tbody>tr>td,
.table>tfoot>tr>td {
  border-top: 2px solid #3c8dbc;
}
CSS;
$this->registerCss($app_css);

$urlAjax = \yii\helpers\Url::to(['order']);

$app_js = <<<JS
$(".datas").sortable({
    revert: true,
    axis: 'y',
    items: '> tr',
    helper: 'clone',
    update: function (event, ui) {
        var data = [];
        $(".datas .item").each(function (i) {
            data[i] = $(this).attr('data-id');
        });
        console.log(data);
        $.ajax({
            data: {order: data},
            type: 'POST',
            url: "$urlAjax",
            success: function (data) {
                //location.reload();
            }
        });
    }
});
JS;
$this->registerJs($app_js);
