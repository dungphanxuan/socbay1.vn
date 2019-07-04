<?php

use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model \common\models\Article */
/* @var $dataRelatedProvider \yii\data\ActiveDataProvider */

$this->title = 'Trợ giúp ' . $model->title;

$this->registerCssFile("@web/frontend/web/classified/assets/css/page/style-page.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::class],
]);
?>
    <div class="search-box-support">
        <div class="container">
            <div class="box-search">
                <form action="#" class="search">
                    <input type="text" class="form-control"
                           placeholder="<?php echo Yii::t('ads', 'Seach help topics') ?>">
                    <button type="submit" class="btn btn-info btn-search"><?php echo Yii::t('ads', 'Search') ?></button>
                </form>
            </div>
            <!--End:box-search-->
        </div>
        <!--End: container-->
    </div>
    <!--End: search box support-->
    <div class="wrap-item-content">
        <div class="container">
            <div class="left">
                <div class="box">
                    <h3><?php echo Yii::t('ads', 'Related articles') ?></h3>
                    <?php echo ListView::widget([
                        'dataProvider' => $dataRelatedProvider,
                        'options' => [
                            'tag' => 'ul',
                            'class' => 'list-related',
                            'id' => 'list-related',
                        ],
                        'itemOptions' => [
                            'tag' => false,
                        ],
                        'layout' => "{items}",
                        'itemView' => '_item_related',
                    ]);
                    ?>
                </div>
            </div>
            <div class="right">
                <div class="content">
                    <h3><?php echo $model->title ?></h3>
                    <p><b>khoảng 10 phút đọc</b></p>
                    <?php echo $model->body ?>

                    <div class="help-action">
                      <span>
                <?php echo Yii::t('ads', 'Was this article helpful?') ?>
                </span>
                        <a href="#" class="icon-like"><i class="fa fa-thumbs-o-up"></i></a>
                        <a href="#" class="icon-dislike"><i class="fa fa-thumbs-o-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--End: container-->
    </div>
    <!--End: wrap item content-->

<?php
$app_css = <<<CSS

CSS;

$this->registerCss($app_css);
