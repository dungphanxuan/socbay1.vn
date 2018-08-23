<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 8/16/2017
 * Time: 2:58 PM
 */

namespace frontend\components;

class AppView extends \yii\web\View
{
    public $bodyId;

    /**
     * @var string the page description
     */
    public $description;

    /**
     * @var string the page keywords
     */
    public $keywords;

    /*
    * Yii allows you to add magic getter methods by prefacing method names with "get"
    */
    public function getBodyIdAttribute()
    {
        return ($this->bodyId != '') ? 'id="' . $this->bodyId . '"' : '';
    }
}