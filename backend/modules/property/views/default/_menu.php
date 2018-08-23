<?php

use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 8/26/2017
 * Time: 11:35 AM
 */

/* @var $this yii\web\View */

$action = \Yii::$app->controller->id;
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-th-large"></span>
            <?php echo Yii::t('backend', 'Project Menu'); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo Menu::widget([
            'options' => [
                'class' => 'nav nav-pills nav-stacked',
            ],
            'items'   => [
                ['label' => Yii::t('backend', 'Category'), 'url' => ['/property/project-category'], 'active' => $action == 'project-category' ? true : false],
                ['label' => Yii::t('backend', 'Price'), 'url' => ['/property/project-price'], 'active' => $action == 'project-price' ? true : false],
                ['label' => Yii::t('backend', 'Area'), 'url' => ['/property/project-area'], 'active' => $action == 'project-area' ? true : false],
                ['label' => Yii::t('backend', 'Status'), 'url' => ['/property/project-status'], 'active' => $action == 'project-status' ? true : false],
                ['label' => Yii::t('backend', 'Type'), 'url' => ['/property/project-type'], 'active' => $action == 'project-type' ? true : false],
                ['label' => Yii::t('backend', 'Rank'), 'url' => ['/property/project-rank'], 'active' => $action == 'project-rank' ? true : false],
            ],
        ]) ?>
    </div>
</div>
