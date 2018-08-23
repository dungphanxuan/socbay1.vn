<?php

namespace common\models\ads;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ads_report_reason".
 *
 * @property int         $id
 * @property string      $slug
 * @property string      $title
 * @property string      $body
 * @property int         $parent_id
 * @property string      $thumbnail_base_url
 * @property string      $thumbnail_path
 * @property int         $type
 * @property int         $status
 * @property int         $sort_number
 * @property int         $created_at
 * @property int         $updated_at
 *
 * @property AdsReport[] $adsReports
 */
class ReportReason extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_report_reason';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body'], 'string'],
            [['parent_id', 'type', 'status', 'sort_number', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'thumbnail_path'], 'string', 'max' => 255],
            [['thumbnail_base_url'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                 => 'ID',
            'slug'               => 'Slug',
            'title'              => 'Title',
            'body'               => 'Body',
            'parent_id'          => 'Parent ID',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path'     => 'Thumbnail Path',
            'type'               => 'Type',
            'status'             => 'Status',
            'sort_number'        => 'Sort Number',
            'created_at'         => 'Created At',
            'updated_at'         => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdsReports()
    {
        return $this->hasMany(AdsReport::class, ['reason_id' => 'id']);
    }

    /*
   * ReportReason list
   * */
    public static function getAllItem($part = 0, $limit = 16)
    {
        $allData = ReportReason::find()
            ->orderBy('sort_number desc')
            ->all();
        $dataItem = ArrayHelper::map($allData, 'id', 'title');

        return $dataItem;
    }
}
