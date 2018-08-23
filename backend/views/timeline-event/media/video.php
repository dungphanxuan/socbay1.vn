<?php

/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var $model common\models\TimelineEvent
 */
?>
<!-- timeline icon -->
<i class="fa fa-video-camera bg-maroon"></i>

<div class="timeline-item">
    <span class="time"><i class="fa fa-clock-o"></i>
        <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </span>

    <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

    <div class="timeline-body">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                    frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="timeline-footer">
        <a href="#" class="btn btn-xs bg-maroon">See comments</a>
    </div>
</div>