<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Blog Index';
$bundle = AdsAsset::register($this);

?>
<div class="intro-inner">
    <div class="about-intro" style="
            background:url(<?php echo $this->assetManager->getAssetUrl($bundle, 'images/bg2.jpg') ?>) no-repeat center;
            background-size:cover;">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <?php echo $this->render('_blog_intro', []) ?>
                </div>
            </div>
        </div>
    </div>
    <!--/.about-intro -->

</div>
<!-- /.intro-inner -->

<div class="main-container inner-page">
    <div class="container">
        <div class="section-content">
            <div class="row ">
                <div class="col-sm-8 blogLeft">
                    <div class="blog-post-wrapper">

                        <?php echo ListView::widget([
                            'dataProvider' => $dataProvider,
                            'layout'       => '{items}',
                            'itemView'     => '_item',
                            'options'      => [
                                'tag' => false,
                            ],
                            'itemOptions'  => [
                                'tag' => false,
                            ]
                        ]) ?>

                    </div>
                    <!--/.blog-post-wrapper-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination-bar text-center">
                                <nav aria-label="Page navigation " class="d-inline-b">
                                    <?php
                                    echo \frontend\widgets\LinkPager::widget([
                                        'pagination' => $dataProvider->pagination,
                                    ]);
                                    ?>
                                </nav>
                            </div>
                            <!--/.pagination-bar -->
                        </div>

                    </div>
                </div>
                <!--blogLeft-->


                <div class="col-sm-4 blogRight page-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="categories-list  list-filter">
                                <?php echo $this->render('_sidebar_category', []) ?>
                            </div>
                            <!--/.categories-list-->
                            <div class="categories-list  list-filter">
                                <h5 class="list-title uppercase"><strong><a href="#"> recent
                                            popular</a></strong></h5>


                                <div class="blog-popular-content">

                                    <?php echo ListView::widget([
                                        'dataProvider' => $dataPopularProvider,
                                        'layout'       => '{items}',
                                        'itemView'     => '_item_index_popular',
                                        'options'      => [
                                            'tag' => false,
                                        ],
                                        'itemOptions'  => [
                                            'tag' => false,
                                        ]
                                    ]) ?>

                                </div>


                                <div style="clear:both"></div>

                                <!--/.categories-list-->

                            </div>

                        </div>
                    </aside>
                </div>
                <!--page-sidebar-->

            </div>
        </div>

    </div>

</div>
<!-- /.main-container -->
<?php echo $this->render('_blog_parallax', []) ?>

