<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property integer $id
 * @property string  $user_id
 * @property string  $user_ip
 * @property string  $action
 * @property string  $url
 * @property integer $time
 * @property integer $type
 * @property integer $execute_time
 */
class WebLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%web_log}}';
    }

    public function behaviors()
    {
        return [
            [
                'class'              => TimestampBehavior::class,
                'createdAtAttribute' => 'time',
                'updatedAtAttribute' => 'time',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'type', 'user_id'], 'integer'],
            ['execute_time', 'number'],
            [['user_ip'], 'string', 'max' => 32],
            [['action', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'      => 'ID',
            'user_ip' => 'IP',
            'action'  => 'Hành động',
            'url'     => 'Url',
            'time'    => 'Thời gian',
            'type'    => 'Loại',
        ];
    }
}
