<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\ArticleCategory;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/26/2017
 * Time: 3:53 PM
 */
/* @var $this \yii\web\View */

$dataRootCategory = ArticleCategory::getList(null, true);


$bundle = \frontend\assets\AdsAsset::register($this);
?>
<div class="col-md-9 page-content col-thin-right">
    <div class="inner-box category-content">
        <h2 class="title-2">Find Classified Ads World Wide </h2>

        <div class="row">
            <div class="col-md-4 col-sm-4 ">
                <div class="cat-list">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i class="fa fa-car ln-shadow"></i>
                            Automobiles <span class="count">277,959</span> </a>

                        <span data-target=".cat-id-1" aria-expanded="true" data-toggle="collapse"
                              class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span>
                    </h3>
                    <ul class="cat-collapse  cat-id-1">
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Car Parts &amp; Accessories</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Campervans &amp; Caravans</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Motorbikes &amp; Scooters</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Motorbike Parts &amp; Accessories</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Vans, Trucks &amp; Plant</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Wanted</a></li>
                    </ul>
                </div>
                <div class="cat-list">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i class="icon-home ln-shadow"></i>
                            Property <span class="count">228,705</span></a> <span data-target=".cat-id-2"
                                                                                  aria-expanded="true"
                                                                                  data-toggle="collapse"
                                                                                  class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span></h3>


                    <ul class="cat-collapse collapse show cat-id-2">
                        <li><a href="<?= Url::to(['/ads/index']) ?>">House for Rent</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">House for Sale </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Apartments For Sale </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Apartments for Rent </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Farms-Ranches </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Land </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Vacation Rentals </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Commercial Building</a></li>
                    </ul>
                </div>
                <div class="cat-list">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i class="icon-home ln-shadow"></i>
                            Jobs <span class="count">6375</span></a>

                        <span data-target=".cat-id-3" aria-expanded="true" data-toggle="collapse"
                              class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span>
                    </h3>
                    <ul class="cat-collapse collapse show cat-id-3">
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Full Time Jobs</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Internet Jobs </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Learn &amp; Earn jobs </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Manual Labor Jobs </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Other Jobs </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">OwnBusiness </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="cat-list">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i
                                    class="fa fa-briefcase ln-shadow"></i> Services <span
                                    class="count">45,526</span></a>
                        <span data-target=".cat-id-4" aria-expanded="true" data-toggle="collapse"
                              class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span>
                    </h3>
                    <ul class="cat-collapse collapse show cat-id-4">
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Building, Home &amp; Removals</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Entertainment</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Health &amp; Beauty</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Miscellaneous</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Property &amp; Shipping</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Tax, Money &amp; Visas</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Telecoms &amp; Computers</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Travel Services &amp; Tours</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Tuition &amp; Lessons</a></li>
                    </ul>
                </div>
                <div class="cat-list">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i
                                    class="icon-book-open ln-shadow"></i> Learning <span
                                    class="count">26,529</span></a> <span data-target=".cat-id-5"
                                                                          aria-expanded="true" data-toggle="collapse"
                                                                          class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span>
                    </h3>
                    <ul class="cat-collapse collapse show cat-id-5">
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Automotive Classes </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Computer Multimedia Classes </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Sports Classes </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Home Improvement Classes </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Language Classes </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Music Classes </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Personal Fitness </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>"> Other Classes </a></li>
                    </ul>
                </div>
                <div class="cat-list">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i
                                    class="icon-guidedog ln-shadow"></i> Pets <span class="count">42,111</span></a>
                        <span data-target=".cat-id-6" aria-expanded="true" data-toggle="collapse"
                              class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span>
                    </h3>
                    <ul class="cat-collapse collapse show cat-id-6">
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Pets for Sale</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Petsitters &amp; Dogwalkers</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Equipment &amp; Accessories</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Missing, Lost &amp; Found</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4   last-column">
                <div class="cat-list">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i
                                    class=" icon-basket-1 ln-shadow"></i> For Sale <span
                                    class="count">64,526</span></a> <span data-target=".cat-id-7"
                                                                          aria-expanded="true" data-toggle="collapse"
                                                                          class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span>
                    </h3>
                    <ul class="cat-collapse collapse show cat-id-7">
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Audio &amp; Stereo</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Baby &amp; Kids Stuff</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">CDs, DVDs, Games &amp; Books</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Clothes, Footwear &amp; Accessories</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Computers &amp; Software</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Home &amp; Garden</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Music &amp; Instruments</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Office Furniture &amp; Equipment</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Phones, Mobile Phones &amp; Telecoms</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Sports, Leisure &amp; Travel</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Tickets</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">TV, DVD &amp; Cameras</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Video Games &amp; Consoles</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Freebies</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Miscellaneous Goods</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Stuff Wanted</a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Swap Shop</a></li>
                    </ul>
                </div>
                <div class="cat-list ">
                    <h3 class="cat-title"><a href="<?= Url::to(['/ads/index']) ?>"><i
                                    class=" icon-theatre ln-shadow"></i> Community <span
                                    class="count">5,30</span> </a> <span data-target=".cat-id-8"
                                                                         aria-expanded="true" data-toggle="collapse"
                                                                         class="btn-cat-collapsed collapsed">   <span
                                    class=" icon-down-open-big"></span> </span>
                    </h3>
                    <ul class="cat-collapse collapse show cat-id-8">
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Announcements </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Car Pool - Bike Ride </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Charity - Donate - NGO </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Lost - Found </a></li>
                        <li><a href="<?= Url::to(['/ads/index']) ?>">Tender Notices </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-box has-aff relative">
        <a class="dummy-aff-img" href="<?php echo Url::to(['/ads/index']) ?>"><img
                    data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/aff2.jpg') ?>"
                    class="img-responsive lazy"
                    alt=" aff"> </a>
    </div>
</div>
<div class="col-md-3 page-sidebar col-thin-left">
    <aside>
        <div class="inner-box no-padding">
            <div class="inner-box-content"><a href="<?php echo Url::to(['/ads/index']) ?>"><img
                            class="img-responsive lazy"
                            data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/app.jpg') ?>"
                            alt="tv"></a>
            </div>
        </div>
        <div class="inner-box">
            <h2 class="title-2">Danh mục phổ biến </h2>

            <div class="inner-box-content">
                <ul class="cat-list arrow">
                    <?php foreach ($dataRootCategory as $key => $item): ?>

                        <li>
                            <a href="<?php echo Url::to(['/ads/index', 'cslug' => $item['slug']]) ?>"> <?php echo $item['title'] ?>
                                (<?php echo $item['count'] ?>) </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="inner-box no-padding"><img class="img-responsive lazy"
                                               data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/add2.jpg') ?>"
                                               alt="">
        </div>
    </aside>
</div>
