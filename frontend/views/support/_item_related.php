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
<li>
    <a href="<?php echo \yii\helpers\Url::to(['/support/topic', 'id' => $model->id, 'name' => $model->slug]) ?>"
       title=""><?php echo $model->title ?></a>
</li>
