<?php

namespace common\models\job;

use common\components\SluggableBehavior;
use common\models\ArticleDetail;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "job_company".
 *
 * @property int $id
 * @property int $contact_id
 * @property string $slug
 * @property string $title
 * @property string $title_en
 * @property string $title_short
 * @property string $body
 * @property string $excerpt
 * @property string $view
 * @property string $address
 * @property string $url
 * @property string $email
 * @property string $phone
 * @property int $start_date
 * @property int $end_date
 * @property int $complete_on
 * @property int $city_id
 * @property int $district_id
 * @property int $ward_id
 * @property double $lat
 * @property double $lng
 * @property int $total_votes
 * @property int $up_votes
 * @property double $rating
 * @property int $featured
 * @property int $comment_count
 * @property int $view_count
 * @property int $sort_number
 * @property string $thumbnail_base_url
 * @property string $banner_base_url
 * @property string $thumbnail_path
 * @property string $banner_path
 * @property int $type
 * @property int $status
 * @property int $user_id
 * @property int $created_by
 * @property int $updated_by
 * @property int $published_at
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @var array
     */
    public $banner;

    /**
     * @var array
     */
    public $attachments;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_company';
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
                'immutable' => true
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'banner',
                'pathAttribute' => 'banner_path',
                'baseUrlAttribute' => 'banner_base_url'
            ]
        ];

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_id', 'start_date', 'end_date', 'complete_on', 'city_id', 'district_id', 'ward_id', 'total_votes', 'up_votes', 'featured', 'comment_count', 'view_count', 'sort_number', 'type', 'status', 'user_id', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'required', 'message' => 'Vui lòng nhập tên công ty'],
            [['body'], 'required', 'message' => 'Vui lòng nhập mô tả công ty'],
            [['body', 'excerpt'], 'string'],
            [['lat', 'lng', 'rating'], 'number'],
            [['slug', 'view', 'address', 'url', 'email', 'phone', 'thumbnail_path'], 'string', 'max' => 255],
            [['title', 'title_en', 'title_short', 'thumbnail_base_url'], 'string', 'max' => 128],
            //[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            //[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['attachments', 'thumbnail', 'banner'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact_id' => 'Contact ID',
            'slug' => 'Slug',
            'title' => 'Tên công ty',
            'title_en' => 'Tên tiếng anh',
            'title_short' => 'Mô tả',
            'body' => 'Body',
            'excerpt' => 'Excerpt',
            'view' => 'View',
            'url' => 'Địa chỉ website',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'complete_on' => 'Complete On',
            'city_id' => 'City ID',
            'district_id' => 'District ID',
            'ward_id' => 'Ward ID',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'total_votes' => 'Total Votes',
            'up_votes' => 'Up Votes',
            'rating' => 'Rating',
            'featured' => 'Featured',
            'comment_count' => 'Comment Count',
            'view_count' => 'View Count',
            'sort_number' => 'Sort Number',
            'banner_base_url' => 'Thumbnail Base Url',
            'banner_path' => 'Thumbnail Path',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',
            'thumbnail' => 'Ảnh Thumbnail',
            'type' => 'Type',
            'status' => 'Trạng thái',
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * @return int
     */
    public function getTotalJobs()
    {
        return $this->hasMany(ArticleDetail::class, ['job_company_id' => 'id'])
            ->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::class, ['id' => 'district_id']);
    }

    public function getFullAddress($type = 1)
    {
        $address = $this->address;

        if (!$address) {
            if ($this->ward_id) {
                $address = $this->ward->name;
            }

            if ($this->district_id) {
                $address = $address . ' - ' . $this->district->name;
            }
            if ($this->city_id) {
                $address = $address . ' - ' . $this->city->name;
            }
        }
        return $address;
    }

    /*
    * Image Thumbnail
    * */
    public function getImgThumbnail($type = 1, $q = 75, $w = null, $h = null)
    {
        $url = '';
        $hasPath = fileSystem()->has($this->thumbnail_path);
        $path = 'image/logo_square.png';
        if ($this->thumbnail_path && $hasPath) {
            $path = $this->thumbnail_path;
        }
        switch ($type) {
            case 1:
                $url = $this->thumbnail_base_url . '/' . $path;
                break;
            case 2:
                $signConfig = [
                    'glide/index',
                    'path' => $path,
                    'fit' => 'crop'
                ];
                if ($w) {
                    $signConfig['w'] = $w;
                }
                if ($h) {
                    $signConfig['h'] = $h;
                }
                $url = Yii::$app->glide->createSignedUrl($signConfig);
                break;
            default:
                $signConfig = [
                    'glide/index',
                    'path' => $path,
                    'w' => '480',
                    'h' => '240',
                    'fit' => 'crop'
                ];

                $url = Yii::$app->glide->createSignedUrl($signConfig);
        }

        return $url;
    }

}
