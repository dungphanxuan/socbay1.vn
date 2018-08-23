<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$urlView = Url::to(['/blog/view', 'id' => $model->id, 'name' => $model->slug]);
$bundle = \frontend\assets\AdsAsset::register($this);
?>
<article class="blog-post-item">
    <div class="inner-box">


        <!--blog image-->
        <div class="blog-post-img">

            <a href="<?php echo $urlView ?>">
                <figure>
                    <img class="img-responsive lazy" alt="blog-post image"
                         src="" data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/blog/1.jpg') ?>">
                </figure>
            </a>
        </div>

        <!--blog content-->

        <div class="blog-post-content-desc">


                            <span class="info-row blog-post-meta"> <span class="date"><i
                                            class=" icon-clock"> </i> <?php echo getFormat()->asDate($model->created_at) ?> </span>  -
                                <span class="author"> <i class="fa fa-user"></i>  <a rel="author"
                                                                                     title="Posts by Jhon Doe" href="#">Jhon
                                    Doe</a> </span>  -
                                <span class="item-location"><i
                                            class="fa fa-comments"></i> <?php echo Yii::t('common', 'Comments') ?> <a
                                            href="#">0</a> </span> </span>


            <div class="blog-post-content">
                <h2><a href="<?php echo $urlView ?>"><?php echo $model->title ?></a></h2>

                <p>Sint, hic, et qui inventore ex perferendis sunt aliquam commodi nihil
                    vitae. Sint, hic, et qui inventore ex perferendis sunt aliquam.</p>

                <div class="row">
                    <div class="col-md-12 clearfix blog-post-bottom">
                        <a class="btn btn-primary  pull-left"
                           href="<?php echo $urlView ?>"><?php echo Yii::t('common', 'More info') ?></a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</article>

