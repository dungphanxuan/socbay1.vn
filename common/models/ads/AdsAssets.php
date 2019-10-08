<?php

namespace common\models\ads;

use common\components\SluggableBehavior;
use common\helpers\TimeHelper;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ads_assets".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $parent_id
 * @property string $key
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $thumbnail_base_url_data
 * @property string $thumbnail_path_data
 * @property int $type
 * @property int $status
 * @property int $sort_number
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AdsAssetsAttachment[] $adsAssetsAttachments
 */
class AdsAssets extends \yii\db\ActiveRecord
{

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
    public static function tableName()
    {
        return 'ads_assets';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            //BlameableBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true,
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'adsAssetsAttachments',
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
            [['title', 'key'], 'required'],
            [['body'], 'string'],
            [['parent_id', 'type', 'status', 'sort_number', 'created_at', 'updated_at'], 'integer'],
            [['title', 'slug', 'thumbnail_path', 'thumbnail_path_data'], 'string', 'max' => 255],
            [['key'], 'string', 'max' => 64],
            [['thumbnail_base_url', 'thumbnail_base_url_data'], 'string', 'max' => 128],
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
            'title' => 'Title',
            'slug' => 'Slug',
            'body' => 'Body',
            'parent_id' => 'Parent ID',
            'key' => 'Key',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',
            'thumbnail_base_url_data' => 'Thumbnail Base Url Data',
            'thumbnail_path_data' => 'Thumbnail Path Data',
            'type' => 'Type',
            'status' => 'Status',
            'sort_number' => 'Sort Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsAssetsAttachments()
    {
        return $this->hasMany(AdsAssetsAttachment::class, ['assets_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getImgThumbnail()
    {
        $url = $this->thumbnail_base_url . '/' . $this->thumbnail_path;
        return $url;
    }

    /**
     * @return string
     */
    public static function getAssets($key, $type = 1, $update = false)
    {
        $cacheKey = [
            AdsAssets::class,
            'k'
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = '';
            $model = AdsAssets::find()->where(['key' => $key])->one();
            if ($model && $model->thumbnail_path) {
                $data = $model->thumbnail_base_url . '/' . $model->thumbnail_path;
            }
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }

        return $data;
    }


}
