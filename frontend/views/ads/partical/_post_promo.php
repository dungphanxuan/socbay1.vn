<?php

use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/13/2017
 * Time: 1:50 PM
 */
$type = 'mobile';
?>
<div class="post-promo text-center">
    <h2> <?php echo Yii::t('ads', 'Do you get anything for sell ?') ?></h2>
    <h5> <?php echo Yii::t('ads', 'Sell your products online FOR FREE. It\'s easier than you think !') ?>!</h5>
    <a href="<?php echo Url::to(['/ads/create', 'type' => $type]) ?>" class="btn btn-lg btn-border btn-post btn-danger"><i
                class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo Yii::t('ads', 'Post a Free Ad') ?> </a>
</div>
<!--/.post-promo-->
