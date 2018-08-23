<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticlePackage */

$this->title = 'Update : ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-package-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
