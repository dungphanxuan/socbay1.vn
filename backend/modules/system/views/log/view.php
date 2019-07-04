<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SystemLog */

$this->title = Yii::t('backend', 'Error #{id}', ['id' => $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'System Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js')
?>
<div class="system-log-view">

    <div class="row">
        <div class="col-md-6">
            <p>
                <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['method' => 'post']]) ?>
            </p>
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <p>
                    <?php echo Html::a(Yii::t('backend', 'Log Item'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary', 'data' => ['method' => 'post']]) ?>
                </p>
            </div>
        </div>
    </div>


    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'level',
            'category',
            [
                'attribute' => 'log_time',
                'format' => 'datetime',
                'value' => (int)$model->log_time
            ],
            'prefix:ntext',
            [
                'attribute' => 'message',
                'format' => 'raw',
                'value' => Html::tag('pre', $model->message, ['style' => 'white-space: pre-wrap'])
            ],
        ],
    ]) ?>
</div>
