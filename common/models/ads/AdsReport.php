<?php

namespace common\models\ads;

use common\components\SluggableBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ads_report".
 *
 * @property int                $id
 * @property int                $reason_id
 * @property string             $slug
 * @property string             $title
 * @property string             $body
 * @property int                $report_id
 * @property int                $user_id
 * @property string             $user_email
 * @property int                $city_id
 * @property int                $district_id
 * @property int                $ward_id
 * @property string             $thumbnail_base_url
 * @property string             $thumbnail_path
 * @property int                $status
 * @property int                $sort_number
 * @property int                $approve_by Phê duyệt bởi
 * @property int                $created_by
 * @property int                $created_at
 * @property int                $updated_at
 *
 * @property ReportReason       $reason
 * @property ReportAttachment[] $adsReportAttachments
 */
class AdsReport extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_report';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class'              => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false,
            ],
            [
                'class'     => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true
            ],
            [
                'class'            => UploadBehavior::class,
                'attribute'        => 'thumbnail',
                'pathAttribute'    => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reason_id'], 'required'],
            [['reason_id', 'report_id', 'user_id', 'city_id', 'district_id', 'ward_id', 'status', 'sort_number', 'approve_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['body'], 'string'],
            [['slug', 'thumbnail_path'], 'string', 'max' => 255],
            [['title', 'user_email', 'thumbnail_base_url'], 'string', 'max' => 128],
            [['reason_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReportReason::class, 'targetAttribute' => ['reason_id' => 'id']],
            [['thumbnail'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                 => 'ID',
            'reason_id'          => 'Reason ID',
            'slug'               => 'Slug',
            'title'              => 'Title',
            'body'               => 'Nội dung',
            'report_id'          => 'Bài viết',
            'user_id'            => 'User',
            'user_email'         => 'User Email',
            'city_id'            => 'City',
            'district_id'        => 'District',
            'ward_id'            => 'Ward',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path'     => 'Thumbnail Path',
            'status'             => 'Trạng thái',
            'sort_number'        => 'Sắp xếp',
            'approve_by'         => 'Phê duyệt bởi',
            'created_by'         => 'Created By',
            'created_at'         => 'Created At',
            'updated_at'         => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReason()
    {
        return $this->hasOne(ReportReason::class, ['id' => 'reason_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsReportAttachments()
    {
        return $this->hasMany(ReportAttachment::class, ['report_id' => 'id']);
    }
}
