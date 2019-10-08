<?php

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */
/* @var $article_type */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataSubCat */
/* @var $dataWard */
/* @var $ranks */

$this->title = 'Cập nhật tin'
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Cập nhật bản tin
                        </strong></h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $this->render('_form', [
                                'model' => $model,
                                'categories' => $categories,
                                'dataSubCat' => $dataSubCat,
                                'article_type' => $article_type,
                                'cities' => $cities,
                                'dataDistrict' => $dataDistrict,
                                'dataWard' => $dataWard,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--Side Bar Form-->
            <div class="col-md-3 reg-sidebar">
                <?php echo $this->render('partical/_sidebar_form', []) ?>
            </div>
        </div>
    </div>
</div>



