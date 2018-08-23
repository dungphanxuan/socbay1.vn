<?php

use common\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model common\models\property\Project */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $ranks */
/* @var $categories */

$this->title = 'Cập nhật dự án: ' . ' ' . StringHelper::truncate($model->title, 70);
$this->params['breadcrumbs'][] = ['label' => 'Dự án BDS', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="project-update">

    <?php echo $this->render('_form', [
        'model'        => $model,
        'categories'   => $categories,
        'prices'       => $prices,
        'areas'        => $areas,
        'ranks'        => $ranks,
        'cities'       => $cities,
        'dataDistrict' => $dataDistrict,
        'dataWard'     => $dataWard,
    ]) ?>

</div>
