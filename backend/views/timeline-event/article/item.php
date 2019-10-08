<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var $model common\models\TimelineEvent
 */

use yii\helpers\Html;

/**
 * Eugine Terentev <eugine@terentev.net>
 * @var $this         \yii\web\View
 * @var $model        \common\models\TimelineEvent
 */
?>
<!-- timeline icon -->
<i class="fa fa-star bg-green"></i>
<div class="timeline-item">
    <span class="time">
        <i class="fa fa-clock-o"></i>
        <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

    <h3 class="timeline-header">
        <?php echo Yii::t('backend', 'You have new article!') ?>
    </h3>

    <div class="timeline-body">
        <?php echo Yii::t('backend', 'New article ({title}) was published at {created_at}', [
            'title' => $model->data['title'],
            'created_at' => Yii::$app->formatter->asDatetime($model->data['created_at'])
        ]) ?>
    </div>

    <div class="timeline-footer">
        <?php echo Html::a(
            Yii::t('backend', 'View Article'),
            ['/article/update', 'id' => $model->data['article_id']],
            ['class' => 'btn btn-success btn-sm', 'data-pjax' => 0]
        ) ?>
        &nbsp;
        <?php echo Html::a(
            '<i class="fa fa-eye"></i> ' . Yii::t('backend', 'Show Article'),
            ['/article/show', 'id' => $model->data['article_id']],
            ['class' => 'btn btn-info btn-sm', 'data-pjax' => 0, 'target' => '_blank']
        ) ?>
    </div>
</div>