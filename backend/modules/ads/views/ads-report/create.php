<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsReport */

$this->title = 'Create Ads Report';
$this->params['breadcrumbs'][] = ['label' => 'Ads Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-report-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'reasons' => $reasons,

    ]) ?>

</div>
