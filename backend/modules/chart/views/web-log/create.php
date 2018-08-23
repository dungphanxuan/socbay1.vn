<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebLog */

$this->title = 'Create Web Log';
$this->params['breadcrumbs'][] = ['label' => 'Web Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-log-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
