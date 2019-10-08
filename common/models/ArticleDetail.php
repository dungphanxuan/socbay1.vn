<?php

namespace common\models;

use common\models\job\Company;
use common\models\job\JobCategory;
use common\models\job\JobType;
use Yii;

/**
 * This is the model class for table "tbl_article_detail".
 *
 * @property int $id
 * @property int $article_id
 * @property string $title
 * @property string $body
 * @property string $phone
 * @property string $email
 * @property string $feature_text
 * @property int $property_type
 * @property int $property_status
 * @property int $property_label
 * @property int $size
 * @property int $bed
 * @property int $bath Phòng tắm
 * @property int $reception
 * @property int $area
 * @property int $available_from
 * @property int $parking
 * @property int $document
 * @property int $deposit
 * @property int $video_url
 * @property int $year_build
 * @property int $job_category
 * @property int $job_type
 * @property string $job_email
 * @property int $job_company_id
 * @property int $job_store_id
 * @property int $year
 * @property int $car_model
 * @property int $car_carry
 * @property int $condition
 * @property int $auto_type
 * @property int $auto_class
 * @property int $fa_size
 * @property int $fa_color
 * @property int $on_offer
 * @property int $price_offer
 * @property int $start_price
 * @property string $offers_text
 * @property string $path
 * @property string $base_url
 * @property string $filestack_path
 * @property string $storage_path
 * @property int $order
 * @property int $type
 * @property int $created_at
 * @property Article $article
 * @property Company $company
 * @property JobCategory $jobCategory
 * @property JobType $jobType
 */
class ArticleDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id'], 'required'],
            [['article_id', 'property_type', 'property_status', 'property_label', 'size', 'bed', 'bath', 'reception', 'area', 'available_from', 'parking', 'document', 'deposit', 'video_url', 'year_build', 'job_category', 'job_type', 'job_company_id', 'job_store_id', 'year', 'car_model', 'car_carry', 'condition', 'auto_type', 'auto_class', 'fa_size', 'fa_color', 'on_offer', 'price_offer', 'start_price', 'order', 'type', 'created_at'], 'integer'],
            [['body', 'feature_text', 'offers_text'], 'string'],
            [['title', 'path', 'base_url', 'filestack_path', 'storage_path', 'job_email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'title' => 'Title',
            'body' => 'Body',
            'phone' => 'Phone',
            'email' => 'Email',
            'feature_text' => 'Feature Text',
            'property_type' => 'Property Type',
            'property_status' => 'Property Status',
            'property_label' => 'Property Label',
            'size' => 'Size',
            'bed' => 'Bed',
            'bath' => 'Phòng tắm',
            'reception' => 'Reception',
            'area' => 'Area',
            'available_from' => 'Available From',
            'parking' => 'Parking',
            'document' => 'Document',
            'deposit' => 'Deposit',
            'video_url' => 'Video Url',
            'year_build' => 'Year Build',
            'job_category' => 'Job Category',
            'job_type' => 'Job Type',
            'job_company_id' => 'Job Company ID',
            'job_store_id' => 'Job Store ID',
            'job_email' => 'Job Email',
            'year' => 'Year',
            'car_model' => 'Car Model',
            'car_carry' => 'Car Carry',
            'condition' => 'Condition',
            'auto_type' => 'Auto Type',
            'auto_class' => 'Auto Class',
            'fa_size' => 'Fa Size',
            'fa_color' => 'Fa Color',
            'on_offer' => 'On Offer',
            'price_offer' => 'Price Offer',
            'start_price' => 'Start Price',
            'offers_text' => 'Offers Text',
            'path' => 'Path',
            'base_url' => 'Base Url',
            'filestack_path' => 'Filestack Path',
            'storage_path' => 'Storage Path',
            'order' => 'Order',
            'type' => 'Type',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'job_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobCategory()
    {
        return $this->hasOne(JobCategory::class, ['id' => 'job_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobType()
    {
        return $this->hasOne(JobType::class, ['id' => 'job_type']);
    }
}
