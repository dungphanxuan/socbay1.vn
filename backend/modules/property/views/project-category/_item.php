<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 14/8/2017
 * Time: 10:54 AM
 */


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \common\models\property\ProjectArea */
?>
<tr id="item<?php echo $model->id ?>" class="item" data-id="<?php echo $model->id ?>">
    <td width="10%"><?php echo $model->id ?></td>

    <td><p class=""><?php echo $model->title ?></p></td>
    <td width="9%" style="text-align: center"><strong><?php echo $model->sort_number ?></strong></td>

    <td style="width: 5%"><?php echo Html::a('Cập nhật', ['update', 'id' => $model->id], [
            'class' => 'btn btn-info btn-sm',
        ]) ?>
    </td>

    <td style="width: 5%"><?php echo Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-warning  btn-sm',
            'data' => [
                'confirm' => 'Xác nhận xóa',
                'method' => 'post',
            ]
        ]) ?>
    </td>

</tr>