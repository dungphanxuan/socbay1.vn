<?php


/* @var $this yii\web\View */
/* @var $model common\models\ArticleRevision */

$this->title = 'Create Article Revision';
$this->params['breadcrumbs'][] = ['label' => 'Article Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-revision-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
