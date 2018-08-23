<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticlePackage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-package-view">

    <p>
        <?php echo Html::a('Update',
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete',
            ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'body:ntext',
            'excerpt:ntext',
            'view',
            'url:url',
            'price',
            'day',
            'promo_day',
            'auto_renewal',
            'start_date',
            'end_date',
            'sort_number',
            'thumbnail_base_url:url',
            'thumbnail_path',
            'show_feature',
            'show_top',
            'promo_sign',
            'recommended_sign',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
