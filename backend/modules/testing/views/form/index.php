<?php

use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */

?>
<div class="testing-default-index">
    <h1>Form Demo</h1>
    <p>Checkbox</p>
    <?php
    echo Html::checkboxList('a', null, ['FR' => 'France', 'DE' => 'Germany']);

    ?>
</div>
