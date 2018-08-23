<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var $this    \yii\web\View
 * @var $content string
 */

use yii\helpers\Html;

\yii\bootstrap\BootstrapAsset::register($this)
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?php echo \Yii::$app->language; ?>">
    <head>
        <meta charset="<?php echo \Yii::$app->charset; ?>">
        <title><?php echo Html::encode(Yii::$app->name); ?> - Comming Soon</title>
        <?php $this->head(); ?>
    </head>
    <body class="maintenance-body" id="top">
    <?php $this->beginBody() ?>
    <?php echo $content; ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>