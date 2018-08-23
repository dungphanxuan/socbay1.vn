<?php

namespace common\models\property;

/**
 * This is the model class for table "d_project_pickup".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $project_id
 * @property integer $sort_number
 */
class ProjectPickup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_project_pickup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'type'], 'required'],
            [['project_id', 'sort_number', 'type'], 'integer'],
            //['project_id', 'unique', 'targetAttribute' => ['project_id', 'lang_id'], 'message' => 'Dự án nổi bật đã được sử dụng!'],

            [
                ['sort_number'],
                'default',
                'value' => 0
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'type'        => 'Loại dự án',
            'project_id'  => 'Dự án',
            'sort_number' => 'Sort Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }
}
