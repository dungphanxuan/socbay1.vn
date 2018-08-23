<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 8/26/2017
 * Time: 11:35 AM
 */

/* @var $this yii\web\View */

?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-th-large"></span>
            <?php echo Yii::t('backend', 'Menu'); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo \yii\widgets\Menu::widget([
            'options' => [
                'class' => 'nav nav-pills nav-stacked',
            ],
            'items'   => [
                ['label' => Yii::t('backend', 'Setting'), 'url' => ['/site/settings']],
                ['label' => Yii::t('backend', 'Content'), 'url' => ['/site/setting-content']],
                ['label' => Yii::t('backend', 'TOTP'), 'url' => ['/site/otp-qr']],
                ['label' => 'Catalog',
                 'url'   => ['product/index'],
                 'items' => [
                     ['label' => 'New Arrivals', 'url' => ['product/new']],
                     ['label' => 'Most Popular', 'url' => ['product/popular']],
                 ]
                ],
            ],
        ]) ?>
    </div>
</div>
