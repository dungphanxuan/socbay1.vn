<?php

use common\grid\EnumColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\rbac\Item;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Rbac Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-item-index">

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

            'name',
            [
                'class'     => EnumColumn::class,
                'attribute' => 'type',
                'format'    => 'raw',
                'enum'      => [
                    Item::TYPE_ROLE       => 'role',
                    Item::TYPE_PERMISSION => 'permission',
                ]
            ],
            'description:ntext',
            'rule_name',
            'data',
            // 'created_at',
            // 'updated_at',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>
</div>
