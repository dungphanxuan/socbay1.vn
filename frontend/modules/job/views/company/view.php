<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\job\Company */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="company-view">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data'  => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method'  => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model'      => $model,
                        'attributes' => [
                            'id',
                            'size_id',
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

                            'type',
                            'status',
                            'user_id',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>

