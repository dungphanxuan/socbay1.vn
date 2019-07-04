<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/17/2018
 * Time: 5:29 PM
 */


namespace frontend\widgets;

use yii\helpers\Html;

class BootstrapAlert extends \yii\bootstrap4\Alert
{
    /**
     * Initializes the widget options.
     * This method sets the default values for various options.
     */
    protected function initOptions()
    {
        Html::addCssClass($this->options, ['alert', 'alert-flash']);

        if ($this->closeButton !== false) {
            $this->closeButton = array_merge([
                'data-dismiss' => 'alert',
                'aria-hidden' => 'true',
                'class' => 'close',
            ], $this->closeButton);
        }
    }
}