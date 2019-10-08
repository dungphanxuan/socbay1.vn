<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FileStorageItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'File Storage Items'), 'url' => ['index']];
?>
    <div class="file-storage-item-view">

        <p>
            <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'component',
                'base_url:url',
                'path',
                'type',
                'size',
                'name',
                'created_by',
                'upload_ip',
                'created_at:datetime',
            ],
        ]) ?>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <?php
                    echo Html::img(null, ['class' => 'img-responsive tocenter  lazy', 'data-src' => $model->base_url . '/' . $model->path])
                    ?>
                </div>
            </div>
        </div>


    </div>

<?php
$app_css = <<<CSS
 .tocenter {
    margin:0 auto;
    display: inline;
    }
CSS;

$this->registerCss($app_css);
