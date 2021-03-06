<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Rbac Auth Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-assignment-index">


    <div class="pull-right">
        <p>
            <?php echo Html::a(Yii::t('backend', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <br>
    <div class="clearfix"></div>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_name',
            'user_id',
            'created_at:datetime',

            [
                'class' => 'backend\grid\ActionColumn',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
        ],
    ]); ?>

</div>
