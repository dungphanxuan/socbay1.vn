<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 2/24/2018
 * Time: 10:39 AM
 */
/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$urlView = '';
?>
<div class="col-md-4">
    <a href="<?php echo $urlView ?>" title="title">
        <div>
            <i class="<?= $model->icon ?>"></i>
        </div>
        <p><b><?= $model->title ?></b></p>
    </a>
    <p> <?= $model->body ?></p>
</div>
