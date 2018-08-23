<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/27/2017
 * Time: 9:19 AM
 */

use yii\helpers\Url;
use yii\helpers\Html;
use dungphanxuan\vnlocation\models\City;
use common\models\property\ProjectPrice;
use common\models\property\ProjectArea;
use common\models\property\ProjectCategory;
use frontend\assets\AdsAsset;
use common\models\data\LocationData;


/* @var $this yii\web\View */

$cityList = LocationData::getList(3);
$dataPrice = ProjectPrice::getList();
$dataArea = ProjectArea::getList();

$dataProjectCat = ProjectCategory::getCatList();
$bundle = AdsAsset::register($this);
?>
<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Property Type') ?></a></strong></h5>
    <div class="filter-content filter-employment-type">
        <?php
        echo Html::checkboxList('property_type', [], $dataProjectCat,
            [
                'class' => 'browse-list list-unstyled', 'tag' => 'ul', 'id' => 'ptype',

                'item' => function ($index, $label, $name, $checked, $value) {
                    $checked = $checked ? 'checked' : '';

                    $temp = <<<HTML
                       <li>
    <input type="checkbox" $checked name="$name" value="$value" id="etype$value" class="emp"
           $checked>
    <label for="etype$value">$label</label>
</li>
HTML;

                    return $temp;
                }

            ]);
        ?>
    </div>
</div>
<!--/.categories-list-->

<div class="locations-list list-filter">
    <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'City') ?></a></strong></h5>
    <ul class="browse-list list-unstyled">

        <?php
        echo Html::checkboxList('property_city', [1], $cityList,
            [
                'class' => 'browse-list list-unstyled', 'tag' => 'ul', 'id' => 'pcity',

                'item' => function ($index, $label, $name, $checked, $value) {
                    $checked = $checked ? 'checked' : '';

                    $temp = <<<HTML
                       <li>
    <input type="checkbox" $checked name="$name" value="$value" id="ecity$value" class="emp-city"
           $checked>
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
    echo Html::checkboxList('property_price', [1], $dataPrice,
        [
            'class' => 'mt15', 'tag' => 'ul', 'id' => 'pprice',

            'item' => function ($index, $label, $name, $checked, $value) {
                $checked = $checked ? 'checked' : '';

                $temp = <<<HTML
                       <li>
    <input type="radio" $checked name="$name" value="$value" id="eprice$value" class="emp-price"
           $checked>
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
    echo Html::checkboxList('property_area', [1], $dataArea,
        [
            'class' => 'mt15', 'tag' => 'ul', 'id' => 'parea',

            'item' => function ($index, $label, $name, $checked, $value) {
                $checked = $checked ? 'checked' : '';

                $temp = <<<HTML
                       <li>
    <input type="radio" $checked name="$name" value="$value" id="earea$value" class="emp-area"
           $checked>
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

