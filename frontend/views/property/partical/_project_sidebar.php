<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/27/2017
 * Time: 9:19 AM
 */

use common\models\property\Project;
use common\models\property\ProjectArea;
use common\models\property\ProjectPrice;
use dungphanxuan\vnlocation\models\City;
use frontend\assets\AdsAsset;
use common\models\property\ProjectCategory;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$allCity = City::getList();
$dataPrice = ProjectPrice::getList();
$dataArea = ProjectArea::getList();

$cityProject = Project::getCityList();

$catProject = ProjectCategory::getCatList(true);


//Init Sidebar Value
$getPriceValue = getParam('price-range', null);
$getAreaValue = getParam('area-range', null);

$getCities = getParam('city', null);
if ($getCities) {
    $getCities = explode(",", $getCities);
}

$bundle = AdsAsset::register($this);
?>

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Loại hình</a></strong></h5>
    <div class="filter-content filter-employment-type">
        <ul class="browse-list list-unstyled">
            <li>
                <input type="checkbox" id="employment_all" value="all" class="emp"
                       checked="checked">
                <label for="employment_all">Tất cả</label>
            </li>
            <li>
                <input type="checkbox" id="employment_jtft" value="jtft"
                       class="emp emp-type">
                <label for="employment_jtft">Chung cư</label>
            </li>
            <li>
                <input type="checkbox" id="employment_jtpt" value="jtpt"
                       class="emp emp-type">
                <label for="employment_jtpt">Biệt thự, liền kề</label>
            </li>
            <li>
                <input type="checkbox" id="employment_jtct" value="jtct"
                       class="emp emp-type">
                <label for="employment_jtct">Đất nền</label>
            </li>
            <li>
                <input type="checkbox" id="employment_jtin" value="jtin"
                       class="emp emp-type">
                <label for="employment_jtin">Nhà phố</label>
            </li>
            <li>
                <input type="checkbox" id="employment_jtse" value="jtse"
                       class="emp emp-type">
                <label for="employment_jtse">Khu nghỉ dưỡng</label>
            </li>
        </ul>
    </div>
</div>

    <div class="locations-list list-filter">
        <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'City') ?></a></strong></h5>
    <ul class="browse-list list-unstyled">

        <?php
        echo Html::checkboxList('property_city', $getCities, $cityProject,
            [
                'class' => 'browse-list list-unstyled', 'tag' => 'ul', 'id' => 'pcity',

                'item' => function ($index, $label, $name, $checked, $value) {
                    $checkedLabel = $checked ? 'checked' : '';

                    $temp = <<<HTML
                       <li>
    <input type="checkbox" name="$name" value="$value" id="ecity$value" class="emp-city"
           $checkedLabel>
    <label for="ecity$value">$label</label>
</li>
HTML;

                    return $temp;
                }

            ]);
        ?>

    </ul>
</div>
<!--/.locations-list-->

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Price') ?></a></strong></h5>

    <div class="clearfix"></div>

    <?php
    echo Html::checkboxList('property_price', $getPriceValue, $dataPrice,
        [
            'class' => 'mt15 long-list-price', 'tag' => 'ul', 'id' => 'pprice',

            'item' => function ($index, $label, $name, $checked, $value) {
                $checkedLabel = $checked ? 'checked' : '';

                $temp = <<<HTML
                       <li>
    <input type="radio" $checked name="$name" value="$value" id="eprice$value" class="emp-price"
           $checkedLabel>
    <label for="eprice$value">$label</label>
</li>
HTML;

                return $temp;
            }

        ]);
    ?>
    <div style="clear:both"></div>
</div>
<!--/.list-filter-->
<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Area') ?></a></strong></h5>
    <?php
    echo Html::checkboxList('property_area', $getAreaValue, $dataArea,
        [
            'class' => 'mt15', 'tag' => 'ul', 'id' => 'parea',

            'item' => function ($index, $label, $name, $checked, $value) {
                $checkedLabel = $checked ? 'checked' : '';

                $temp = <<<HTML
                       <li>
    <input type="radio" $checked name="$name" value="$value" id="earea$value" class="emp-area"
           $checkedLabel>
    <label for="earea$value">$label</label>
</li>
HTML;

                return $temp;
            }

        ]);
    ?>
</div>
<!--/.list-filter-->
<div style="clear:both"></div>

<?php
$app_js = <<<JS
  $('.long-list-price').hideMaxListItems({
        'max': 7,
        'speed': 500,
        'moreText': 'Thêm ([COUNT])',
        'lessText': 'Vừa'
    });
JS;

$this->registerJs($app_js);