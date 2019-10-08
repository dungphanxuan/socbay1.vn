<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $is_show */

$title = 'Tin của bạn';
$icon = 'icon-docs';
if ($type == 2) {
    $title = 'Tin ưa thích';
    $icon = 'icon-heart-1';
}
if ($type == 3) {
    $title = 'Tin lưu trữ';
    $icon = 'icon-folder-close';
}

if ($type == 4) {
    $title = 'Chờ duyệt';
    $icon = 'icon-hourglass';
}

$this->title = $title;
?>


    <div class="main-container">
        <div class="container">
            <?php if ($is_show): ?>
                <div class="row">
                    <div class="col-md-12 page-content">
                        <div class="inner-box category-content">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="alert alert-success pgray  alert-lg" role="alert">
                                        <h2 class="no-margin no-padding">&#10004; Xin chúc mừng! Bản tin của bạn sẽ sớm
                                            được xuất bản.</h2>

                                        <p>Để đảm bảo tính bảo mật thông tin trong cộng đồng. Hệ thống sẽ kiểm tra nội
                                            dung trước khi xuất bản. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.page-content -->

                    </div>
                    <!-- /.row -->
                </div>

            <?php endif; ?>
            <div class="row">
                <div class="col-md-3 page-sidebar">
                    <aside>
                        <?php echo $this->render('_menu', []) ?>

                    </aside>
                </div>
                <!--/.page-sidebar-->

                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="icon-docs"></i> <?php echo $title ?></h2>

                        <div class="table-responsive">
                            <?php $form = ActiveForm::begin([
                                'action' => Url::to(['/account/' . Yii::$app->controller->action->id]),
                                'method' => 'get',
                            ]); ?>
                            <div class="table-action">
                                <label for="checkAll">
                                    <input type="checkbox" id="checkAll">
                                    Chọn: Tất cả | <a href="#" class="btn btn-sm btn-danger">Xóa <i
                                                class="glyphicon glyphicon-remove "></i></a> </label>

                                <div class="table-search pull-right col-sm-7">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-5 control-label text-right">Tìm kiếm <br>
                                                <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                            </label>

                                            <div class="col-sm-7 searchpan">
                                                <?php
                                                echo Html::textInput('title', getParam('title', ''), ['id' => 'filter', 'class' => 'form-control']);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                            <div class="table-responsive">
                                <table id="addManageTable"
                                       class="table table-striped table-bordered add-manage-table table demo"
                                       data-filter="#filter" data-filter-text-only="true">
                                    <thead>
                                    <tr>
                                        <th data-type="numeric" data-sort-initial="true"></th>
                                        <th>#</th>
                                        <th> Ảnh</th>
                                        <th data-sort-ignore="true"> Chi tiết</th>
                                        <th data-type="numeric"> Giá</th>
                                        <th> Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php echo ListView::widget([
                                        'dataProvider' => $dataProvider,
                                        'itemView' => '_item_myads',
                                        'options' => [
                                            'tag' => false
                                        ],
                                        'layout' => "{summary}\n{items}\n",
                                        'viewParams' => [
                                            'type' => $type,
                                        ],
                                    ]);
                                    ?>
                                    </tbody>

                                </table>
                            </div>


                            <div class="pagination-bar text-center">
                                <nav aria-label="Page navigation " class="d-inline-b">
                                    <?php
                                    echo \frontend\widgets\LinkPager::widget([
                                        'pagination' => $dataProvider->pagination,
                                    ]);
                                    ?>

                                </nav>
                            </div>
                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
<?php
$app_css = <<<CSS
.summary, .empty {
     padding-left: 0 !important; 
     padding-bottom: 5px;
}
CSS;
$this->registerCss($app_css);

$app_js = <<<JS
$("#clear-filter").click(function(){
    $('#filter').val('')
});
JS;
$this->registerJs($app_js);