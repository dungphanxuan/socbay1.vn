<?php
/* @var $this yii\web\View */

use frontend\assets\AdsAsset;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Sự kiện BDS';

$bundle = AdsAsset::register($this);
\frontend\assets\BoxAsset::register($this);

?>
<div class="main-container">
    <div class="container blog-full-width">
        <div class="title-blog">
            <h3>SỰ KIỆN BẤT ĐỘNG SẢN</h3>
        </div>
        <!--END: TITLE BLOG-->

        <?php echo ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => false
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'row',
            ],
            'layout' => "{items}",
            'itemView' => '_item_event',
        ]);
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="pagination-bar text-center">
                    <nav aria-label="Page navigation " class="d-inline-b">
                        <?php echo \frontend\widgets\LinkPager::widget([
                            'pagination' => $dataProvider->pagination,
                        ]);
                        ?>
                    </nav>
                </div>
                <!--/.pagination-bar -->
            </div>

        </div>
    </div>
</div>
<!-- /.main-container -->

