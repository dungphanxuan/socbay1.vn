<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleRevision */

$this->title = 'Danh mục: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-revision-view">

    <div class="row">
        <div class="col-md-6">
            <p>
                <?php echo Html::a('Update',
                    ['update', 'article_id' => $model->article_id, 'revision' => $model->revision], ['class' => 'btn btn-primary']) ?>
                <?php echo Html::a('Delete',
                    ['delete', 'article_id' => $model->article_id, 'revision' => $model->revision], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method'  => 'post',
                        ],
                    ]) ?>
            </p>
        </div>
        <div class="col-md-6 pull-right">
            <?php echo Html::a('Update',
                ['update', 'article_id' => $model->article_id, 'revision' => $model->revision], ['class' => 'btn btn-primary']) ?>

        </div>
    </div>


    <?php echo DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'article_id',
            'revision',
            'title',
            'body:ntext',
            'thumbnail_base_url:url',
            'thumbnail_path',
            'tagNames',
            'category_id',
            'yii_version',
            'memo',
            'updater_id',
            'updated_at',
        ],
    ]) ?>

</div>
