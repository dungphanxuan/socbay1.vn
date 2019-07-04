<?php

namespace frontend\widgets;

use common\components\object\ObjectIdentityInterface;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use common\models\base\ActiveRecord;
use yii\helpers\Url;

/**
 * Star widget for following items
 */
class Star extends Widget
{
    /**
     * @var ActiveRecord|ObjectIdentityInterface
     */
    public $model;

    public $starValue;

    public $view = 'star';

    public $text = 'Star';

    public function init()
    {
        if ($this->model === null) {
            throw new InvalidConfigException('Star widget property model is not set.');
        }
    }

    public function run()
    {
        $modelType = $this->model->getObjectType();
        $modelId = $this->model->getObjectId();

        if ($this->starValue === null) {
            // display start widget for an item
            $starValue = 0;
            if (!Yii::$app->user->isGuest) {
                $starValue = \common\models\system\Star::getStarValue($this->model, Yii::$app->user->id);
            }
            $starCount = \common\models\system\Star::getFollowerCount($this->model);
        } else {
            // display start widget on user profile page
            $starValue = $this->starValue;
            $starCount = null;
        }


        //$view = 'star';
        return $this->render($this->view, [
            'ajaxUrl' => Url::to(['/ajax/star', 'type' => $modelType, 'id' => $modelId]),
            'starValue' => $starValue,
            'starCount' => $starCount,
        ]);
    }
}
