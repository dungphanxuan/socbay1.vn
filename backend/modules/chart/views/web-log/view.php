<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Web Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-log-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-flat btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-flat btn-danger',
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
            'user_ip',
            'action',
            'url:url',
            'time:datetime',
            'type',
        ],
    ]) ?>

</div>
