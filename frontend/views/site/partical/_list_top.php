<?php

use yii\helpers\Url;
use yii\helpers\Html;
use dungphanxuan\vnlocation\models\City;
use common\models\data\LocationData;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/26/2017
 * Time: 3:48 PM
 */

/* @var $this yii\web\View */
?>

<div style="clear: both"></div>
<div class="tab-lite relative w100">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs " role="tablist">
        <li role="presentation" class="active nav-item"><a href="#tab1" aria-controls="tab1"
                                                           role="tab" data-toggle="tab"
                                                           class="nav-link"><i
                        class="icon-location-2"></i> Vị trí</a>
        </li>
        <li role="presentation" class="nav-item"><a href="#tab2" aria-controls="tab2" role="tab"
                                                    data-toggle="tab" class="nav-link"><i
                        class="icon-search"></i> Tìm kiếm nhiều</a>
        </li>
        <li role="presentation" class="nav-item"><a href="#tab3" aria-controls="tab3" role="tab"
                                                    data-toggle="tab" class="nav-link"><i
                        class="icon-th-list"></i> Xu hướng</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab1">
            <div class="col-xl-12 tab-inner">
                <div class="row">
                    <ul class="cat-list col-md-3  col-6 col-xxs-12">
                        <?php
                        $dataPart = LocationData::getPartList(0);
                        foreach ($dataPart as $key => $item):
                            ?>
                            <li><a href="<?php echo Url::to(['/ads/index', 'city' => $key]) ?>"><?php echo $item ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <?php
                        $dataPart = LocationData::getPartList(1);
                        foreach ($dataPart as $key => $item):
                            ?>
                            <li><a href="<?php echo Url::to(['/ads/index', 'city' => $key]) ?>"><?php echo $item ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <?php
                        $dataPart = LocationData::getPartList(2);
                        foreach ($dataPart as $key => $item):
                            ?>
                            <li><a href="<?php echo Url::to(['/ads/index', 'city' => $key]) ?>"><?php echo $item ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <?php
                        $dataPart = LocationData::getPartList(3);
                        foreach ($dataPart as $key => $item):
                            ?>
                            <li><a href="<?php echo Url::to(['/ads/index', 'city' => $key]) ?>"><?php echo $item ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab2">
            <div class="col-xl-12 tab-inner">
                <div class="row">
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Virginia Beach </a>
                        </li>
                        <li><a href="category.html"> San Diego </a>
                        </li>
                        <li><a href="category.html">Boston </a>
                        </li>
                        <li><a href="category.html">Houston</a>
                        </li>
                        <li><a href="category.html">Salt Lake City </a>
                        </li>
                        <li><a href="category.html">San Francisco </a>
                        </li>
                        <li><a href="category.html">Tampa </a>
                        </li>
                        <li><a href="category.html"> Washington DC </a>
                        </li>
                    </ul>
                    <ul class="cat-list col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Atlanta</a>
                        </li>
                        <li><a href="category.html">Wichita </a>
                        </li>
                        <li><a href="category.html"> Anchorage </a>
                        </li>
                        <li><a href="category.html"> Dallas </a>
                        </li>
                        <li><a href="category.html"> Hà Nội </a>
                        </li>
                        <li><a href="category.html">Santa Ana/Anaheim </a>
                        </li>
                        <li><a href="category.html"> Miami </a>
                        </li>
                        <li><a href="category.html">Los Angeles</a>
                        </li>
                    </ul>
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Virginia Beach </a>
                        </li>
                        <li><a href="category.html"> San Diego </a>
                        </li>
                        <li><a href="category.html">Boston </a>
                        </li>
                        <li><a href="category.html">Houston</a>
                        </li>
                        <li><a href="category.html">Salt Lake City </a>
                        </li>
                        <li><a href="category.html">San Francisco </a>
                        </li>
                        <li><a href="category.html">Tampa </a>
                        </li>
                        <li><a href="category.html"> Washington DC </a>
                        </li>
                    </ul>
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Virginia Beach </a>
                        </li>
                        <li><a href="category.html"> San Diego </a>
                        </li>
                        <li><a href="category.html">Boston </a>
                        </li>
                        <li><a href="category.html">Houston</a>
                        </li>
                        <li><a href="category.html">Salt Lake City </a>
                        </li>
                        <li><a href="category.html">San Francisco </a>
                        </li>
                        <li><a href="category.html">Tampa </a>
                        </li>
                        <li><a href="category.html"> Washington DC </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab3">
            <div class="col-xl-12 tab-inner">
                <div class="row">
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Virginia Beach </a>
                        </li>
                        <li><a href="category.html"> San Diego </a>
                        </li>
                        <li><a href="category.html">Boston </a>
                        </li>
                        <li><a href="category.html">Houston</a>
                        </li>
                        <li><a href="category.html">Salt Lake City </a>
                        </li>
                        <li><a href="category.html">San Francisco </a>
                        </li>
                        <li><a href="category.html">Tampa </a>
                        </li>
                        <li><a href="category.html"> Washington DC </a>
                        </li>
                    </ul>
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Virginia Beach </a>
                        </li>
                        <li><a href="category.html"> San Diego </a>
                        </li>
                        <li><a href="category.html">Boston </a>
                        </li>
                        <li><a href="category.html">Houston</a>
                        </li>
                        <li><a href="category.html">Salt Lake City </a>
                        </li>
                        <li><a href="category.html">San Francisco </a>
                        </li>
                        <li><a href="category.html">Tampa </a>
                        </li>
                        <li><a href="category.html"> Washington DC </a>
                        </li>
                    </ul>
                    <ul class="cat-list col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Atlanta</a>
                        </li>
                        <li><a href="category.html">Wichita </a>
                        </li>
                        <li><a href="category.html"> Anchorage </a>
                        </li>
                        <li><a href="category.html"> Dallas </a>
                        </li>
                        <li><a href="category.html"> Hà Nội </a>
                        </li>
                        <li><a href="category.html">Santa Ana/Anaheim </a>
                        </li>
                        <li><a href="category.html"> Miami </a>
                        </li>
                        <li><a href="category.html">Los Angeles</a>
                        </li>
                    </ul>
                    <ul class="cat-list cat-list-border col-md-3  col-6 col-xxs-12">
                        <li><a href="category.html">Virginia Beach </a>
                        </li>
                        <li><a href="category.html"> San Diego </a>
                        </li>
                        <li><a href="category.html">Boston </a>
                        </li>
                        <li><a href="category.html">Houston</a>
                        </li>
                        <li><a href="category.html">Salt Lake City </a>
                        </li>
                        <li><a href="category.html">San Francisco </a>
                        </li>
                        <li><a href="category.html">Tampa </a>
                        </li>
                        <li><a href="category.html"> Washington DC </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

