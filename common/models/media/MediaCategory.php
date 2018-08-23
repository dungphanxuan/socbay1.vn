<?php

namespace common\models\media;

use Yii;

/**
 * This is the model class for table "med_media_category".
 *
 * @property int    $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int    $parent_id
 * @property string $key
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $thumbnail_base_url_data
 * @property string $thumbnail_path_data
 * @property int    $type
 * @property int    $status
 * @property int    $sort_number
 * @property int    $created_at
 * @property int    $updated_at
 */
class MediaCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_media_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'key'], 'required'],
            [['body'], 'string'],
            [['parent_id', 'type', 'status', 'sort_number', 'created_at', 'updated_at'], 'integer'],
            [['title', 'slug', 'thumbnail_path', 'thumbnail_path_data'], 'string', 'max' => 255],
            [['key'], 'string', 'max' => 8],
            [['thumbnail_base_url', 'thumbnail_base_url_data'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                      => 'ID',
            'title'                   => 'Title',
            'slug'                    => 'Slug',
            'body'                    => 'Body',
            'parent_id'               => 'Parent ID',
            'key'                     => 'Key',
            'thumbnail_base_url'      => 'Thumbnail Base Url',
            'thumbnail_path'          => 'Thumbnail Path',
            'thumbnail_base_url_data' => 'Thumbnail Base Url Data',
            'thumbnail_path_data'     => 'Thumbnail Path Data',
            'type'                    => 'Type',
            'status'                  => 'Status',
            'sort_number'             => 'Sort Number',
            'created_at'              => 'Created At',
            'updated_at'              => 'Updated At',
        ];
    }
}
