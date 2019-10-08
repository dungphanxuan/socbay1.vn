<?php

namespace common\grid;

use common\models\Article;
use common\models\User;
use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class EnumColumn
 * [
 *      'class' => 'common\grid\EnumColumn',
 *      'attribute' => 'role',
 *      'enum' => User::getRoles()
 * ]
 * @package common\components\grid
 */
class EnumColumn extends DataColumn
{
    /**
     * @var integer Content Type: Article, User
     */
    public $type = 1;
    /**
     * @var array List of value => name pairs
     */
    public $enum = [];
    /**
     * @var bool
     */
    public $loadFilterDefaultValues = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->loadFilterDefaultValues && $this->filter === null) {
            $this->filter = $this->enum;
        }
    }

    /**
     * @param mixed $model
     * @param mixed $key
     * @param int $index
     * @return mixed
     */
    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);

        $labelClass = 'primary';
        switch ($this->type) {
            case 1:
                $labelClass = $value == Article::STATUS_PUBLISHED ? 'primary' : 'danger';
                break;
            case 2:
                $labelClass = $value == User::STATUS_ACTIVE ? 'primary' : 'danger';
                if ($value == User::STATUS_BANNED) {
                    $labelClass = 'warning';
                }
                break;
            default:
        }

        $content = ArrayHelper::getValue($this->enum, $value, $value);
        $tag = Html::tag('label', $content, ['class' => 'label label-' . $labelClass]);
        return $tag;
    }
}
