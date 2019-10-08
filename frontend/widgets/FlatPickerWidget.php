<?php

namespace frontend\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use frontend\assets\Datepicker;

/**
 * Class FlatTimeWidget
 * @package yii2-widget
 */
class FlatPickerWidget extends InputWidget
{
    /**
     * @var array
     * Full list of available client options see here:
     * @link http://eonasdan.github.io/bootstrap-datetimepicker/#options
     */
    public $clientOptions = [];
    /**
     * @var array the event handlers for the underlying bootstrap-datetimepicker plugin.
     */
    public $clientEvents = [];
    /**
     * @var array
     */
    public $containerOptions = [];
    /**
     * @var array
     */
    public $inputAddonOptions = [];
    /**
     * @var string
     */
    public $phpDatetimeFormat = 'yyyy/mm/dd';
    public $phpDatetimeFormatOut = 'yyyy/MM/dd';
    /**
     * @var
     */
    public $momentDatetimeFormat;

    /**
     * @var bool
     */
    public $showInputAddon = false;
    /**
     * @var string
     */
    public $inputAddonContent;
    /**
     * @var array
     */
    public $phpMomentMapping = [];
    /**
     * @var string Moment.js locale
     * Full list of available locales are here:
     * @link https://github.com/moment/moment/tree/develop/locale
     */
    public $autoShow = false;
    public $autoHide = false;
    public $autoPick = false;
    public $inline = false;
    public $zIndex = 2048;
    public $format = 'yyyy/mm/dd';
    public $startDate = null;
    public $endDate = null;
    public $startView = 0;
    public $language = 'vi';

    /**
     * @var array
     */
    protected $defaultPhpMomentMapping = [
        "dd/mm/yyyy" => 'dd/mm/yyyy',
        "dd/MM/yyyy" => 'DD/MM/YYYY',
        "yyyy/MM/dd" => 'YYYY/MM/DD',
    ];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $value = $this->hasModel() ? Html::getAttributeValue($this->model, $this->attribute) : $this->value;

        // Init default clientOptions
        $this->clientOptions = ArrayHelper::merge([
            'language' => $this->language ?: substr(Yii::$app->language, 0, 2),
            'format' => $this->format,
            'zIndex' => $this->zIndex,
            'autoShow' => $this->autoShow,
            'autoHide' => $this->autoHide,
            'startDate' => $this->startDate,
        ], $this->clientOptions);

        // Init default options
        $this->options = ArrayHelper::merge([
            'class' => 'form-control',
        ], $this->options);

        if ($value !== null && trim($value) !== '') {
            $this->options['value'] = array_key_exists('value', $this->options)
                ? $this->options['value']
                : Yii::$app->formatter->asDate($value, $this->phpDatetimeFormatOut);
        }

        if (!isset($this->containerOptions['id'])) {
            $this->containerOptions['id'] = $this->getId();
        }

        $this->registerJs();
    }

    protected function registerJs()
    {
        Datepicker::register($this->getView());
        $clientOptions = Json::encode($this->clientOptions);
        $this->getView()->registerJs("$('#{$this->containerOptions['id']} input').datepicker({$clientOptions})");

        if (!empty($this->clientEvents)) {
            $js = [];
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#{$this->containerOptions['id']}').on('$event', $handler);";
            }
            $this->getView()->registerJs(implode("\n", $js));
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        $content = [];

        Html::addCssStyle($this->containerOptions, 'position: relative');
        $content[] = Html::beginTag('div', $this->containerOptions);
        $content[] = $this->renderInput();

        if ($this->showInputAddon) {
            $content[] = $this->renderInputAddon();
        }

        $content[] = Html::endTag('div');
        return implode("\n", $content);
    }

    /**
     * @return string
     */
    protected function renderInput()
    {
        if ($this->hasModel()) {
            $content = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $content = Html::textInput($this->name, $this->value, $this->options);
        }
        return $content;
    }

    /**
     * @return string
     */
    protected function renderInputAddon()
    {
        $content = [];
        if (!array_key_exists('class', $this->inputAddonOptions)) {
            Html::addCssClass($this->inputAddonOptions, 'input-group-addon');
        }
        if (!array_key_exists('style', $this->inputAddonOptions)) {
            Html::addCssStyle($this->inputAddonOptions, ['cursor' => 'pointer']);
        }
        $content[] = Html::beginTag('span', $this->inputAddonOptions);
        if ($this->inputAddonContent) {
            $content[] = $this->inputAddonContent;
        } else {
            $content[] = Html::tag('span', '', ['class' => 'glyphicon glyphicon-calendar']);
        }
        $content[] = Html::endTag('span');

        return implode("\n", $content);
    }


}
