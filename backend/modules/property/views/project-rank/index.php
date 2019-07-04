<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\property\ProjectRankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Ranks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-3">
        <?php
        echo $this->render('@backend/modules/property/views/default/_menu')
        ?>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <div class="project-rank-index">

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
                            [
                                'attribute' => 'id',
                                'format' => 'raw',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'contentOptions' => ['style' => 'width:10%;text-align:center'],
                            ],
                            'title',
                            'slug',
                            'sort_number',
                            [
                                'class' => 'backend\grid\ActionColumn',
                                'template' => '{update} {delete}',
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
