<?php

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
/* @var $categories array */
/* @var $categoryType array */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Article Category',
    ]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="article-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'categoryType' => $categoryType
    ]) ?>

</div>
