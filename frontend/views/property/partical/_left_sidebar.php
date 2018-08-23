<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/27/2017
 * Time: 9:19 AM
 */

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$bundle = \frontend\assets\AdsAsset::register($this);
?>
<div class="categories-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Bất động sản</a></strong></h5>
    <div class="filter-content filter-employment-type">
        <ul class="browse-list list-unstyled">
            <li>
                <input type="checkbox" id="employment_all" value="all" class="emp"
                       checked="checked">
                <label for="employment_all">All</label>
            </li>
            <li>
                <input type="checkbox" id="employment_jtft" value="jtft"
                       class="emp emp-type">
                <label for="employment_jtft">Cho thuê</label>
            </li>
            <li>
                <input type="checkbox" id="employment_jtpt" value="jtpt"
                       class="emp emp-type">
                <label for="employment_jtpt">Mua bán</label>
            </li>

        </ul>
    </div>
</div>
<!--/.categories-list-->

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Loại hình</a></strong></h5>
    <div class="filter-content filter-employment-type">
        <ul class="browse-list list-unstyled">
            <li>
                <input type="checkbox" id="employment_all" value="all" class="emp"
                       checked="checked">
                <label for="employment_all">All</label>
            </li>
            <li>
                <input type="checkbox" id="property_type" value="jtft"
                       class="emp emp-type">
                <label for="employment_jtft">Chung cư</label>
            </li>
            <li>
                <input type="checkbox" id="property_type" value="jtpt"
                       class="emp emp-type">
                <label for="employment_jtpt">Biệt thự, liền kề</label>
            </li>
            <li>
                <input type="checkbox" id="property_type" value="jtct"
                       class="emp emp-type">
                <label for="employment_jtct">Đất nền</label>
            </li>
            <li>
                <input type="checkbox" id="property_type" value="jtin"
                       class="emp emp-type">
                <label for="employment_jtin">Nhà phố</label>
            </li>
            <li>
                <input type="checkbox" id="property_type" value="jtse"
                       class="emp emp-type">
                <label for="employment_jtse">Khu nghỉ dưỡng</label>
            </li>
        </ul>
    </div>
</div>

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Tỉnh/Thành Phố</a></strong></h5>
    <ul class="browse-list list-unstyled long-list">
        <li><a href=""> Hà Nội </a></li>
        <li><a href=""> Hồ Chí Minh </a></li>
        <li><a href=""> Đà Nẵng </a></li>
    </ul>
</div>
<!--/.locations-list-->

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Mức giá</a></strong></h5>

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
    <div style="clear:both"></div>
</div>
<!--/.list-filter-->
<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Diện tích</a></strong></h5>
    <ul class="browse-list list-unstyled long-list">
        <li><a href=""><strong>All Ads</strong> <span
                        class="count">228,705</span></a></li>
        <li><a href="">Business <span
                        class="count">28,705</span></a></li>
        <li><a href="">Personal <span
                        class="count">18,705</span></a></li>
    </ul>
</div>
<!--/.list-filter-->
<div style="clear:both"></div>
