<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\property\Project;

/* @var $this yii\web\View */
/* @var $model \common\models\property\Project */

//$imgUrl = 'http://localhost/bitbucket/classified/storage/web/source/2/122017/k3jZdjp6TwggXD4GbamL1L9OQTc4OzXh.jpg';
$imgUrl = 'http://dev.yiiframework.vn/classified/storage/web/source/2/122017/Hj6aJD_SqmyA4wDJszp-jB_dHmUKGcLB.jpg';

?>
<div class="col-sm-4 col-md-4 colp7 pItem">
    <div class="card" style="">
        <img class="card-img-top"
             src="<?php echo $imgUrl ?>"
             alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title pTitle"><?php echo $model->title ?></h4>
            <p class="card-text"><span><i class="fa fa-map-marker"
                                          aria-hidden="true"></i></span> <?php echo $model->address ?>
            </p>
            <a href="<?php echo Url::to(['/property/project-view']) ?>" class="btn btn-primary  btn-sm">Xem dự án</a>
        </div>
    </div>
</div>
