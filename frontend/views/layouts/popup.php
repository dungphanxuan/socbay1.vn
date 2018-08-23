<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/16/2018
 * Time: 11:06 AM
 */

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<?php echo Html::beginTag('body') ?>
<?php $this->beginBody() ?>
<?php echo $content ?>
<?php $this->endBody() ?>
<?php echo Html::endTag('body') ?>
<?php $this->endPage() ?>
