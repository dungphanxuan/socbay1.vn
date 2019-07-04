<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\property\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dự án BDS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
$frontendProjectUrl = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/property/project-view', 'id' => $model->id, 'name' => $model->slug]);

?>
<div class="project-view">

    <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <a href="<?php echo $frontendProjectUrl ?>" class="btn btn-success" target="_blank">Frontend View</a>
            </div>
        </div>
    </div>


    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'slug',
            'title',
            'body:html',
            'level',
            'price',
            'price_to',
            'num_of_rooms',
            'lat',
            'lng',
            'sort_number',
            'status',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
