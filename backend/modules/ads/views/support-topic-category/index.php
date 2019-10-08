<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ads\support\SupportTopicCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support Topic Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-topic-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="pull-right">
        <p>
            <?php echo Html::a('Create New', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="clearfix"></div>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'excerpt:ntext',
            // 'icon',
            // 'color',
            // 'parent_id',
            // 'sort_number',
            'status',
            'created_at',
            // 'updated_at',

            ['class' => 'backend\grid\ActionColumn'],
        ],
    ]); ?>

</div>
