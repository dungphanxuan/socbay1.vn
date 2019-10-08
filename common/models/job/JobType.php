<?php

namespace common\models\job;

use common\models\Article;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "job_type".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $status
 * @property int $type
 * @property int $sort_number
 *
 * @property Article[] $jobs
 */
class JobType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status', 'type', 'sort_number'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['slug'], 'string', 'max' => 128],
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
            'status' => 'Status',
            'type' => 'Type',
            'sort_number' => 'Sort Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Article::class, ['category_id' => 'id']);
    }

    /*
     * Danh sach Type
     * */
    public static function getTypeList($update = false)
    {
        $cacheKey = [
            JobType::class,
            'tl'
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = [];

            $modelCity = JobType::find()
                ->addOrderBy('id desc')
                //->limit(5)
                ->all();
            $data = ArrayHelper::map($modelCity, 'slug', 'title');

            // store $data in cache so that it can be retrieved next time
            dataCache()->set($cacheKey, $data);
        }
        $data = array_merge(['all' => 'Tất cả'], $data);
        return $data;
    }
}
