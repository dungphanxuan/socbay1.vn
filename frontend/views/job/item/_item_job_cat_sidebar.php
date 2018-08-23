<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/17/2018
 * Time: 5:14 PM
 */

/* @var $this yii\web\View */
/* @var $model \common\models\job\JobCategory */

?>
<li>
    <a href="<?php echo \yii\helpers\Url::to(['/ads/index', 'cslug' => 'viec-lam', 'job_cat' => $model['slug']]) ?>"><?php echo $model['title'] ?>
        <span
                class="count"><?php echo $model['total'] ?></span> </a>
</li>
