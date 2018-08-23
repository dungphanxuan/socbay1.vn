<?php

use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php')
?>
<?php echo $content ?>
<?php $this->endContent() ?>