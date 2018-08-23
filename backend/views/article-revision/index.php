<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArticleRevisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Revisions';
$this->params['breadcrumbs'][] = $this->title;
\common\assets\Bootbox::register($this);
?>
    <div class="article-revision-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a('Create Article Revision', ['create'], ['class' => 'btn btn-success']) ?>
                <button class="btn btn-danger btnDelete"><i class="fa fa-minus-circle" aria-hidden="true"></i> Xóa
                </button>
            </p>
        </div>
        <br>
        <?php
        Pjax::begin([
            'scrollTo' => 0
        ]);
        ?>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'options'      => [
                'id' => 'w5'
            ],
            'pager'        => [
                'maxButtonCount' => 15,
            ],
            'layout'       => "{summary}\n{items}\n<div align='center'>{pager}</div>",
            'columns'      => [
                ['class' => 'yii\grid\CheckboxColumn'],

                'article_id',
                'revision',
                'title',
                //'common:ntext',
                //'thumbnail_base_url:url',
                // 'thumbnail_path',
                // 'tagNames',
                // 'category_id',
                // 'yii_version',
                'memo',
                [
                    'attribute' => 'updater_id',
                    'value'     => function ($model) {
                        return $model->updater ? $model->updater->username : '';
                    }
                ],
                'updated_at:datetime',

                ['class' => 'backend\grid\ActionColumn'],
            ],
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
.imageList{
    width: 80px;
    height: 50px;
}
.sValue{
cursor:pointer
}
CSS;
$this->registerCss($app_css);

$ajaxUrl = Url::to(['ajax-delete']);
$urlUpdate = Url::to('status');
$app_js = <<<JS
$(".btnDelete").click(function(){
    var keys = $('#w5').yiiGridView('getSelectedRows');
    if(keys.length > 0){
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
            if(result){
               var keys = $('#w5').yiiGridView('getSelectedRows');
               $.ajax({
                  url: '$ajaxUrl',
                  data: {
                     ids: keys
                  },
                  error: function() {
                     alert('Có lỗi xảy ra');
                  },
                  success: function(data) {
                     $.pjax.reload({container:"#datas"}); 
                  },
                  type: 'POST'
               });
             }
            }
        });     
    }else{
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
JS;
$this->registerJs($app_js);