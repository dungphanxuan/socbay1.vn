<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/18/2018
 * Time: 4:19 PM
 */

?>
<li>
    <a href="<?php echo \yii\helpers\Url::to(['/ads/index', 'cslug' => 'viec-lam', 'job_cat' => $model['slug']]) ?>"><?php echo $model['title'] ?>
        <span
                class="count"><?php echo $model['total'] ?></span> </a>
</li>
