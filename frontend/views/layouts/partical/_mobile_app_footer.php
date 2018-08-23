<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 5/7/2018
 * Time: 9:49 AM
 */
?>
<div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
    <div class="mobile-app-content">
        <h4 class="footer-title"><?php echo Yii::t('ads', 'Mobile Apps') ?></h4>
        <div class="row ">
            <div class="col-6">
                <a class="app-icon" target="_blank" href="#">
                    <span class="hide-visually">iOS app</span>
                    <img class="lazy" src=""
                         data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/app_store_badge.svg') ?>"
                         alt="Available on the App Store">
                </a>
            </div>
            <div class="col-6">
                <a class="app-icon" target="_blank"
                   href="#">
                    <span class="hide-visually">Android App</span>
                    <img class="lazy" src=""
                         data-src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/site/google-play-badge.svg') ?>"
                         alt="Available on the App Store">
                </a>
            </div>
        </div>
    </div>
</div>
