<?php

use frontend\assets\AdsAsset;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $dataPopularProvider \yii\data\ActiveDataProvider */

$this->title = $model->title;
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

    <div class="main-container inner-page" id="blogMain">
        <div class="container">
            <div class="section-content">

                <div class="row ">
                    <div class="col-sm-8 blogLeft">
                        <div class="blog-post-wrapper">


                            <article class="blog-post-item">
                                <div class="inner-box">


                                    <!--blog image-->
                                    <div class="blog-post-img">

                                        <a href="">
                                            <figure>
                                                <img class="img-responsive" alt="blog-post image"
                                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/blog/4.jpg') ?>">
                                            </figure>
                                        </a>
                                    </div>

                                    <!--blog content-->

                                    <div class="blog-post-content-desc">


                            <span class="info-row blog-post-meta"> <span class="date"><i
                                            class=" icon-clock"> </i> <?php echo getFormat()->asDate($model->created_at) ?> </span>  -
                                <span class="author"> <i class="fa fa-user"></i>  <a href="#" title="Posts by Jhon Doe"
                                                                                     rel="author">Jhon Doe</a> </span>  -
                                <span class="item-location"><i class="fa fa-comments"></i> Comments <a
                                            href="#">0</a> </span> </span>


                                        <div class="blog-post-content">
                                            <h2><a href="blog-details.html"><?php echo $model->title ?></a></h2>


                                            <div class="blog-article-text">


                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                                    lacus elit, efficitur at tellus pulvinar, mollis pulvinar arcu.
                                                    Integer lectus orci, commodo sed est vitae, lacinia accumsan nulla.
                                                    Integer neque felis, molestie vehicula vehicula nec, cursus ac
                                                    dolor. In hac habitasse platea dictumst. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos
                                                    himenaeos. Cras sed magna iaculis, congue quam sed, luctus orci.
                                                    Nunc ante tortor, rutrum ac felis sit amet, ultricies aliquam eros.
                                                    Phasellus vestibulum ligula orci, at aliquet quam egestas vitae.
                                                    Duis interdum pellentesque pulvinar. Duis elit lorem, tristique eu
                                                    dui eu, tincidunt lacinia urna.
                                                </p>

                                                <h4>Camera and video</h4>

                                                <p>
                                                </p>
                                                <ul class="list-dot">

                                                    <li>16x digital zoom</li>
                                                    <li>Superior Auto &ndash; automatic scene selection</li>
                                                    <li>Geotagging &ndash; add location info to your photos</li>
                                                    <li>Object tracking &ndash; lock focus on a specific object</li>
                                                    <li>Red-eye reduction</li>
                                                    <li>Image capture, supported file format: JPEG</li>
                                                    <li>Image playback, supported file formats: BMP, GIF, JPEG, PNG;
                                                        WebP
                                                    </li>
                                                </ul>
                                                Maecenas vel consequat metus. Sed aliquam leo et dui venenatis cursus.
                                                Ut gravida, sapien vitae scelerisque ullamcorper, magna dui commodo
                                                nunc, et gravida diam justo sit amet massa. Maecenas et ex eget ante
                                                tincidunt vulputate. Aliquam erat volutpat. Nunc eleifend scelerisque
                                                enim sit amet tempor. Duis convallis lacinia ligula, vel pretium ligula
                                                consectetur in. Cras vitae cursus magna, vitae iaculis libero.
                                                <p></p>

                                                <p>
                                                    Pellentesque venenatis, arcu in aliquam ultricies, erat mauris
                                                    tempus purus, eu ullamcorper lectus sem vel purus. Sed in ligula
                                                    varius, fermentum odio nec, tempor leo. Curabitur molestie a metus
                                                    et feugiat. In metus erat, pharetra vel laoreet eu, venenatis ac
                                                    tellus. Praesent feugiat nec augue a ullamcorper. Aliquam ac lectus
                                                    in nunc ullamcorper venenatis. Donec faucibus fermentum eleifend.
                                                    Suspendisse potenti. Curabitur ex ligula, euismod ut feugiat quis,
                                                    aliquam ut purus. Mauris quis vulputate leo. Vestibulum tristique
                                                    viverra arcu ut molestie. Curabitur in porttitor dui, ut venenatis
                                                    nulla.
                                                </p>


                                                <div class="row ">
                                                    <div class="col-xs-12 col-sm-5">
                                                        <div class="image">
                                                            <img class="img-responsive" alt="image"
                                                                 src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/blog/7.jpg') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-7">
                                                        <ul class="list-dot no-margin">
                                                            <li>Cras sollicitudin lectus vitae urna varius vulputate.
                                                            </li>
                                                            <li>Donec vel sapien blandit, aliquet dui eu, pharetra
                                                                ante.
                                                            </li>
                                                            <li>Mauris quis neque id magna blandit aliquam iaculis eu
                                                                lorem.
                                                            </li>
                                                            <li>Quisque facilisis justo sit amet bibendum dignissim.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p>
                                                    Nam pellentesque laoreet nulla a porttitor. Fusce sollicitudin
                                                    turpis in finibus pharetra. Etiam rutrum convallis imperdiet.
                                                    Quisque venenatis accumsan nisi, et venenatis leo sollicitudin ut.
                                                    Pellentesque tortor velit, interdum non turpis at, facilisis tempor
                                                    dui. Morbi ullamcorper pretium orci, mollis mollis augue vehicula
                                                    ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                </p>


                                            </div>


                                        </div>


                                        <div class="clearfix">
                                            <div class="col-md-12  blog-post-bottom">

                                                <ul class="share-this-post">
                                                    <li>Share This:</li>

                                                    <li><a class="google-plus"><i class="fa fa-google-plus"></i>Google-plus</a>
                                                    </li>
                                                    <li><a class="facebook"><i class="fa fa-facebook"></i>Facebook</a>
                                                    </li>
                                                    <li><a><i class="fa fa-twitter"></i>Twitter</a>
                                                    </li>
                                                    <li><a class="pinterest"><i
                                                                    class="fa fa-pinterest"></i>Pinterest</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="blog-post-footer">


                                        <div style="clear: both"></div>


                                        <div class="inner ">


                                            <div class="blogs-comments-area">
                                                <h3 class="list-title"><a href="" class="post-comments">12 Comments</a>
                                                </h3>

                                                <div class="blogs-comment-respond" id="respond">
                                                    <ul class="blogs-comment-list">

                                                        <li>
                                                            <div class="blogs-comment-wrapper">
                                                                <div class="blogs-comment-avatar">
                                                                    <figure>
                                                                        <img alt="avatar"
                                                                             src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/user.jpg') ?>">
                                                                    </figure>
                                                                </div>
                                                                <div class="blogs-comment-details">
                                                                    <div class="blogs-comment-name">
                                                                        <a href="#">Shawn F. </a>
                                                                        <span class="blogs-comment-date">2 days ago</span>
                                                                    </div>
                                                                    <div class="blogs-comment-description">
                                                                        <p>Etiam porttitor magna at condimentum
                                                                            sollicitudin.
                                                                            Cras sit amet nisi et nunc elementum rutrum
                                                                            non eget dui.</p>
                                                                    </div>
                                                                    <div class="blogs-comment-reply"><a
                                                                                href="#">Reply</a></div>
                                                                </div>
                                                            </div>


                                                        </li>
                                                        <li>
                                                            <div class="blogs-comment-wrapper">
                                                                <div class="blogs-comment-avatar">
                                                                    <figure>
                                                                        <img alt="avatar"
                                                                             src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/user.jpg') ?>">
                                                                    </figure>
                                                                </div>
                                                                <div class="blogs-comment-details">
                                                                    <div class="blogs-comment-name">
                                                                        <a href="#">Tyron L. Ballard</a>
                                                                        <span class="blogs-comment-date">2 days ago</span>
                                                                    </div>
                                                                    <div class="blogs-comment-description">
                                                                        <p>
                                                                            In ullamcorper lectus congue sapien
                                                                            pulvinar, eget gravida metus vestibulum.
                                                                            Donec cursus velit vel urna rutrum
                                                                            tristique.

                                                                        </p>
                                                                    </div>
                                                                    <div class="blogs-comment-reply"><a
                                                                                href="#">Reply</a></div>
                                                                </div>
                                                            </div>

                                                            <ul>

                                                                <li>
                                                                    <div class="blogs-comment-wrapper">
                                                                        <div class="blogs-comment-avatar">
                                                                            <figure>
                                                                                <img alt="avatar"
                                                                                     src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/user.jpg') ?>">
                                                                            </figure>
                                                                        </div>
                                                                        <div class="blogs-comment-details">
                                                                            <div class="blogs-comment-name">
                                                                                <a href="#">Mike K. Melancon</a>
                                                                                <span class="blogs-comment-date">15 November 2015</span>
                                                                            </div>
                                                                            <div class="blogs-comment-description">
                                                                                <p> Sed scelerisque ante a lorem
                                                                                    efficitur posuere sit amet ornare
                                                                                    ante. Vestibulum hendrerit leo at
                                                                                    libero bibendum, et eleifend odio
                                                                                    dictum.
                                                                                    Nunc porttitor metus vitae sapien
                                                                                    blandit, ac imperdiet nisl
                                                                                    euismod.</p>
                                                                            </div>
                                                                            <div class="blogs-comment-reply"><a
                                                                                        href="#">Reply</a></div>
                                                                        </div>
                                                                    </div>
                                                                </li>


                                                            </ul>
                                                        </li>


                                                    </ul>
                                                    <!--Comment list End-->


                                                    <h3 class="blogs-comment-reply-title list-title">LEAVE A
                                                        COMMENT</h3>

                                                    <form class="blogs-comment-form" id="blogs-commentform"
                                                          method="post" action="">
                                                        <div class="row form-group">
                                                            <div class="col-md-6"><input class="form-control"
                                                                                         type="text"
                                                                                         placeholder="Enter your name"
                                                                                         aria-required="true" value=""
                                                                                         name="author"></div>
                                                            <div class="col-md-6 text-left"><span>Name*</span></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-6"><input class="form-control"
                                                                                         type="text"
                                                                                         placeholder="Enter your email"
                                                                                         aria-required="true" value=""
                                                                                         name="email"></div>
                                                            <div class="col-md-6 text-left"><span>E-mail*</span></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-6"><input class="form-control"
                                                                                         type="text" value=""
                                                                                         placeholder="Enter your website"
                                                                                         name="url"></div>
                                                            <div class="col-md-6 text-left"><span>Website*</span></div>
                                                        </div>

                                                        <div class="form-group">
                                                            <textarea class="form-control" placeholder="Message"
                                                                      name="blogs-comment"></textarea></div>

                                                        <button type="submit" class="btn-success btn btn-lg"> Submit
                                                        </button>


                                                </div>
                                                <!-- #respond -->


                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </article>


                        </div>
                        <!--/.blog-post-wrapper-->
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
                                        <?php echo \yii\widgets\ListView::widget([
                                            'dataProvider' => $dataPopularProvider,
                                            'layout'       => '{items}',
                                            'itemView'     => '_item_popular',
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

<?php
$app_css = <<<CSS

CSS;

$app_js = <<<JS
$('html,body').animate({
        scrollTop: $("#blogMain").offset().top - 80
}, 'fast');
JS;
$this->registerJs($app_js);