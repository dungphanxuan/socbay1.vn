<?php

use yii\helpers\Html;
use yii\helpers\Url;
use \frontend\assets\AdsAsset;
use yii\web\View;
use common\helpers\GoogleAnalytics;
use common\helpers\FacebookAnalytics;

/* @var $this \yii\web\View */
/* @var $content string */

AdsAsset::register($this);

/*$this->registerLinkTag([
    'rel'   => 'search',
    'type'  => 'application/opensearchdescription+xml',
    'title' => 'Socbay Search',
    'href'  => Url::toRoute(['search/opensearch-description']),
]);*/

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo baseUrl() . '/frontend/web/theme/images/favicon/apple-icon-114x114.png' ?>">
    <link rel="shortcut icon" href="<?php echo baseUrl() . '/frontend/web/theme/images/favicon/socbay-16x16.png' ?>">
    <title><?php echo Html::encode($this->title) ?></title>
    <meta name="theme-color" content="#4ea64e">
    <?php $this->head() ?>

    <?php echo Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php echo $content ?>
<?php GoogleAnalytics::track('UA-117250704-1') ?>
<?php FacebookAnalytics::track('2193463547548556') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
