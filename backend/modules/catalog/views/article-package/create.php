<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\ArticlePackage */

$this->title = 'Create Article Package';
$this->params['breadcrumbs'][] = ['label' => 'Article Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-package-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
