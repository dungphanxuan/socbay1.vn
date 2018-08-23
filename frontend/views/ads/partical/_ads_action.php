<?php

use yii\helpers\Url;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/9/2018
 * Time: 11:25 AM
 */


/* @var $this yii\web\View */
/* @var $model \common\models\Article */

?>
<li><a href="#"> <i class=" fa fa-user"></i> <?php echo Yii::t('frontend', 'More ads by User') ?> </a></li>
<?php echo \frontend\widgets\Star::widget(['model' => $model]) ?>
<li><a href="#"> <i class="fa fa-share-alt"></i> <?php echo Yii::t('frontend', 'Share ad') ?> </a></li>
<li><a href="#reportAdvertiser" data-toggle="modal"> <i
                class="fa icon-info-circled-alt"></i> <?php echo Yii::t('frontend', 'Report abuse') ?> </a></li>

