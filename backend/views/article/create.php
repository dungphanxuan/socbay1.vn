<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $ranks */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Article',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <?php echo $this->render('_form', [
        'model'           => $model,
        'categories'      => $categories,
        'dataSubCategory' => $dataSubCategory,
        'cities'          => $cities,
        'dataDistrict'    => $dataDistrict,
        'dataWard'        => $dataWard,
    ]) ?>

</div>
