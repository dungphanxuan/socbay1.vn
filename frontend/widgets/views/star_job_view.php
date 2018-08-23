<?php
/**
 * @var \yii\web\View $this
 * @var integer $starValue
 * @var string $ajaxUrl
 */

use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<a href="javascript: void(0)">
    <?= Html::tag('i', '', [
        'class'         => 'fa ' . ($starValue ? 'fa fa-star' : 'fa fa-star-o'),
        'data-star-url' => $ajaxUrl,
        'data-pjax'     => 0
    ]) ?>Lưu việc
</a>
