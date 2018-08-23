<?php

use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */

$itemData = [1 => 'France', 2 => 'Germany'];
?>
<div class="testing-default-index">
    <h1>Checkbox Demo</h1>
    <?php
    echo Html::checkbox('as', null, []);

    ?>
    <h3>Checkbox list</h3>
    <?php
    echo Html::checkboxList('a', [2], $itemData,
        [
            'class' => 'browse-list list-unstyled', 'tag' => 'ul',

            'item' => function ($index, $label, $name, $checked, $value) {
                $checked = $checked ? 'checked' : '';

                $temp = <<<HTML
                        <li>
  <input type="checkbox" $checked name="$name" value="$value" id="c$value" class="emp"
                       $checked>
                <label for="c$value">$label</label></li>
HTML;

                return $temp;
            }

        ]);

    ?>

    <h3>Radio list</h3>
    <?php
    echo Html::radioList('r', [2], $itemData,
        [
            'class' => 'browse-list list-unstyled', 'tag' => 'ul',

            'item' => function ($index, $label, $name, $checked, $value) {
                $checked = $checked ? 'checked' : '';

                $temp = <<<HTML
                        <li>
  <input type="radio" $checked name="$name" value="$value" id="r$value" class="emp"
                       $checked>
                <label for="r$value">$label</label></li>
HTML;

                return $temp;
            }

        ]);

    ?>
</div>
