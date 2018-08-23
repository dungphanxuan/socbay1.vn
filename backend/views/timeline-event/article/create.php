<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var $model common\models\TimelineEvent
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
        <?php echo Yii::t('backend', 'New article ({identity}) was created at {created_at}', [
            'identity'   => $model->data['project_title'],
            'created_at' => Yii::$app->formatter->asDatetime($model->data['created_at'])
        ]) ?>
    </div>

    <div class="timeline-footer">
        <?php echo \yii\helpers\Html::a(
            Yii::t('backend', 'View Article'),
            ['/article/view', 'id' => $model->data['article_id']],
            ['class' => 'btn btn-success btn-sm']
        ) ?>
    </div>
</div>