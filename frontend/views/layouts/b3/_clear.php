<?php

use yii\helpers\Html;
use frontend\assets\FrontendAsset;
use common\helpers\FacebookAnalytics;

/* @var $this \yii\web\View */
/* @var $content string */

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo baseUrl() . '/frontend/web/html/images/ico/apple-touch-icon-144-precomposed.png' ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo baseUrl() . '/frontend/web/html/images/ico/apple-touch-icon-114-precomposed.png' ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo baseUrl() . '/frontend/web/html/images/ico/apple-touch-icon-72-precomposed.png' ?>/">
    <link rel="apple-touch-icon-precomposed"
          href="<?php echo baseUrl() . '/frontend/web/html/images/ico/apple-touch-icon-57-precomposed.png' ?>/">
    <link rel="shortcut icon" href="<?php echo baseUrl() . '/frontend/web/html/images/ico/favicon.png' ?>">
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php FacebookAnalytics::track('2193463547548556') ?>
<?php echo $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
