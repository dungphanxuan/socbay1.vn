<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Article Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="article-category-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a(Yii::t('common', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
                <?php echo Html::a('<i class="fa fa-bar-chart" aria-hidden="true"></i> Chart', ['chart', 'object_id' => getParam('object_id')], ['class' => 'btn btn-info']) ?>
                <?php echo Html::a('<i class="fa fa-file-code-o" aria-hidden="true"></i> Export', ['export', 'object_id' => getParam('object_id')], ['class' => 'btn btn-primary']) ?>
            </p>
        </div>

        <div class="clearfix"></div>

        <br>
        <table class="table">
            <thead>
            <tr>
                <th width="5%" class="rmiddle b2x">ID</th>
                <th class="nobrbottom nopb"><?php echo Yii::t('common', 'Title') ?></th>
                <th class="nobrbottom nopb"><?php echo Yii::t('common', 'Slug') ?></th>
                <th class="rmiddle b2x" style="text-align: center"><?php echo Yii::t('common', 'Sort Order') ?></th>
                <th class="rmiddle b2x" style="text-align: center">Số bài viết</th>
                <th class="rmiddle b2x" style="text-align: center"><?php echo Yii::t('common', 'Status') ?></th>
                <th class="rmiddle b2x"></th>
                <th class="rmiddle b2x"></th>
                <th class="rmiddle b2x"></th>
            </tr>
            </thead>
            <tbody class="datas">
            <?php echo ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                'itemView' => '_item',
                'layout' => "{items}\n <tr class='lpagination'><td colspan=\"10\">{pager}</td></tr>",
                'itemOptions' => [
                    'tag' => false,
                    'class' => 'item'
                ],
            ]) ?>
            </tbody>
        </table>

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

$urlAjax = Url::to(['/article-category/ajax-order']);

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