<?php

use yii\helpers\Url;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/14/2018
 * Time: 9:15 AM
 */
/* @var $this yii\web\View */
/* @var $model \common\models\media\Media */

$urlDetail = Url::to(['/media/default/view', 'id' => $model->id, 'name' => $model->slug]);
$imgBg = baseUrl() . '/frontend/web/images/loading/bgmedia.jpg';

?>
<div class="col-md-4">
    <div class="card mb-4 box-shadow text-center">
        <a href="<?php echo $urlDetail ?>">
            <img class="card-img-top lazy"
                 data-src="<?php echo $model->getPoster() ?>"
                 alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                 src="<?php echo $imgBg ?>"
                 data-holder-rendered="true">
        </a>

        <div class="card-body">
            <h3 class="card-title"><?php echo $model->title ?></h3>
            <p class="card-text">Short description about.</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="<?php echo $urlDetail ?>" class="btn btn-sm btn-primary">View
                    </a>
                </div>
                <small class="text-muted">23 mins</small>
            </div>
        </div>
    </div>
</div>