<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */

$this->title = 'Filestack';
?>
<h1>filestack/index</h1>


<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'      => [
        'id',
        'name',
        'created_at:datetime',
        // ...
    ],
]) ?>
