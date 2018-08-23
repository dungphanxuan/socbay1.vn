<?php

namespace common\models\data;

use dungphanxuan\vnlocation\models\City;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bus_package".
 *
 * @property int    $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $excerpt
 * @property string $view
 * @property string $url
 * @property int    $price
 * @property int    $day
 * @property int    $promo_day
 * @property int    $auto_renewal
 * @property int    $start_date
 * @property int    $end_date
 * @property int    $sort_number
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property int    $show_feature
 * @property int    $show_top
 * @property int    $promo_sign
 * @property int    $recommended_sign
 * @property int    $status
 * @property int    $created_at
 * @property int    $updated_at
 */
class ArticlePackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bus_package';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body', 'excerpt'], 'string'],
            [['price', 'day', 'promo_day', 'auto_renewal', 'start_date', 'end_date', 'sort_number', 'show_feature', 'show_top', 'promo_sign', 'recommended_sign', 'status', 'created_at', 'updated_at'], 'integer'],
            ['price', 'default', 'value' => 0],
            ['day', 'default', 'value' => 0],
            [['slug', 'thumbnail_base_url'], 'string', 'max' => 128],
            [['title'], 'string', 'max' => 64],
            [['view', 'url', 'thumbnail_path'], 'string', 'max' => 255],
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
            'excerpt'            => 'Excerpt',
            'view'               => 'View',
            'url'                => 'Url',
            'price'              => 'Price',
            'day'                => 'Day',
            'promo_day'          => 'Promo Day',
            'auto_renewal'       => 'Auto Renewal',
            'start_date'         => 'Start Date',
            'end_date'           => 'End Date',
            'sort_number'        => 'Sort Number',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path'     => 'Thumbnail Path',
            'show_feature'       => 'Show Feature',
            'show_top'           => 'Show Top',
            'promo_sign'         => 'Promo Sign',
            'recommended_sign'   => 'Recommended Sign',
            'status'             => 'Status',
            'created_at'         => 'Created At',
            'updated_at'         => 'Updated At',
        ];
    }

    public static function getList()
    {
        $allData = ArticlePackage::find()
            ->orderBy('sort_number desc')
            ->all();
        $dataItem = ArrayHelper::map($allData, 'id', 'title');

        return $dataItem;
    }

}
