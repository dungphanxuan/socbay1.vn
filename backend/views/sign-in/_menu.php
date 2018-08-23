<?php

use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 8/26/2017
 * Time: 11:35 AM
 */
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-th-large"></span>
            <?php echo Yii::t('backend', 'Account'); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo Menu::widget([
            'options' => [
                'class' => 'nav nav-pills nav-stacked',
            ],
            'items'   => [
                ['label' => Yii::t('backend', 'Account'), 'url' => ['/sign-in/account']],
                ['label' => Yii::t('backend', 'Profile'), 'url' => ['/sign-in/profile']],
                ['label' => Yii::t('backend', 'Setting'), 'url' => ['/site/otp-qr']],

            ],
        ]) ?>
    </div>
</div>
