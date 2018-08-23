<?php

namespace common\models\property;

use common\components\SluggableBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pm_project_category".
 *
 * @property int    $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property int    $parent_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property int    $total
 * @property int    $sort_number
 * @property int    $type
 * @property int    $status
 * @property int    $created_at
 * @property int    $updated_at
 */
class ProjectCategory extends \yii\db\ActiveRecord
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
        return 'pm_project_category';
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
                'immutable' => true
            ],
            [
                'class'            => UploadBehavior::class,
                'attribute'        => 'thumbnail',
                'pathAttribute'    => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
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
            [['parent_id', 'total', 'sort_number', 'type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 128],
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
            'slug'               => 'Slug',
            'title'              => 'Title',
            'body'               => 'Body',
            'parent_id'          => 'Parent ID',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path'     => 'Thumbnail Path',
            'thumbnail'          => 'Thumbnail Image',
            'total'              => 'Total',
            'sort_number'        => 'Sort Number',
            'type'               => 'Type',
            'status'             => 'Status',
            'created_at'         => 'Created At',
            'updated_at'         => 'Updated At',
        ];
    }

    /*
     * Danh sach City => Loc City co du lieu
     * */
    public static function getCatList($update = false)
    {
        $cacheKey = [
            ProjectCategory::class,
            'cat-list'
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = [];

            $modelCat = ProjectCategory::find()
                ->all();
            foreach ($modelCat as $item) {
                $data[$item->id] = $item->title;
            }
            dataCache()->set($cacheKey, $data);
        }

        return $data;
    }

    /*
     * Danh sach City => Loc City co du lieu
     * */
    public static function getCatSlug($update = false)
    {
        $cacheKey = [
            ProjectCategory::class,
            'cat-slug'
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $modelCat = ProjectCategory::find()
                ->all();

            $data = ArrayHelper::map($modelCat, 'slug', 'title');

            dataCache()->set($cacheKey, $data);
        }

        return $data;
    }

}
