<?php

use common\grid\EnumColumn;
use common\models\User;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use trntv\yii\datetime\DateTimeWidget;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="user-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div class="pull-right">
            <p>
                <?php echo Html::a('<i class="fa fa-plus-circle" aria-hidden="true"></i> ' . Yii::t('ads', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
                <?php echo Html::a('<i class="fa fa-bar-chart" aria-hidden="true"></i> ' . Yii::t('ads', 'Chart'), ['chart', 'object_id' => getParam('object_id')], ['class' => 'btn btn-info']) ?>
            </p>
        </div>
        <div class="clearfix"></div>

        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'id' => 'wuser',
                'class' => 'grid-view table-responsive'
            ],
            'pager' => [
                'maxButtonCount' => 15,
            ],
            'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
            'columns' => [
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'headerOptions' => ['style' => 'width:3%;text-align:center'],
                    'contentOptions' => ['style' => 'width:3%;text-align:center'],
                ],
                [
                    'attribute' => 'id',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:7%;text-align:center'],
                ],
                [
                    'attribute' => 'username',
                    'format' => 'raw',
                    'header' => 'Tên thành viên',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                    'value' => function ($model) {
                        $publicIdentity = $model->publicIdentity;

                        return $publicIdentity;
                    },
                ],
                //'username',
                //'status',
                'email:email',
                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'format' => 'raw',
                    'type' => 2,
                    'enum' => User::statuses(),
                    'filter' => User::statuses(),
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                ],
                [
                    'attribute' => 'oauth_client_user_id',
                    'header' => 'Oauth Clien ID',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->oauth_client_user_id, 'http://facebook.com/' . $model->oauth_client_user_id, ['target' => '_blank']);
                    },
                ],
                [
                    'attribute' => 'role_name',
                    'format' => 'raw',
                    'header' => 'Role',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:10%;text-align:center'],
                    'value' => function ($model) {
                        $role = \Yii::$app->authManager->getRolesByUser($model->id);
                        reset($role);
                        $first_key = key($role);

                        return $first_key;
                    },
                    'filter' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'datetimerel',
                    'filter' => DateTimeWidget::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'phpDatetimeFormat' => 'dd.MM.yyyy',
                        'momentDatetimeFormat' => 'DD.MM.YYYY',
                        'clientEvents' => [
                            'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
                        ],
                    ]),
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'width:13%;text-align:center'],
                ],
                [
                    'attribute' => 'logged_at',
                    'format' => ['datetime', 'short'],
                    'filter' => DateTimeWidget::widget([
                        'model' => $searchModel,
                        'attribute' => 'logged_at',
                        'phpDatetimeFormat' => 'dd.MM.yyyy',
                        'momentDatetimeFormat' => 'DD.MM.YYYY',
                        'clientEvents' => [
                            'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
                        ],
                    ])
                ],
                // 'updated_at',

                [
                    'class' => 'backend\grid\ActionColumn',
                    'template' => '{login} {view} {update} {delete}',
                    'buttons' => [
                        'login' => function ($url) {
                            return Html::a(
                                '<i class="fa fa-sign-in" aria-hidden="true"></i>',
                                $url,
                                [
                                    'title' => Yii::t('backend', 'Login'),
                                    'class' => 'btn btn-xs btn-warning'
                                ]
                            );
                        },
                    ],
                    'visibleButtons' => [
                        'login' => Yii::$app->user->can('administrator')
                    ]

                ],
            ],
        ]); ?>

    </div>

<?php
$app_css = <<<CSS
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
input[type='checkbox'] {
cursor: pointer;
 }
.is-selected {
    background-color: #e0e0e0;
}
#wuser{
    min-height: 500px !important;
}
CSS;

$this->registerCss($app_css);

$app_js = <<<JS
 $('tbody input[type="checkbox').change(function() {
        if($(this).is(":checked")) {
            $(this).parents("tr").addClass("is-selected");
        }else{
            $(this).parents("tr").removeClass("is-selected");
        }
        
    });
JS;

$this->registerJs($app_js);