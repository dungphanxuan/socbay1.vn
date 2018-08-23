<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */

$detail = \common\helpers\ArticleHelper::getDetail($model->id);
$urlDelete = $type == 2 ? 'account/remover-favourite' : 'ads/delete';
$imgBg = baseUrl() . '/frontend/web/images/loading/loadingjob.jpg';

?>
<tr>
    <td style="width:2%" class="add-img-selector">
        <div class="checkbox">
            <label>
                <input type="checkbox">
            </label>
        </div>
    </td>
    <td><?php echo $model->id ?></td>
    <td style="width:14%" class="add-img-td">
        <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>">
            <img class="thumbnail  img-responsive lazy" src="<?php echo $imgBg ?>"
                 data-src="<?php echo $model->getImgThumbnail(2, 75, 100, 75) ?>"
                    alt="img">
        </a>
    </td>
    <td class="ads-details-td">
        <div>
            <p><strong>
                    <a href="<?php echo Url::to(['/ads/view', 'id' => $model->id, 'name' => $model->slug]) ?>"
                       title="<?php echo $model->title ?>" target="_blank"><?php echo $model->title ?></a> </strong>
            </p>
            <p><strong> Danh mục </strong>: <?php echo $detail['category_name'] ?></p>
            <p><strong> Cập nhật lúc </strong>:
                <?php echo $detail['updated_full'] ?> </p>
            <p><strong>Lượt xem </strong>: <?php echo $model->view_count ?> <strong>Vị trí
                    :</strong> <?php echo $detail['address_text'] ?>
            </p>
        </div>
    </td>
    <td style="width:16%" class="price-td">
        <div><strong> <?php echo $detail['price-show'] ?></strong></div>
    </td>
    <td style="width:13%" class="action-td">
        <div>
            <?php if ($type == 1 || $type == 4): ?>
                <p>
                    <a class="btn btn-primary btn-sm" href="<?php echo Url::to(['/ads/update', 'id' => $model->id]) ?>">
                        <i
                                class="fa fa-edit"></i> Cập nhật </a>
                </p>

            <?php endif; ?>

            <?php if ($type == 1): ?>
                <?php if (false): ?>
                    <p>
                        <a class="btn btn-success btn-sm"
                           href="<?php echo Url::to(['/ads/create', 'id' => $model->id, 'type' => 'copy']) ?>"> <i
                                    class="fa fa-clone"></i> Copy </a>
                    </p>
                <?php endif; ?>
                <p>
                    <a class="btn btn-success btn-sm"
                       href="<?php echo Url::to(['/ads/update', 'id' => $model->id, 'type' => 2]) ?>"> <i
                                class="fa fa-clone"></i> Up tin </a>
                </p>
            <?php endif; ?>
            <?php if (in_array($type, [1, 2])): ?>
                <p>
                    <a class="btn btn-info btn-sm"> <i class="fa fa-mail-forward"></i> Chia sẻ</a>
                </p>
            <?php endif; ?>
            <?php if ($type == 3): ?>
                <p>
                    <a class="btn btn-info btn-sm"> <i class="fa fa-recycle"></i> Báo cáo </a>
                </p>
            <?php endif; ?>
            <p>
                <a class="btn btn-danger btn-sm" data-method="post" data-confirm="Xác nhận xóa"
                   href="<?php echo Url::to(['/' . $urlDelete, 'id' => $model->id]) ?>"> <i class=" fa fa-trash"></i>
                    Xóa</a>
            </p>
        </div>
    </td>
</tr>
