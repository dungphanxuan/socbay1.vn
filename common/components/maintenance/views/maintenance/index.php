<?php

/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var string $maintenanceText
 * @var int|string $retryAfter
 */
/* @var $this yii\web\View */

$bundle = \common\components\maintenance\MaintenanceAsset::register($this);
?>
    <div class="overlay"></div>

    <div class="masthead">
        <div class="masthead-bg"></div>
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto">
                    <div class="masthead-content text-white py-5 py-md-0">
                        <h1 class="mb-3">Coming Soon!</h1>
                        <p class="mb-5">We're working hard to finish the development of this site. Our target launch
                            date is <strong>August 2018</strong>! Sign up for updates using the form below!</p>
                        <div class="input-group input-group-newsletter">
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="Enter email..." aria-label="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Notify Me!</button>
                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="social-icons">
        <ul class="list-unstyled text-center mb-0">
            <li class="list-unstyled-item">
                <a href="https://twitter.com/">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li class="list-unstyled-item">
                <a href="https://facebook.com/">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="list-unstyled-item">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>

<?php
$mp4File = $this->assetManager->getAssetUrl($bundle, 'mp4/bg.mp4');
$imgFile = $this->assetManager->getAssetUrl($bundle, 'img/bg-mobile-fallback.jpg');
$app_js = <<<JS
"use strict"; 
 $('body').vide({
    mp4:  "$mp4File",
    poster:  "$imgFile"
  }, {
    posterType: 'jpg'
  });
JS;

$this->registerJs($app_js);
