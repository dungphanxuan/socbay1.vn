<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\property\ProjectPickup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Pickups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-pickup-view">

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
            'project_id',
            'sort_number',
        ],
    ]) ?>

</div>
