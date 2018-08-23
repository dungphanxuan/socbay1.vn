<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/19/2018
 * Time: 9:39 AM
 */

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\job\Company */
$urlView = Url::to(['/job/company-profile', 'id' => $model->id]);
$imgBgBox = baseUrl() . '/frontend/web/images/bg/viewBox1.jpg';
?>
<tr>
    <td></td>
    <td style="width:2%" class="add-img-selector">
        <div class="checkbox">
            <label>
                <input type="checkbox">
            </label>
        </div>
    </td>
    <td style="width:14%" class="add-img-td"><a href="<?php echo $urlView ?>"><img
                    class="thumbnail  img-responsive lazy" src="<?php echo $imgBgBox ?>"
                    data-src="<?php echo $model->getImgThumbnail() ?>"
                    alt="img"></a></td>
    <td style="width:58%" class="ads-details-td">
        <div>
            <p><strong> <a href="<?php echo $urlView ?>"
                           title="<?php echo $model->title ?>"><?php echo $model->title ?></a>
                </strong>
            </p>

            <p><strong> Địa chỉ </strong>:
                Hà Nội </p>

            <p><strong>Visitors </strong>: 221 <strong>Located In:</strong> <?php echo $model->getFullAddress() ?>
            </p>
        </div>
    </td>
    <td style="width:16%" class="price-td">
        <div><strong> <?php echo $model->totalJobs ?></strong></div>
    </td>
    <td style="width:10%" class="action-td">
        <div>
            <p><a class="btn btn-primary btn-sm"
                  href="<?php echo Url::to(['/jobc/company/update', 'id' => $model->id]) ?>"> <i
                            class="fa fa-edit"></i> Cập nhật </a>
            </p>

            <p><a class="btn btn-info btn-sm"> <i class="fa fa-mail-forward"></i> Chia sẻ
                </a></p>

            <p><a class="btn btn-danger btn-sm"> <i class=" fa fa-trash"></i> Delete
                </a></p>
        </div>
    </td>
</tr>
