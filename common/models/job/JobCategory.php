<?php

namespace common\models\job;

use common\components\SluggableBehavior;
use common\helpers\TimeHelper;
use common\models\Article;
use common\models\ArticleDetail;
use common\models\job\query\JobCategoryQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "job_category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $parent_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property int $total_article
 * @property int $sort_number
 * @property int $type
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Article[] $jobs
 */
class JobCategory extends \yii\db\ActiveRecord
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
        return 'job_category';
    }

    /**
     * @return JobCategoryQuery
     */
    public static function find()
    {
        return new JobCategoryQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class'     => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true,
            ],
            [
                'class'            => UploadBehavior::class,
                'attribute'        => 'thumbnail',
                'pathAttribute'    => 'thumbnail_path',
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
            [['title'], 'required'],
            [['body'], 'string'],
            [['parent_id', 'total_article', 'sort_number', 'type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['slug'], 'string', 'max' => 128],
            [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 255],
            [['thumbnail'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                 => 'ID',
            'title'              => 'Tiêu đề',
            'slug'               => 'Slug',
            'body'               => 'Mô tả',
            'parent_id'          => 'Parent ID',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path'     => 'Thumbnail Path',
            'total_article'      => 'Bài viết',
            'sort_number'        => 'Sắp xếp',
            'type'               => 'Type',
            'status'             => 'Trạng thái',
            'created_at'         => 'Created At',
            'updated_at'         => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Article::class, ['category_id' => 'id']);
    }

    /**
     * @return int
     */
    public function getTotalJobs()
    {
        return $this->hasMany(ArticleDetail::class, ['job_category' => 'id'])->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasMany(JobCategory::class, ['id' => 'parent_id']);
    }

    /**
     * @return array
     */
    public static function getAllArray($id = null, $update = false)
    {
        $data = [];
        $rootCategory = JobCategory::find()
            ->noParents()
            ->all();
        /** @var JobCategory $modelRootCat */
        foreach ($rootCategory as $key => $modelRootCat) {
            $subCategories = JobCategory::find()
                ->andWhere(['parent_id' => $modelRootCat->id])
                ->all();
            $data[$modelRootCat->title] = ArrayHelper::map($subCategories, 'id', 'title');;
        }

        return $data;
    }

    public static function getAll($id = null, $update = false)
    {
        $cacheKey = [
            JobCategory::class,
            'ci' . $id
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = [];
            $modelCategory = JobCategory::find()->hasParents()->all();

            /** @var JobCategory $model */
            foreach ($modelCategory as $model) {

                $temp = [];
                $temp['id'] = $model->id;
                $temp['title'] = $model->title;
                $temp['total'] = 1200;

                $data[] = $temp;
            }
            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }

        return $data;
    }

    /**
     * @return array
     */
    public static function getListCat($id = null, $update = false)
    {
        $cacheKey = [
            JobCategory::class,
            'lc' . $id ? $id : 0
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = [];
            $modelData = JobCategory::find()
                ->hasParents()
                ->limit(12)->all();

            /** @var JobCategory $model */
            foreach ($modelData as $model) {

                $temp = [];
                $temp['id'] = $model->id;
                $temp['slug'] = $model->slug;
                $temp['title'] = $model->title;
                $temp['total'] = getFormat()->asDecimal($model->totalJobs);

                $data[] = $temp;
            }
            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }

        return $data;
    }

    /*
     * City list by part
     * */
    public static function getPartList($part = 0, $limit = 13)
    {
        //todo cache data
        $offset = $part * $limit;
        $allData = JobCategory::find()->hasParents()
            ->orderBy('id desc')
            ->limit($limit)->offset($offset)
            ->all();
        $dataItem = ArrayHelper::map($allData, 'slug', 'title');

        return $dataItem;
    }
}
