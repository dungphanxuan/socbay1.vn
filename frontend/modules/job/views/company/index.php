<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\job\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách công ty';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-container inner-page">
    <div class="container">
        <div class="section-content">
            <div class="row ">
                <div class="col-xl-12">
                    <div class="company-index">

                        <div class="row">
                            <div class="col-md-6">
                                <h1><?= Html::encode($this->title) ?></h1>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <p>
                                        <?= Html::a('Đăng ký', ['create'], ['class' => 'btn btn-success']) ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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
                                    <th data-type="numeric"> Việc làm</th>
                                    <th> Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php echo \yii\widgets\ListView::widget([
                                    'dataProvider' => $dataProvider,
                                    'itemView' => '_item',
                                    'options' => [
                                        'tag' => false
                                    ],
                                    'layout' => "{summary}\n{items}\n",

                                ]);
                                ?> </tbody>

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
                </div>
            </div>
        </div>
    </div>
</div>

