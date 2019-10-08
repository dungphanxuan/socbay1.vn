<?php

namespace common\models\system;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $object_type
 * @property string $object_id
 * @property string $text
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property int $total_votes
 * @property int $up_votes
 * @property float $rating
 *
 * @property User $user
 */
class Comment extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @var array Allow class for star
     */
    public static $modelClasses = ['Article', 'Page', 'Wiki', 'Extension'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @return CommentQuery
     */
    public static function find()
    {
        return Yii::createObject(CommentQuery::class, [get_called_class()]);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => $this->timeStampBehavior(),
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'text' => Yii::t('app', 'Text'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /*
     * Get model item
     * @return Model Item
     * */
    public function getModel()
    {
        if (!in_array($this->object_type, static::$modelClasses, true)) {
            return null;
        }
        /** @var $modelClass ActiveRecord */
        $modelClass = "common\\models\\{$this->object_type}";

        return $modelClass::findOne($this->object_id);
    }

    public function getModelCM()
    {
        if (!in_array($this->object_type, static::$modelClasses, true)) {
            return null;
        }
        /** @var $modelClass ActiveRecord */
        $modelClass = "common\\models\\cm\\{$this->object_type}";

        return $modelClass::findOne($this->object_id);
    }
}
