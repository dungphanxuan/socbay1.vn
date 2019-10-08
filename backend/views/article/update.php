<?php

use common\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $ranks */

$this->title = Yii::t('common', 'Update') . ' :' . StringHelper::truncate($model->title, 50);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="article-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'dataSubCategory' => $dataSubCategory,
        'cities' => $cities,
        'dataDistrict' => $dataDistrict,
        'dataWard' => $dataWard,
    ]) ?>

</div>
