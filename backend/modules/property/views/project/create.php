<?php


/* @var $this yii\web\View */
/* @var $model common\models\property\Project */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $ranks */
/* @var $categories */

$this->title = 'Thêm mới dự án BDS';
$this->params['breadcrumbs'][] = ['label' => 'Dự án BDS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

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
