<?php

namespace common\models\ads\support;

use common\components\SluggableBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "sup_topic".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $view
 * @property int $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property int $total_votes
 * @property int $up_votes
 * @property double $rating
 * @property int $featured
 * @property int $comment_count
 * @property int $view_count
 * @property int $sort_number
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $published_at
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property SupportTopicCategory $category
 * @property User $updatedBy
 * @property SupportTopicAttachment[] $supTopicAttachments
 */
class SupportTopic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sup_topic';
    }

    /**
     * @var array
     */
    public $attachments;


    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true,
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'topicAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['category_id', 'total_votes', 'up_votes', 'comment_count', 'view_count', 'sort_number', 'status', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['rating'], 'number'],
            [['slug', 'view'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 128],
            [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['featured'], 'string', 'max' => 1],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SupportTopicCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['attachments', 'thumbnail'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'body' => 'Body',
            'view' => 'View',
            'category_id' => 'Category',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',
            'total_votes' => 'Total Votes',
            'up_votes' => 'Up Votes',
            'rating' => 'Rating',
            'featured' => 'Featured',
            'comment_count' => 'Comment Count',
            'view_count' => 'View Count',
            'sort_number' => 'Sort Number',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(SupportTopicCategory::class, ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicAttachments()
    {
        return $this->hasMany(SupportTopicAttachment::class, ['topic_id' => 'id']);
    }
}
