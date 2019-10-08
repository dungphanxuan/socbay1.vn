<?php

namespace common\models\media;

use common\models\User;
use Yii;
use common\models\query\ArticleQuery;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "med_media".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $excerpt
 * @property int $type
 * @property string $view
 * @property int $episode Tập film
 * @property int $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $video_path
 * @property string $video_base_url
 * @property int $video_play_type
 * @property string $url_local
 * @property string $url_streaming
 * @property string $youtube_id
 * @property string $youtube_url
 * @property string $vimeo_url
 * @property string $review_url
 * @property int $review_type
 * @property int $view_count
 * @property int $like_count
 * @property int $dislike_count
 * @property int $share_count
 * @property int $favorite_count
 * @property int $comment_count
 * @property int $matched
 * @property int $is_syn
 * @property int $min_total
 * @property int $next_id
 * @property int $preview_id
 * @property int $login_require
 * @property int $is_hot
 * @property int $video_status
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $published_at
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MediaAttachment[] $medMediaAttachments
 */
class Media extends \yii\db\ActiveRecord
{
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 0;
    /**
     * @var array
     */
    public $attachments;
    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @var array
     */
    public $source;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_media';
    }

    /**
     * @return array statuses list
     */
    public static function statuses()
    {
        return [
            self::STATUS_DRAFT => Yii::t('common', 'Draft'),
            self::STATUS_PUBLISHED => Yii::t('common', 'Published'),
        ];
    }

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
                'uploadRelation' => 'mediaAttachments',
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
            [
                'class' => UploadBehavior::class,
                'attribute' => 'source',
                'pathAttribute' => 'video_path',
                'baseUrlAttribute' => 'video_base_url',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'thumbnail', 'episode'], 'required'],
            [['body', 'excerpt'], 'string'],
            [['published_at'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['published_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],

            [['type', 'episode', 'category_id', 'video_play_type', 'review_type', 'view_count', 'like_count', 'dislike_count', 'share_count', 'favorite_count', 'comment_count', 'matched', 'is_syn', 'min_total', 'next_id', 'preview_id', 'login_require', 'is_hot', 'video_status', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'view', 'thumbnail_base_url', 'thumbnail_path', 'url_local', 'url_streaming', 'youtube_id', 'youtube_url', 'vimeo_url', 'review_url'], 'string', 'max' => 255],
            [['attachments', 'thumbnail', 'source'], 'safe'],
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
            'title' => 'Tiêu đề',
            'body' => 'Nội dung',
            'excerpt' => 'Mô tả ngắn',
            'type' => 'Type',
            'view' => 'View',
            'episode' => 'Tập film',
            'category_id' => 'Danh mục',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',
            'video_play_type' => 'Video Play Type',
            'url_local' => 'Url Local',
            'url_streaming' => 'Url Streaming',
            'youtube_id' => 'Youtube ID',
            'youtube_url' => 'Youtube Url',
            'vimeo_url' => 'Vimeo Url',
            'review_url' => 'Review Url',
            'review_type' => 'Review Type',
            'view_count' => 'View Count',
            'like_count' => 'Like Count',
            'dislike_count' => 'Dislike Count',
            'share_count' => 'Share Count',
            'favorite_count' => 'Favorite Count',
            'comment_count' => 'Comment Count',
            'matched' => 'Matched',
            'is_syn' => 'Is Syn',
            'min_total' => 'Min Total',
            'next_id' => 'Next ID',
            'preview_id' => 'Preview ID',
            'login_require' => 'Login Require',
            'is_hot' => 'Is Hot',
            'video_status' => 'Video Status',
            'status' => 'Trạng thái',
            'created_by' => 'Người tạo',
            'updated_by' => 'Updated By',
            'published_at' => 'Xuất bản lúc',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediaAttachments()
    {
        return $this->hasMany(MediaAttachment::class, ['media_id' => 'id']);
    }

    public function copyModel($id, $copy_assets = false)
    {
        $cModel = Media::find()->where(['id' => $id])->one();
        if ($cModel) {
            $data = $cModel->attributes;
            $this->setAttributes($data);
            //Copy thumbnail, note copy image from Filestack, Google Cloud Storage
            if ($copy_assets) {
                if ($cModel->thumbnail) {
                    if (fileStorage()->getFilesystem()->has($cModel->thumbnail['path'])) {
                        $this->thumbnail = $cModel->thumbnail;
                        $copyImage = "1/cp_" . Yii::$app->security->generateRandomString(20) . date('YmdHim') . ".jpg";
                        $this->thumbnail['path'] = $copyImage;
                        $this->thumbnail_path = $copyImage;
                        fileSystem()->copy($cModel->thumbnail['path'], $copyImage);
                    }
                }
                //Copy attachments
                $this->attachments = $cModel->attachments;
                foreach ($cModel->articleAttachments as $key => $img) {
                    if (fileStorage()->getFilesystem()->has($cModel->attachments[$key]['path'])) {
                        $new_filename = "1/cp_" . $key . "_" . date('YmdHim') . time() . ".jpg";
                        fileSystem()->copy($cModel->attachments[$key]['path'], $new_filename);
                        $this->attachments[$key]['path'] = $new_filename;
                    }
                }
            }

            $this->slug = '';
        }
    }

    public function getUrl()
    {
        $url = '';
        if ($this->video_path) {
            $url = $this->video_base_url . '/' . $this->video_path;
        }
        if ($this->url_local) {
            $url = $this->url_local;
        }
        return $url;

    }

    public function getPoster()
    {
        $url = '';
        if ($this->thumbnail_path) {
            $url = $this->thumbnail_base_url . '/' . $this->thumbnail_path;
        }

        return $url;

    }
}
