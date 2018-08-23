<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/12/2017
 * Time: 10:20 AM
 */

namespace frontend\widgets;

use common\helpers\Mobile_Detect;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class LinkPager extends \yii\widgets\LinkPager
{

    public $linkContainerOptions = [
        'class' => 'page-item'
    ];
    /**
     * @var array HTML attributes for the link in a pager container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $linkOptions = [
        'class' => 'page-link'
    ];

    /**
     * @var int maximum number of page buttons that can be displayed. Defaults to 10.
     */
    public $maxButtonCount = 10;

    /**
     * Initializes the pager.
     */
    public function init()
    {
        $detech = new Mobile_Detect();
        if ($detech->isMobile()) {
            $this->maxButtonCount = 5;
        }

        parent::init();
    }


    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = $this->linkContainerOptions;
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, empty($class) ? $this->pageCssClass : $class);

        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);
            $tag = ArrayHelper::remove($this->disabledListItemSubTagOptions, 'tag', 'span');

            //return Html::tag($linkWrapTag, Html::tag($tag, $label, $this->disabledListItemSubTagOptions), $options);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        return Html::tag($linkWrapTag, Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
    }

}