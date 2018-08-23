<?php

namespace common\models;

use common\behaviors\CacheInvalidateBehavior;
use common\components\object\ClassType;
use common\components\object\ObjectIdentityInterface;
use common\helpers\ArticleHelper;
use common\helpers\FilestackHelper;
use common\models\query\ArticleQuery;
use common\models\system\Comment;
use dosamigos\taggable\Taggable;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\base\Event;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $excerpt
 * @property string $contentHtml
 * @property int $total_votes
 * @property int $up_votes
 * @property float $rating
 * @property bool $featured
 * @property int $comment_count
 * @property integer $view_count
 * @property string $view
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property array $attachments
 * @property integer $category_id
 * @property integer $sub_category_id
 * @property integer $add_type
 *
 * @property integer $price
 * @property integer $price_type
 * @property integer $price_from
 * @property integer $price_to
 * @property string $price_text
 * @property integer $price_id
 * @property integer $is_negotiable
 *
 * @property integer $condition_type
 * @property integer $package_id
 *
 * @property integer $type
 * @property integer $public_from
 * @property integer $public_to
 * @property integer $public_flg
 *
 * @property string $address_text
 * @property integer $city_id
 * @property integer $district_id
 * @property integer $ward_id
 * @property integer $lat
 * @property integer $lng
 *
 * @property integer $sort_number
 * @property integer $status
 * @property integer $published_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property City $city
 * @property District $district
 * @property Ward $ward
 * @property User $author
 * @property User $updater
 * @property ArticleDetail $detail
 * @property ArticleCategory $category
 * @property ArticleAttachment[] $articleAttachments
 */
class Article extends ActiveRecord implements Linkable, ObjectIdentityInterface
{
    //const STATUS_PUBLISHED = 1;
    //const STATUS_DRAFT = 0;
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_PENDING_APPROVAL = 2;
    const STATUS_DELETED = 3;
    const STATUS_COMPLETED = 4;
    const STATUS_SOLD = 5; //Đã bán
    //TODO Mover status to dictionary

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_LOAD = 'load';

    /**
     * @var array
     */
    public $attachments;

    /**
     * @var array
     */
    public $images;

    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @var string editor note on upate
     */
    public $memo;
    /**
     * @var ArticleRevision the revision saved after update
     */
    public $savedRevision;

    public $company_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
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
                'class'     => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true
            ],
            [
                'class'            => UploadBehavior::class,
                'attribute'        => 'attachments',
                'multiple'         => true,
                'uploadRelation'   => 'articleAttachments',
                'pathAttribute'    => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute'   => 'order',
                'typeAttribute'    => 'type',
                'sizeAttribute'    => 'size',
                'nameAttribute'    => 'name',
            ],
            [
                'class'            => UploadBehavior::class,
                'attribute'        => 'images',
                'multiple'         => true,
                'uploadRelation'   => 'articleImages',
                'pathAttribute'    => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute'   => 'order',
                'typeAttribute'    => 'type',
                'sizeAttribute'    => 'size',
                'nameAttribute'    => 'name',
            ],
            [
                'class'            => UploadBehavior::class,
                'attribute'        => 'thumbnail',
                'pathAttribute'    => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ],
            [
                'class' => Taggable::class,
            ],
            'cacheInvalidate' => [
                'class'          => CacheInvalidateBehavior::class,
                'cacheComponent' => 'dcache',
                'keys'           => [
                    function ($model) {
                        return [
                            self::class,
                            CACHE_ARTICLE_DETAIL . $model->id
                        ];
                    }
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['title'], 'string', 'min' => '16', 'max' => 100],
            [['category_id'], 'required'],
            //[['body'], 'string', 'encoding' => 'UTF-8'],
            [['title'], 'required', 'message' => 'Vui lòng nhập tiêu đề'],
            [['body'], 'required', 'message' => 'Vui lòng nhập mô tả nội dung'],
            [['category_id'], 'required', 'message' => 'Vui lòng chọn danh mục'],
            //[['thumbnail'], 'required', 'message' => 'Vui lòng upload ảnh thumbnail'],
            //[['slug'], 'unique'],
            [['body', 'excerpt'], 'string'],
            //[['body'], 'string', 'min' => 128],
            [['published_at'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['published_at', 'public_from', 'public_to'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],

            //['public_from', 'date', 'timestampAttribute' => 'public_from'],
            //['public_to', 'date', 'timestampAttribute' => 'public_to'],
            //['public_from', 'compare', 'compareAttribute' => 'public_to', 'operator' => '<', 'enableClientValidation' => false],

            ['price', 'compare', 'compareValue' => 50000000000, 'operator' => '<', 'message' => 'Giá sản phẩm không hợp lệ'],
            ['price', 'compare', 'compareValue' => 1000, 'operator' => '>', 'message' => 'Giá sản phẩm không hợp lệ'],

            [['category_id'], 'exist', 'targetClass' => ArticleCategory::class, 'targetAttribute' => 'id'],
            [['sub_category_id', 'status', 'type', 'condition_type', 'city_id', 'district_id', 'ward_id', 'view_count', 'comment_count', 'is_negotiable', 'sort_number', 'price', 'price_from', 'price_to', 'price_id', 'package_id'], 'integer'],
            [['slug', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            //[['title'], 'string', 'min' => 8, 'max' => 512],
            [['lat', 'lng'], 'number'],
            [['view', 'price_text', 'address_text'], 'string', 'max' => 255],
            [['address_text'], 'string', 'max' => 128, 'min' => 10],
            [['attachments', 'thumbnail'], 'safe'],
            [['tagNames'], 'safe'],
            //['memo', 'required', 'on' => 'update'],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        // TODO do not store a revision if nothing has changed!
        // TODO make that a validation rule?
        /*$detail = ArticleDetail::find()->where(['article_id' => $this->id])->one();
        if (!$detail) {
            $detail = new ArticleDetail();
            $detail->article_id = $this->id;
            $detail->save(false);
        }*/

        return parent::afterSave($insert, $changedAttributes);
    }

    public function loadRevision(ArticleRevision $revision)
    {
        $oldScenario = $this->scenario;
        $this->scenario = self::SCENARIO_LOAD;
        $this->setAttributes($revision->attributes);
        $this->scenario = $oldScenario;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('common', 'ID'),
            'slug'            => Yii::t('common', 'Slug'),
            'title'           => Yii::t('common', 'Title'),
            'body'            => Yii::t('common', 'Body'),
            'excerpt'         => Yii::t('common', 'Excerpt'),
            'view'            => Yii::t('common', 'Article View'),
            'thumbnail'       => Yii::t('common', 'Thumbnail'),
            'attachments'     => Yii::t('common', 'Attachments'),
            'category_id'     => Yii::t('common', 'Category'),
            'sub_category_id' => Yii::t('common', 'Sub Category'),
            'type'            => Yii::t('common', 'Article Type'),
            'condition_type'  => Yii::t('common', 'Condition'),
            'is_negotiable'   => Yii::t('common', 'Negotiable'),
            'sort_number'     => Yii::t('common', 'Sort Number'),
            'price'           => Yii::t('common', 'Price'),
            'package_id'      => Yii::t('common', 'Package'),
            'address_text'    => Yii::t('common', 'Address'),
            'city_id'         => Yii::t('common', 'City'),
            'district_id'     => Yii::t('common', 'District'),
            'ward_id'         => Yii::t('common', 'Ward'),

            'status'       => Yii::t('common', 'Published'),
            'published_at' => Yii::t('common', 'Published At'),
            'public_from'  => Yii::t('common', 'Public From'),
            'public_to'    => Yii::t('common', 'Public To'),
            'created_by'   => Yii::t('common', 'Author'),
            'updated_by'   => Yii::t('common', 'Updater'),
            'created_at'   => Yii::t('common', 'Created At'),
            'updated_at'   => Yii::t('common', 'Updated At')
        ];
    }

    public function getDetail()
    {
        return $this->hasOne(ArticleDetail::class, ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::class, ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleAttachments()
    {
        return $this->hasMany(ArticleAttachment::class, ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleImages()
    {
        return $this->hasMany(ArticleImage::class, ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::class, ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWard()
    {
        return $this->hasOne(Ward::class, ['id' => 'ward_id']);
    }

    /**
     * Returns user statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_PUBLISHED => Yii::t('common', 'Published'),
            self::STATUS_DRAFT     => Yii::t('common', 'Deleted')
        ];
    }

    /**
     * @return string
     */
    public function getSafeTitle()
    {
        return ucwords(mb_strtolower($this->title));
    }

    public function getFullAddress()
    {
        $address = '';
        if ($this->ward_id) {
            $address = $this->ward->name;
        }

        if ($this->district_id) {
            if ($this->ward_id) {
                $address = $address . ' - ' . $this->district->name;
            } else {
                $address = $this->district->name;
            }

        }
        if ($this->city_id) {
            if ($this->district_id) {
                $address = $address . ' - ' . $this->city->name;
            } else {
                $address = $this->city->name;
            }

        }

        return $address;
    }

    /**
     * @return integer
     */
    public function getLatValue()
    {
        if ($this->lat) {
            return $this->lat;
        }
        if ($this->ward_id) {
            return $this->ward->lat;
        } elseif ($this->district_id) {
            return $this->district->lat;
        }

        return $this->city ? $this->city->lat : '';
    }

    /**
     * @return integer
     */
    public function getLngValue()
    {
        if ($this->lng) {
            return $this->lng;
        }
        if ($this->ward_id) {
            return $this->ward->lng;
        } elseif ($this->district_id) {
            return $this->district->lng;
        }

        return $this->city ? $this->city->lng : '';
    }

    public function copyModel($id, $copy_assets = false)
    {
        $cModel = Article::find()->published()->where(['id' => $id])->one();
        if ($cModel) {
            $data = $cModel->attributes;
            $this->setAttributes($data);
            //Copy thumbnail, note copy image from Filestack, Google Cloud Storage
            if ($copy_assets) {
                if ($cModel->thumbnail) {
                    if (fileStorage()->getFilesystem()->has($cModel->thumbnail['path'])) {
                        $this->thumbnail = $cModel->thumbnail;
                        $copyImage = "1/cp_" . Yii::$app->security->generateRandomString(20) . date('YmdHim') . ".jpg";
                        $this->thumbnail['path'] = $copyImage;
                        $this->thumbnail_path = $copyImage;
                        fileSystem()->copy($cModel->thumbnail['path'], $copyImage);
                    }
                }
                //Copy attachments
                $this->attachments = $cModel->attachments;
                foreach ($cModel->articleAttachments as $key => $img) {
                    if (fileStorage()->getFilesystem()->has($cModel->attachments[$key]['path'])) {
                        $new_filename = "1/cp_" . $key . "_" . date('YmdHim') . time() . ".jpg";
                        fileSystem()->copy($cModel->attachments[$key]['path'], $new_filename);
                        $this->attachments[$key]['path'] = $new_filename;
                    }
                }
            }

            $this->slug = '';
        }
    }

    /*
     * Image Thumbnail
     * Note: Source: Server, Google Cloud Storage, Filestack
     * */
    public function getImgThumbnail($type = 1, $q = 75, $w = null, $h = null)
    {
        $url = '';
        $hasPath = fileSystem()->has($this->thumbnail_path);
        $path = 'image/logo_square.png';

        $componentType = ArticleHelper::getImgSourceType($this->thumbnail_base_url);

        if ($this->thumbnail_path && $hasPath) {
            $path = $this->thumbnail_path;
        }
        $fullUrl = $this->thumbnail_base_url . '/' . $this->thumbnail_path;

        switch ($type) {
            case 1:
                $url = $this->thumbnail_base_url . '/' . $path;
                break;
            case 2:
                switch ($componentType) {
                    case 1:
                        $url = FilestackHelper::resizeUrl($fullUrl, $w, $h);
                        break;
                    case 2:
                        $url = FilestackHelper::resizeHander($this->thumbnail_path, $w, $h);
                        break;
                    default:
                        $signConfig = [
                            'glide/index',
                            'path' => $path,
                            'fit'  => 'crop',
                        ];
                        if ($w) {
                            $signConfig['w'] = $w;
                        }
                        if ($h) {
                            $signConfig['h'] = $h;
                        }
                        $url = Yii::$app->glide->createSignedUrl($signConfig);
                }

                break;
            default:
                switch ($componentType) {
                    case 0:
                        $signConfig = [
                            'glide/index',
                            'path' => $path,
                            'w'    => '480',
                            'h'    => '240',
                            'fit'  => 'crop'
                        ];

                        $url = Yii::$app->glide->createSignedUrl($signConfig);
                        break;
                    default:
                        $url = FilestackHelper::resizeUrl($fullUrl, 480, 240);
                }
        }

        return $url;
    }

    public function getImageList($type = 1)
    {
        $data = [];
        $listImage = $this->attachments;
        if ($listImage && !empty($listImage)) {
            foreach ($listImage as $itemAtt) {
                $data[] = [
                    'src' => $itemAtt['base_url'] . '/' . $itemAtt['path'],
                    'w'   => 964,
                    'h'   => 1024
                ];
            }
        } else {
            if ($this->thumbnail_path) {
                $data[] = [
                    'src' => $this->thumbnail_base_url . '/' . $this->thumbnail_path,
                    'w'   => 964,
                    'h'   => 1024
                ];
            }
        }

        return $data;
    }

    public function getCardThumbnail($type = 1, $q = 75, $w = null, $h = null)
    {
        $urlThumb = baseUrl() . '/frontend/web/images/socbay1-01.png';
        $hasPath = fileSystem()->has($this->thumbnail_path);
        if ($this->thumbnail_path && $hasPath) {
            $urlThumb = $this->thumbnail_base_url . '/' . $this->thumbnail_path;
        }

        return $urlThumb;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::class, ['article_id' => 'id'])->inverseOf('article');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(ArticleTag::class, ['id' => 'article_tag_id'])
            ->viaTable(Yii::$app->db->tablePrefix . 'article2article_tags', ['article_id' => 'id']);
    }

    public function getContentHtml()
    {
        return Yii::$app->formatter->asGuideMarkdown($this->content);
    }

    public function getTeaser()
    {
        $paragraphs = preg_split("/\n\s+\n/", $this->content, -1, PREG_SPLIT_NO_EMPTY);
        while (count($paragraphs) > 0) {
            $teaser = array_shift($paragraphs);
            $teaser = StringHelper::truncate($teaser, 400);
            $html = Markdown::process($teaser, 'gfm');
            // do not use as teaser if the element in this block is a HTML block element
            if (!preg_match('~^<(blockquote|h\d|pre)~', $html)) {
                return HtmlPurifier::process($html);
            }
        }

        return '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::class, ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisions()
    {
        return $this->hasMany(ArticleRevision::class, ['article_id' => 'id'])->orderBy(['revision' => SORT_DESC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLatestRevisions()
    {
        // this relation skips selecting content from the table for performance reasons
        return $this->getRevisions()->select(['article_id', 'revision', 'updater_id', 'updated_at', 'memo'])->limit(10);
    }

    /**
     * Event handler for comment creation. Update comment_count on wiki table.
     * @param Event $event
     */
    public static function onComment($event)
    {
        /** @var Comment $comment */
        $comment = $event->sender;
        if ($comment->object_type === ClassType::ARTICLES) {
            $count = Comment::find()->forObject(ClassType::WIKI, $comment->object_id)->active()->count();
            static::updateAll(['comment_count' => $count], ['id' => $comment->object_id]);
        }
    }

    /**
     * @return array url to this object. Should be something to be passed to [[\yii\helpers\Url::to()]].
     */
    public function getUrl($action = 'view', $params = [])
    {
        return array_merge($params, ["article/$action", 'id' => $this->id, 'name' => $this->slug]);
    }

    /**
     * @return string title to display for a link to this object.
     */
    public function getLinkTitle()
    {
        return $this->title;
    }

    /**
     * @inheritdoc
     */
    public function getObjectId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getObjectType()
    {
        return ClassType::ARTICLES;
    }

    /**
     * @return Article[]
     */
    public function getRelatedArticles()
    {
        $tags = $this->tags;
        if (empty($tags)) {
            return [];
        }
        $likes = [];
        foreach ($tags as $i => $tag) {
            if ($i > 5) {
                break;
            }
            $likes[] = $tag->name;
        }
        $ids = Article::find()
            ->published()
            ->select('news.id')->distinct()
            ->joinWith('tags AS tags')
            ->where(['or like', 'tags.name', $likes])
            ->andWhere(['!=', 'news.id', $this->id])
            ->limit(5)
            ->column();

        return Article::findAll($ids);
    }

    public function getStatusClass()
    {
        switch ($this->status) {
            case Article::STATUS_DELETED:
                return 'status-deleted';
            case Article::STATUS_DRAFT:
                return 'status-draft';
            case Article::STATUS_PUBLISHED:
                return 'status-published';
        }
        return 'status-unknown';
    }

    /**
     * @return bool
     */
    public function publish()
    {
        $this->status = self::STATUS_PUBLISHED;
        return $this->save();
    }

    /**
     * @return bool
     */
    public function draft()
    {
        $this->status = self::STATUS_DRAFT;
        return $this->save();
    }

    /**
     * @return bool
     */
    public function remove()
    {
        $this->status = self::STATUS_DELETED;
        return $this->save();
    }

    /**
     * @return bool
     */
    public function canPublish()
    {
        if ($this->status == self::STATUS_DRAFT) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function canDraft()
    {
        if ($this->status == self::STATUS_PUBLISHED) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function canRemove()
    {
        if ($this->status == self::STATUS_DRAFT) {
            return true;
        }

        return false;
    }


}
