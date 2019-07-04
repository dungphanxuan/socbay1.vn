<?php
/**
 * @var \yii\web\View $this
 * @var integer $starValue
 * @var string $ajaxUrl
 */

use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<a class="btn btn-default  btn-sm make-favorite" href="javascript: void(0)">
    <?= Html::tag('i', '', [
        'class' => 'fa ' . ($starValue ? 'fa-star' : 'fa-star-o'),
        'data-star-url' => $ajaxUrl
    ]) ?>
    <span><?= Yii::t('ads', 'Save') ?></span>
</a>


