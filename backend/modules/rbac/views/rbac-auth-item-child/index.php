<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Rbac Auth Item Children');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-item-child-index">

    <div class="pull-right">
        <p>
            <?php echo Html::a(Yii::t('backend', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <br>
    <div class="clearfix"></div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'parent',
            'child',

            [
                'class'          => 'backend\grid\ActionColumn',
                'headerOptions'  => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
        ],
    ]); ?>
</div>
