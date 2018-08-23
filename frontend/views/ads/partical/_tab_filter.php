<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/9/2018
 * Time: 10:45 AM
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use frontend\assets\AdsAsset;
use common\models\data\ArticleData;

/* @var $this yii\web\View */

$dataItem = [
    1 => 'Giá: Thấp tới cao',
    2 => 'Giá: Cao tới thấp'
];
?>
<?php
echo Html::dropDownList('sort-filter', 0, $dataItem, ['class' => 'selectpicker select-sort-by', 'data-style' => 'btn-select', 'data-width' => 'auto', 'title' => 'Sắp xếp', 'prompt' => 'Sắp xếp'])
?>