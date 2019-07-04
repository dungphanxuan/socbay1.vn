<?php

namespace common\models\ads\support;

use Yii;

/**
 * This is the model class for table "sup_topic_pickup".
 *
 * @property int $id
 * @property int $topic_id
 * @property int $sort_number
 * @property int $created_at
 */
class SupportTopicPickup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sup_topic_pickup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id'], 'required'],
            [['topic_id', 'sort_number', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic_id' => 'Topic ID',
            'sort_number' => 'Sort Number',
            'created_at' => 'Created At',
        ];
    }
}
