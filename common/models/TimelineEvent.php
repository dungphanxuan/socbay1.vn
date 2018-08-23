<?php

namespace common\models;

use common\helpers\TimeHelper;
use common\models\query\TimelineEventQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "timeline_event".
 *
 * @property integer $id
 * @property string  $application
 * @property string  $category
 * @property string  $event
 * @property string  $data
 * @property string  $created_at
 */
class TimelineEvent extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%timeline_event}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class'              => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => null
            ]
        ];
    }

    /**
     * @return TimelineEventQuery
     */
    public static function find()
    {
        return new TimelineEventQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['application', 'category', 'event'], 'required'],
            [['data'], 'safe'],
            [['application', 'category', 'event'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        $this->data = @json_decode($this->data, true);
        parent::afterFind();
    }

    /**
     * @return string
     */
    public function getFullEventName()
    {
        return sprintf('%s.%s', $this->category, $this->event);
    }

    public static function getCountByDay($update = false)
    {
        $cacheKey = [
            TimelineEvent::class,
            't2c'
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false) {
            $data = 0;
            $data = TimelineEvent::find()->today()->count();

            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_AN_HOUR);
        }

        return $data ? $data : 0;

    }
}
