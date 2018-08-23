<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 3/28/2018
 * Time: 1:53 PM
 */

use yii\helpers\Url;
use yii\helpers\Html;
use common\assets\LightSlider;
use frontend\assets\PropertyAsset;
use frontend\assets\AdsAsset;
use common\models\property\Project;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model Project */

$bundle = AdsAsset::register($this);
?>
<a href="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/project-view/house2.jpg') ?>">
    <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'images/project-view/house2.jpg') ?>"
         alt="images">
</a>
