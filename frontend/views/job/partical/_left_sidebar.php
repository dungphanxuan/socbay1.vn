<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/8/2018
 * Time: 4:14 PM
 */

use yii\widgets\Menu;
use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\data\LocationData;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $providerJobCat \yii\data\ArrayDataProvider */

$jobTypes = \common\models\job\JobType::getTypeList();
$getTypes = getParam('city', null);
if ($getTypes) {
    $getTypes = explode(",", $getTypes);
}
?>
<div class=" list-filter">
    <h5 class="list-title"><strong><a href="#"> Ngày đăng tin </a></strong></h5>

    <div class="filter-date filter-content">
        <ul>
            <li>
                <input type="radio" value="1" id="posted_1" name="posted">
                <label for="posted_1">24 hours</label>
            </li>
            <li>
                <input type="radio" value="3" id="posted_3" name="posted">
                <label for="posted_3">3 days</label>
            </li>
            <li>
                <input type="radio" value="7" id="posted_7" name="posted">
                <label for="posted_7">7 days</label>
            </li>
            <li>
                <input type="radio" checked="checked" value="30" id="posted_30"
                       name="posted">
                <label for="posted_30">30 days</label>
            </li>
        </ul>
    </div>
</div>
<!--/.categories-list-->

<div class="list-filter">
    <h5 class="list-title"><strong><a href="#">Loại hình công việc</a></strong></h5>

    <div class="filter-content filter-employment-type">
        <?php
        echo Html::checkboxList('job_type', $getTypes, $jobTypes,
            [
                'class' => 'browse-list list-unstyled', 'tag' => 'ul', 'id' => 'pjType',

                'item' => function ($index, $label, $name, $checked, $value) {
                    $checkedLabel = $checked ? 'checked' : '';

                    $temp = <<<HTML
                       <li>
    <input type="checkbox" name="$name" value="$value" id="jtype$value" class="emp-type"
           $checkedLabel>
    <label for="jtype$value">$label</label>
</li>
HTML;

                    return $temp;
                }

            ]);
        ?>
    </div>


</div>
<!--/.locations-list-->

<div class="  list-filter">
    <h5 class="list-title"><strong><a href="#">Lương</a></strong></h5>


    <div class="filter-salary filter-content">

        <div class="clearfix"></div>

        <ul class="mt15">
            <li>
                <input type="radio" name="pay" id="pay_0" value="0" checked="checked">
                <label for="pay_0">Any</label>
            </li>
            <li>
                <input type="radio" name="pay" id="pay_20" value="20">
                <label for="pay_20">$20,000+</label>
            </li>
            <li>
                <input type="radio" name="pay" id="pay_40" value="40">
                <label for="pay_40">$40,000+</label>
            </li>
        </ul>
    </div>
    <div style="clear:both"></div>
</div>
<!--/.list-filter-->


<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Chuyên môn</a></strong></h5>


    <ul class="browse-list list-unstyled long-list">
        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $providerJobCat,
            'layout' => '{items}',
            'itemView' => '@frontend/views/job/item/_item_job_cat_sidebar_index',
            'options' => [
                'tag' => false,
            ],
            'itemOptions' => [
                'tag' => false,
            ]
        ]) ?>
    </ul>

</div>
<!--/.list-filter-->

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Vị trí</a></strong></h5>
    <?php
    echo Menu::widget([
        'items' => LocationData::getCityItemMenu(),
        'activeCssClass' => 'activeclass',
        'options' => [
            'class' => 'browse-list list-unstyled long-list'
        ]
    ]);
    ?>
</div>
<!--/.locations-list-->

<div style="clear:both"></div>
