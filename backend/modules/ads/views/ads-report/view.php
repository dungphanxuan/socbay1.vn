<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsReport */

$this->title = $model->title ? $model->title : 'Report';
$this->params['breadcrumbs'][] = ['label' => 'Ads Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-report-view">

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
            'reason_id',
            'title',
            'body:ntext',
            'report_id',
            'user_id',
            'user_email:email',
            'city_id',
            'district_id',
            'ward_id',
            'status',
            'sort_number',
            'approve_by',
            'created_by',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
