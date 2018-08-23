<?php

/* @var $this yii\web\View */
/* @var $model common\models\ArticleRevision */

$this->title = 'Update Article Revision: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'article_id' => $model->article_id, 'revision' => $model->revision]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-revision-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
