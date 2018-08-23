<?php

namespace common\models\media;

use Yii;

/**
 * This is the model class for table "med_media_detail".
 *
 * @property int    $id
 * @property int    $media_id
 * @property string $title
 * @property string $body
 * @property string $path
 * @property string $base_url
 * @property string $url
 * @property int    $created_at
 */
class MediaDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_media_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['media_id'], 'required'],
            [['media_id', 'created_at'], 'integer'],
            [['body'], 'string'],
            [['title', 'path', 'base_url', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'media_id'   => 'Media ID',
            'title'      => 'Title',
            'body'       => 'Body',
            'path'       => 'Path',
            'base_url'   => 'Base Url',
            'url'        => 'Url',
            'created_at' => 'Created At',
        ];
    }
}
