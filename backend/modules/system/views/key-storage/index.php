<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\system\models\search\KeyStorageItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Key Storage Items');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="key-storage-item-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                    'modelClass' => 'Key Storage Item',
                ]), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="clearfix"></div>


        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'options'      => [
                'class' => 'grid-view table-responsive'
            ],
            'columns'      => [
                [
                    'class'           => 'yii\grid\CheckboxColumn',
                    'headerOptions'   => ['style' => 'width:3%;text-align:center'],
                    'contentOptions'  => ['style' => 'width:3%;text-align:center'],
                    'checkboxOptions' => [
                        'class' => 'select-item'
                    ]
                ],
                ['class' => 'yii\grid\SerialColumn'],

                'key',
                'value',

                [
                    'class'    => 'backend\grid\ActionColumn',
                    'template' => '{update} {delete}'
                ],
            ],
        ]); ?>

    </div>

<?php
$app_css = <<<CSS
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
.is-selected {
    background-color: #e0e0e0;
}
CSS;

$this->registerCss($app_css);


$this->registerCss($app_css);

$app_js = <<<JS

$(document).on("change",".select-item",function() {
         if($(this).is(":checked")) {
            $(this).parents("tr").addClass("is-selected");
        }else{
            $(this).parents("tr").removeClass("is-selected");
        }
});

JS;
$this->registerJs($app_js);