<?php

namespace common\models\property;

/**
 * This is the model class for table "m_project_attachment".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string  $path
 * @property string  $base_url
 * @property string  $type
 * @property integer $size
 * @property string  $name
 * @property integer $order
 * @property integer $created_at
 *
 * @property Project $project
 */
class ProjectAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pm_project_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'path'], 'required'],
            [['project_id', 'size', 'order', 'created_at'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [
                ['project_id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => MProject::class,
                'targetAttribute' => ['project_id' => 'id']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'project_id' => 'Project ID',
            'path'       => 'Path',
            'base_url'   => 'Base Url',
            'type'       => 'Type',
            'size'       => 'Size',
            'name'       => 'Name',
            'order'      => 'Order',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(MProject::class, ['id' => 'project_id']);
    }
}
