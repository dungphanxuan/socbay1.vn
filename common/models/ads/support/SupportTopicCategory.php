<?php

namespace common\models\ads\support;

use Yii;

/**
 * This is the model class for table "sup_topic_category".
 *
 * @property int                    $id
 * @property string                 $slug
 * @property string                 $title
 * @property string                 $body
 * @property string                 $excerpt
 * @property string                 $icon
 * @property string                 $color
 * @property int                    $parent_id
 * @property int                    $sort_number
 * @property int                    $status
 * @property int                    $created_at
 * @property int                    $updated_at
 *
 * @property SupTopic[]             $supTopics
 * @property SupportTopicCategory   $parent
 * @property SupportTopicCategory[] $supportTopicCategories
 */
class SupportTopicCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sup_topic_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body', 'excerpt'], 'string'],
            [['parent_id', 'sort_number', 'status', 'created_at', 'updated_at'], 'integer'],
            [['slug'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 128],
            [['icon'], 'string', 'max' => 16],
            [['color'], 'string', 'max' => 8],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => SupportTopicCategory::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'slug'        => 'Slug',
            'title'       => 'Title',
            'body'        => 'Body',
            'excerpt'     => 'Excerpt',
            'icon'        => 'Icon',
            'color'       => 'Color',
            'parent_id'   => 'Parent ID',
            'sort_number' => 'Sort Number',
            'status'      => 'Status',
            'created_at'  => 'Created At',
            'updated_at'  => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupTopics()
    {
        return $this->hasMany(SupportTopic::class, ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(SupportTopicCategory::class, ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTopicCategories()
    {
        return $this->hasMany(SupportTopicCategory::class, ['parent_id' => 'id']);
    }
}
