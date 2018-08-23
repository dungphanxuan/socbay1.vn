<?php
/**
 * @var \yii\web\View $this
 * @var integer       $starValue
 * @var string        $ajaxUrl
 */

use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<li><a href="javascript: void(0)">

        <?= Html::tag('i', '', [
            'class'         => 'fa ' . ($starValue ? 'fa-star' : 'fa-star-o'),
            'data-star-url' => $ajaxUrl
        ]) ?>  <?php if (isset($starCount)): ?>
            <?= Yii::t('ads', 'Save ad') ?> (<span class="star-count"><?= (int)$starCount ?></span>)
        <?php endif; ?></a>
</li>

