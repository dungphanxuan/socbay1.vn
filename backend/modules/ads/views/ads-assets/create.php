<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ads\AdsAssets */

$this->title = 'Create Ads Assets';
$this->params['breadcrumbs'][] = ['label' => 'Ads Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-assets-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
