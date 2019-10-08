<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 6/7/2017
 * Time: 10:54 AM
 */

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\ArticleCategory */
?>
<tr id="item<?php echo $model->id ?>" class="item" data-id="<?php echo $model->id ?>">
    <td width="5%"><?php echo $model->id ?></td>
    <td><p class="lead1"><?php echo $model->title ?></p></td>
    <td><p><?php echo $model->slug ?></p></td>
    <td width="9%" style="text-align: center"><strong><?php echo $model->sort_number ?></strong></td>
    <td style="text-align: center">
        <a href="<?php echo Url::to(['/article/index', 'category_id' => $model->id]) ?>">
            <?php echo $model->getTotalArticles() ?>
        </a>
    </td>

    <td>
        <?php
        $options = [
            'class' => ($model->status == 1) ? 'glyphicon glyphicon-ok text-success' : 'glyphicon glyphicon-remove text-danger',
        ];
        echo Html::tag('p', Html::tag('span', '', $options), ['class' => 'text-center']);

        ?>
    </td>

    <td style="width: 5%"><?php echo Html::a(Yii::t('backend', 'View'), ['view', 'id' => $model->id, 'parent_id' => $model->id], [
            'class' => 'btn btn-flat btn-primary btn-sm',
            'data-pjax' => 0
        ]) ?>
    </td>

    <td style="width: 5%"><?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], [
            'class' => 'btn btn-flat btn-info btn-sm',
            'data-pjax' => 0
        ]) ?>
    </td>

    <td style="width: 5%"><?php echo Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-flat btn-warning  btn-sm',
            'data' => [
                'confirm' => Yii::t('common', 'Are you sure to delete?'),
                'method' => 'post',
            ],
            'data-pjax' => 0
        ]) ?>
    </td>

</tr>