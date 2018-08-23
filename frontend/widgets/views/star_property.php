<?php
/**
 * @var \yii\web\View $this
 * @var integer       $starValue
 * @var string        $ajaxUrl
 */

use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<a href="javascript: void(0)" class="btn btn-border-thin  btn-save" title="ưu thích" data-toggle="tooltip"
   data-placement="left">
    <?= Html::tag('i', '', [
        'class'         => 'fa ' . ($starValue ? 'fa-star' : 'fa-star-o'),
        'data-star-url' => $ajaxUrl
    ]) ?>
</a>

