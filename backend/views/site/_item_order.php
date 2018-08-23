<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/22/2018
 * Time: 2:53 PM
 */

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

?>
<tr>
    <td><a href="<?php echo Url::to(['/page/invoice']) ?>">OR9842</a></td>
    <td><?php echo $model->title ?></td>
    <td><?php echo $model->view_count ?></td>
    <td><span class="label label-success">Shipped</span></td>
    <td>
        <div class="sparkbar" data-color="#00a65a" data-height="20">
            <canvas width="34" height="20"
                    style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
        </div>
    </td>
</tr>
