<?php
/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Api Document';
?>
<div class="starter-template">
    <h1 style="text-align: center;">Api Document</h1>
    <p class="lead" style="text-align: center;">Use this document as a way to quickly start any new project.<br> All you
        get is this text and a
        mostly barebones HTML document.</p>

    <div class="row" style="text-align: revert">
        <div class="col-md-12">
            <?php echo \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'title',
                    // ...
                ],
            ]) ?>
        </div>
    </div>
</div>
