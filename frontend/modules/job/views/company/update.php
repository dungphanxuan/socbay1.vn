<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\job\Company */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */

$this->title = 'Cập nhật công ty: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2 uppercase"><strong> <i class="icon-briefcase"></i> Cập nhật công ty </strong>
                    </h2>

                    <div class="row">
                        <div class="col-sm-12">
                            <?= $this->render('_form', [
                                'model' => $model,
                                'cities' => $cities,
                                'dataDistrict' => $dataDistrict,
                                'dataWard' => $dataWard,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.page-content -->

            <div class="col-md-3 reg-sidebar">
                <div class="reg-sidebar-inner text-center">
                    <?php
                    echo $this->render('@frontend/views/ads/form/_sidebar_job_form', [])
                    ?>
                </div>
            </div>
            <!--/.reg-sidebar-->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.main-container -->

