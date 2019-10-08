<?php
/**
 * @var \yii\web\View $this
 * @var integer $starValue
 * @var string $ajaxUrl
 */

use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<a class="save-job" href="javascript: void(0)">
    <?= Html::tag('span', '', [
        'class' => 'fa ' . ($starValue ? 'fa-star' : 'fa-star-o'),
        'data-star-url' => $ajaxUrl,
        'data-pjax' => 0
    ]) ?>
    Lưu việc
</a>
