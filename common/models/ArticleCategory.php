<?php

namespace common\models;

use common\models\query\ArticleCategoryQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $title
 * @property integer $sort_number
 * @property integer $total_article
 * @property integer $type
 * @property integer $status
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 *
 * @property Article[] $articles
 * @property ArticleCategory $parent
 */
class ArticleCategory extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;
    /**
     * @var array
     */
    public $thumbnail;

    public $articleCount;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_category}}';
    }

    /**
     * @return ArticleCategoryQuery
     */
    public static function find()
    {
        return new ArticleCategoryQuery(get_called_class());
    }

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
            [['title'], 'string', 'max' => 512],
            [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['slug'], 'string', 'max' => 1024],
            [['status', 'type', 'sort_number', 'total_article'], 'integer'],
            ['parent_id', 'exist', 'targetClass' => ArticleCategory::class, 'targetAttribute' => 'id'],
            [['thumbnail'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => Yii::t('common', 'ID'),
            'slug'          => Yii::t('common', 'Slug'),
            'title'         => Yii::t('common', 'Title'),
            'parent_id'     => Yii::t('common', 'Parent Category'),
            'thumbnail'     => Yii::t('common', 'Thumbnail'),
            'total_article' => Yii::t('common', 'Total Article'),
            'type'          => Yii::t('common', 'Ads Type'),
            'status'        => Yii::t('common', 'Active')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['category_id' => 'id']);
    }

    /**
     * @return int
     */
    public function getTotalArticles()
    {
        return $this->hasMany(Article::class, ['category_id' => 'id'])
            ->andOnCondition([Article::tableName() . '.status' => Article::STATUS_PUBLISHED])
            ->count();
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasMany(ArticleCategory::class, ['id' => 'parent_id']);
    }

    /*
     * Get SubCategory
     * */
    public static function getSubCategory($category_id)
    {
        $dataModel = ArticleCategory::find()
            ->where(['parent_id' => $category_id])
            ->asArray()
            ->all();
        $data = ArrayHelper::map($dataModel, 'id', 'title');

        return $data;
    }

    /*
     * Get SubCategory
     * */
    public static function getDataCategory($category_id = null, $update = false)
    {
        $query = ArticleCategory::find();
        $query->where(['parent_id' => $category_id]);

        $query->orderBy('sort_number asc')->asArray();

        $dataModel = $query->all();
        $data = ArrayHelper::map($dataModel, 'slug', 'title');

        return $data;
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
                    'fit'  => 'crop'
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
                    'w'    => '480',
                    'h'    => '240',
                    'fit'  => 'crop'
                ];

                $url = Yii::$app->glide->createSignedUrl($signConfig);
        }


        return $url;
    }

    /*
     * getDetail
     * */
    public static function getDetail($id, $update = false, $type = null)
    {
        $cacheKey = [
            ArticleCategory::class,
            $id ? $id : 99
        ];
        $dataCat = dataCache()->get($cacheKey);

        if ($dataCat === false || $update) {
            $dataCat = [];
            $query = ArticleCategory::find()
                ->where(['status' => 1]);
            if ($id) {
                $query->andWhere(['id' => $id]);
            }
            if ($type) {
                $query->andWhere(['type' => $type]);
            }

            $model = $query->one();
            /** @var ArticleCategory $model */
            if ($model) {
                $item = [];
                $item['id'] = $model->id;
                $item['title'] = $model->title;
                $item['slug'] = $model->slug;
                $item['parent_id'] = $model->parent_id;
                $item['count'] = $model->total_article;
                $item['sort_number'] = 100;

                $dataCat = $item;
                dataCache()->set($cacheKey, $dataCat);
            }
            // store $data in cache so that it can be retrieved next time
        }

        return $dataCat;
    }

    /*
     * Get List Category
     * */
    public static function getList($parent_id = null, $update = false, $limit = null)
    {
        $key = CACHE_ARTICLE_CATEGORY . $parent_id ? $parent_id : '';
        if ($limit) {
            $key = $key . $limit;
        }

        $dataCat = dataCache()->get($key);

        if ($dataCat === false || $update) {
            $dataCat = [];
            $query = ArticleCategory::find()
                ->andWhere(['status' => 1])
                ->orderBy('sort_number asc');

            $query->andWhere(['parent_id' => $parent_id]);
            if ($limit) {
                $query->limit($limit);
            }

            $allModel = $query->all();
            /** @var ArticleCategory $model */
            foreach ($allModel as $model) {
                $item = [];
                $item['id'] = $model->id;
                $item['title'] = $model->title;
                $item['slug'] = $model->slug;
                $item['parent_id'] = $model->parent_id;
                //$item['count'] = $model->total_article;
                $item['count'] = $model->totalArticles;
                $item['thumbnail'] = $model->thumbnail_base_url . '/' . $model->thumbnail_path;
                $item['thumbnail_show'] = $model->getImgThumbnail(2, 90, 150, 90);
                $item['sort_number'] = 100;

                $dataCat[] = $item;
            }
            // store $data in cache so that it can be retrieved next time
            dataCache()->set($key, $dataCat);
        }

        return $dataCat;
    }

    public static function updateTotal()
    {
        $modelCat = ArticleCategory::find()->all();
        /** @var ArticleCategory $item */
        foreach ($modelCat as $key => $item) {
            $totalArticle = $item->getTotalArticles();
            $item->total_article = $totalArticle;
            $item->save(false);
        }

        return true;
    }

}
