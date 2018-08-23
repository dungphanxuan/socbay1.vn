<?php

use common\helpers\LocationHelper;
use common\models\ArticleCategory;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/11/2017
 * Time: 11:06 AM
 */

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $cid integer Mobile Property */
/* @var $cat_id integer */

$cacheUpdate = false;
$dataRootCategory = ArticleCategory::getList(null, $cacheUpdate);

$dataLocation = LocationHelper::getAllCity();
$modelCat = [];
$dataSubCategory = [];
if ($cid) {
    $modelCat = ArticleCategory::getDetail($cat_id, $cacheUpdate);
    $dataSubCategory = ArticleCategory::getList($modelCat['id'], $cacheUpdate);
}
//dd($dataRootCategory);
?>
<div class="categories-list  list-filter">

    <?php if (!$cid): ?>
        <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Category') ?></a></strong></h5>
        <ul class=" list-unstyled">
            <?php foreach ($dataRootCategory as $key => $item): ?>
                <li>
                    <a href="<?php echo Url::to(['/ads/index', 'cslug' => $item['slug']]) ?>"><span
                                class="title"><?php echo $item['title'] ?></span><span
                                class="count">&nbsp;<?php echo $item['count'] ?></span></a>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php else: ?>
        <h5 class="list-title"><strong>
                <a href="<?php echo Url::to(['/ads/index']) ?>"><i
                            class="fa fa-angle-left"></i> <?php echo Yii::t('ads', 'Category') ?></a></strong>
        </h5>
        <ul class=" list-unstyled">
            <li>
                <a href="#"><span class="title"><strong><?php echo $modelCat['title'] ?></strong></span><span
                            class="count">&nbsp;<?php echo $modelCat['count'] ?></span></a>
                <ul class=" list-unstyled long-list">
                    <?php foreach ($dataSubCategory as $key => $item): ?>
                        <li>
                            <a href="<?php echo Url::to(['/ads/index', 'cslug' => $item['slug']]) ?>"><?php echo $item['title'] ?>
                                <span class="count">(<?php echo $item['count'] ?>)</span></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    <?php endif; ?>
</div>
<!--/.categories-list-->

<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Location') ?></a></strong></h5>
    <ul class="browse-list list-unstyled long-list">
        <?php foreach ($dataLocation as $key => $item): ?>
            <li><a href="<?php echo Url::to(['/ads/index']) ?>"
                   title="<?php echo $item['name'] ?>"> <?php echo $item['name'] ?> </a></li>
        <?php endforeach; ?>
    </ul>
</div>
<!--/.locations-list-->

<?php if ($cid): ?>
    <div class="locations-list  list-filter">
        <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Price Range') ?></a></strong></h5>

        <form role="form" class="form-inline ">

            <div class="form-group col-md-4 no-padding">
                <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
            </div>
            <div class="form-group col-md-1 no-padding text-center ">-</div>
            <div class="form-group col-md-4 no-padding">
                <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
            </div>
            <div class="form-group col-md-3 no-padding">
                <button class="btn btn-secondary float-right btn-block-sm" type="submit">GO</button>
            </div>
        </form>

        <div style="clear:both"></div>
    </div>
<?php endif; ?>
<!--/.list-filter-->
<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Seller') ?></a></strong></h5>
    <ul class="browse-list list-unstyled long-list">
        <li><a href="<?php echo Url::to(['/ads/index']) ?>"><strong><?php echo Yii::t('ads', 'All Ads') ?></strong>
                <span class="count">228,705</span></a>
        </li>
        <li><a href="<?php echo Url::to(['/ads/index']) ?>"><?php echo Yii::t('ads', 'Business') ?> <span class="count">28,705</span></a>
        </li>
        <li><a href="<?php echo Url::to(['/ads/index']) ?>"><?php echo Yii::t('ads', 'Personal') ?> <span class="count">18,705</span></a>
        </li>
    </ul>
</div>
<div class="locations-list  list-filter">
    <h5 class="list-title"><strong><a href="#"><?php echo Yii::t('ads', 'Condition') ?></a></strong></h5>
    <ul class="browse-list list-unstyled long-list">
        <li><a href="<?php echo Url::to(['/ads/index']) ?>">Mới <span class="count">228,705</span></a>
        </li>
        <li><a href="<?php echo Url::to(['/ads/index']) ?>">Đã sd <span class="count">28,705</span></a>
        </li>
        <li><a href="<?php echo Url::to(['/ads/index']) ?>">Khác </a></li>
    </ul>
</div>
<!--/.list-filter-->
<div style="clear:both"></div>