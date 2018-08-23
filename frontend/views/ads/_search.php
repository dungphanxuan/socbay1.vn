<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use dungphanxuan\vnlocation\models\City;
use common\models\data\LocationData;
use common\models\ArticleCategory;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/12/2017
 * Time: 10:45 AM
 */
/* @var $this yii\web\View */

$getLocationCity = getParam('location', null);

$cityId = 0;
$categoryId = 0;
if ($getLocationCity) {
    /** @var City $cityModel */
    $cityModel = LocationData::getCity($getLocationCity, 2);
    if ($cityModel) {
        $cityId = $cityModel['slug'];
    }
}
$catSearchValue = null;
$getCategorySearch = getParam('category', null);
if ($getCategorySearch) {
    /** @var ArticleCategory $catData */
    $catData = ArticleCategory::find()->where(['slug' => $getCategorySearch])->one();
    if ($catData) {
        $catSearchValue = $catData->slug;
    }
}
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>
<div class="row">
    <div class="col-md-3">
        <?php echo Html::textInput('title', getParam('title', ''), ['class' => 'form-control keyword', 'placeholder' => 'e.g. Điện thoại']) ?>
    </div>
    <div class="col-md-3">
        <?php
        echo Html::dropDownList('category', $catSearchValue, ArticleCategory::getDataCategory(null, true), ['class' => 'form-control selecter', 'id' => 'id-category', 'prompt' => 'Chọn danh mục'])
        ?>
    </div>
    <div class="col-md-3">
        <?php
        echo Html::dropDownList('location', $cityId, LocationData::getList(), ['class' => 'form-control selecter', 'id' => 'id-location', 'prompt' => 'Tỉnh/Thành phố'])
        ?>
    </div>
    <div class="col-md-3">
        <button class="btn btn-block btn-primary  "><i class="fa fa-search"></i></button>
    </div>
</div>
<?php ActiveForm::end(); ?>
