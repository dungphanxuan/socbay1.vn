<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\job\Company */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <p>
        <?php echo Html::a('Update',
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete',
            ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'contact_id',
            'slug',
            'title',
            'title_en',
            'title_short',
            'body:ntext',
            'excerpt:ntext',
            'view',
            'url:url',
            'email:email',
            'phone',
            'start_date',
            'end_date',
            'complete_on',
            'city_id',
            'district_id',
            'ward_id',
            'lat',
            'lng',
            'total_votes',
            'up_votes',
            'rating',
            'featured',
            'comment_count',
            'view_count',
            'sort_number',
            'thumbnail_base_url:url',
            'thumbnail_path',
            'type',
            'status',
            'created_by',
            'updated_by',
            'published_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
