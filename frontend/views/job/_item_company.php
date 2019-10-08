<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/15/2018
 * Time: 3:12 PM
 */

use yii\helpers\Url;
use frontend\assets\AdsAsset;

/* @var $this yii\web\View */
/* @var $model \common\models\job\Company */

$urlView = Url::to(['/job/company-profile', 'id' => $model->id, 'name' => $model->slug]);
$bundle = AdsAsset::register($this);
$imgBg = baseUrl() . '/frontend/web/images/loading/loadingjob.jpg';
?>
<div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category">
    <a href="<?php echo $urlView ?>">
        <img alt="img" class="img-responsive lazy" src="<?php echo $imgBg ?>"
             data-src="<?php echo $model->getImgThumbnail(1) ?>">
        <h6> Việc làm tại <span class="company-name"><?php echo $model->title_short ?></span> <span
                    class="jobs-count text-muted">(10)</span>
        </h6>
    </a>
</div>

