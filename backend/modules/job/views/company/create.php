<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\job\Company */

$this->title = 'Create Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
