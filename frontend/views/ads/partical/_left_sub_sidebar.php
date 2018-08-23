<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\ArticleCategory;
use common\helpers\LocationHelper;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/11/2017
 * Time: 11:06 AM
 */

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$dataRootCategory = ArticleCategory::getList(null, true);

$dataLocation = LocationHelper::getAllCity();
?>
<div class="categories-list  list-filter">
    <h5 class="list-title"><strong>
            <a href="category.html"><i class="fa fa-angle-left"></i>All Categories</a></strong>
    </h5>
    <ul class=" list-unstyled">
        <li>
            <a href="#"><span class="title"><strong>Electronics</strong></span><span
                        class="count">&nbsp;86626</span></a>
            <ul class=" list-unstyled long-list">
                <li><a href="#">Air Condition <span class="count">(143)</span></a></li>
                <li><a href="#">Cameras <span class="count">(182)</span></a></li>
                <li><a href="#">Computers &amp; Telecoms <span
                                class="count">(532)</span></a></li>
                <li><a href="#">Music &amp; Audio<span class="count"> (347)</span></a></li>
                <li><a href="#">Office Electronics <span class="count">(168)</span></a></li>
                <li><a href="#">Home Appliances <span class="count">(342)</span></a></li>
                <li><a href="#">IPS, UPS, Batteries &amp; Generators <span
                                class="count">(2)</span></a></li>
                <li><a href="#"> Security &amp; Surveillance Systems <span class="count">(30) </span></a>
                </li>
                <li><a href="#">Satellite &amp; Equipments <span
                                class="count">(27)</span></a></li>
                <li><a href="#">TVs &amp; Players <span class="count">(6716)</span></a></li>
                <li><a href="#">GPS Devices <span class="count">(123)</span></a></li>
                <li><a href="#">Video Games & Consoles <span class="count"> (321)</span></a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!--/.categories-list-->

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
    <ul class="browse-list list-unstyled">
        <li><a href="#"><strong>Hà Nội</strong> </a>
            <ul class="long-list">
                <li><a href="#" title="">All Cities</a></li>
                <li><a href="#" title="Albany">Albany</a></li>
                <li><a href="#" title="Altamont">Altamont</a></li>
                <li><a href="#" title="Amagansett">Amagansett</a></li>
                <li><a href="#" title="Amawalk">Amawalk</a></li>

                <li><a href="#" title="Bellport">Bellport</a></li>
                <li><a href="#" title="Centereach">Centereach</a></li>
                <li><a href="#" title="Chappaqua">Chappaqua</a></li>

                <li><a href="#" title="East Elmhurst">East Elmhurst</a></li>
                <li><a href="#" title="East Greenbush">East Greenbush</a></li>
                <li><a href="#" title="East Meadow">East Meadow</a></li>

                <li><a href="#" title="Elmont">Elmont</a></li>
                <li><a href="#" title="Elmsford">Elmsford</a></li>
                <li><a href="#" title="Farmingville">Farmingville</a></li>
                <li><a href="#" title="Floral Park">Floral Park</a></li>
                <li><a href="#" title="Flushing">Flushing</a></li>
                <li><a href="#" title="Fonda">Fonda</a></li>
                <li><a href="#" title="Garden City">Garden City</a></li>
                <li><a href="#" title="Garrison">Garrison</a></li>

                <li><a href="#" title="Greenlawn">Greenlawn</a></li>
                <li><a href="#" title="Greenville">Greenville</a></li>
                <li><a href="#" title="Hampton Bays">Hampton Bays</a></li>
                <li><a href="#" title="Harrison">Harrison</a></li>
                <li><a href="#" title="Hastings On Hudson">Hastings On Hudson</a></li>


                <li><a href="#" title="Levittown">Levittown</a></li>
                <li><a href="#" title="Lindenhurst">Lindenhurst</a></li>
                <li><a href="#" title="Little Neck">Little Neck</a></li>
                <li><a href="#" title="Lynbrook">Lynbrook</a></li>

                <li><a href="#" title="New City">New City</a></li>
                <li><a href="#" title="New Hyde Park">New Hyde Park</a></li>
                <li><a href="#" title="New Rochelle">New Rochelle</a></li>
                <li><a href="#" title="New Suffolk">New Suffolk</a></li>
                <li><a href="#" title="Hà Nội">Hà Nội</a></li>

                <li><a href="#" title="Oceanside">Oceanside</a></li>
                <li><a href="#" title="Orangeburg">Orangeburg</a></li>
                <li><a href="#" title="Orient">Orient</a></li>

                <li><a href="#" title="Peru">Peru</a></li>
                <li><a href="#" title="Piermont">Piermont</a></li>

                <li><a href="#" title="Pomona">Pomona</a></li>
                <li><a href="#" title="Port Chester">Port Chester</a></li>

                <li><a href="#" title="Putnam Valley">Putnam Valley</a></li>

                <li><a href="#" title="Saint Albans">Saint Albans</a></li>
                <li><a href="#" title="Saint James">Saint James</a></li>

                <li><a href="#" title="Syosset">Syosset</a></li>
                <li><a href="#" title="Syracruse">Syracruse</a></li>

                <li><a href="#" title="Walden">Walden</a></li>

                <li><a href="#" title="Westbury">Westbury</a></li>
                <li><a href="#" title="Westtown">Westtown</a></li>

                <li><a href="#" title="Yorktown Heights">Yorktown Heights</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--/.locations-list-->

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

    <form role="form" class="form-inline ">
        <div class="form-group col-lg-4 col-md-12 no-padding">
            <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
        </div>
        <div class="form-group col-lg-1 col-md-12 no-padding text-center hidden-md"> -</div>
        <div class="form-group col-lg-4 col-md-12 no-padding">
            <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
        </div>
        <div class="form-group col-lg-3 col-md-12 no-padding">
            <button class="btn btn-default pull-right btn-block-md" type="submit">GO
            </button>
        </div>
    </form>
    <div style="clear:both"></div>
</div>
<!--/.list-filter-->
<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
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
<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
    <ul class="browse-list list-unstyled long-list">
        <li><a href="">New <span class="count">228,705</span></a>
        </li>
        <li><a href="">Used <span class="count">28,705</span></a>
        </li>
        <li><a href="">None </a></li>
    </ul>
</div>
<!--/.list-filter-->
<div style="clear:both"></div>