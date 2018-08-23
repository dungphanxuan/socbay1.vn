<?php

namespace common\models\job;

use Yii;

/**
 * This is the model class for table "job_level".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $status
 * @property int $type
 * @property int $sort_number
 */
class JobLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status', 'type', 'sort_number'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['slug'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'title'       => 'Title',
            'slug'        => 'Slug',
            'status'      => 'Status',
            'type'        => 'Type',
            'sort_number' => 'Sort Number',
        ];
    }
}
