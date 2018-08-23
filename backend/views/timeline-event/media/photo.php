<?php

/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var $model common\models\TimelineEvent
 */
?>
<!-- timeline icon -->
<i class="fa fa-camera bg-purple"></i>

<div class="timeline-item">
    <span class="time"><i class="fa fa-clock-o"></i>
        <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

    <div class="timeline-body">
        <img src="http://placehold.it/150x100" alt="..." class="margin">
        <img src="http://placehold.it/150x100" alt="..." class="margin">
        <img src="http://placehold.it/150x100" alt="..." class="margin">
        <img src="http://placehold.it/150x100" alt="..." class="margin">
    </div>
</div>