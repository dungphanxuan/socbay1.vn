<?php

namespace common\models\property;

use common\helpers\StringHelper;
use common\helpers\TimeHelper;
use common\models\User;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "m_project".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $type
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $short_des
 * @property integer $city_id
 * @property integer $district_id
 * @property integer $ward_id
 * @property integer $level
 * @property integer $price_id
 * @property string $price
 * @property string $price_to
 * @property integer $num_of_rooms
 * @property integer $area_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property double $lat
 * @property double $lng
 * @property integer $sort_number
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property string getImgThumbnail
 * @property District $district
 * @property Ward $ward
 * @property ProjectArea $projectArea
 * @property ProjectPrice $projectPrice
 * @property ProjectRank $projectRank
 * @property ProjectAttachment[] $mProjectAttachments
 */
class Project extends \yii\db\ActiveRecord
{

    /**
     * @var array
     */
    public $attachments;

    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pm_project';
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
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'projectAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
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
            [
                [
                    'category_id',
                    'type',
                    'city_id',
                    'district_id',
                    'ward_id',
                    'level',
                    'price_id',
                    'price',
                    'price_to',
                    'num_of_rooms',
                    'area_id',
                    'sort_number',
                    'status',
                    'created_by',
                    'updated_by',
                    'created_at',
                    'updated_at'
                ],
                'integer'
            ],
            [['title'], 'required', 'message' => 'Vui lòng nhập tiêu đề'],
            [['body'], 'required', 'message' => 'Vui lòng nhập nội dung'],
            //[['type'], 'required', 'message' => 'Vui lòng chọn loại dự án'],
            //[['thumbnail'], 'required', 'message' => 'Vui lòng upload ảnh thumbnail'],
            [['body', 'short_des'], 'string'],
            //[['slug'], 'unique'],
            [['lat', 'lng'], 'number'],
            [['slug', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 255],
            [
                ['area_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => ProjectArea::class,
                'targetAttribute' => ['area_id' => 'id']
            ],
            [
                ['price_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => ProjectPrice::class,
                'targetAttribute' => ['price_id' => 'id']
            ],
            [['attachments', 'thumbnail'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Danh mục',
            'type' => 'Loại dự án',
            'slug' => 'Slug',
            'title' => 'Tiêu đề',
            'body' => 'Nội dung',
            'short_des' => 'Mô tả',
            'city_id' => 'Tỉnh/Thành Phố',
            'district_id' => 'Quận/Huyện',
            'ward_id' => 'Phường/Xã',
            'level' => 'Hạng',
            'price_id' => 'Giá',
            'price' => 'Price',
            'price_to' => 'Price To',
            'num_of_rooms' => 'Num Of Rooms',
            'area_id' => 'Diện tích',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',

            'thumbnail' => 'Ảnh Thumbnail',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'sort_number' => 'Sort Number',
            'status' => 'Trạng thái',
            'created_by' => 'Created By',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * @return string
     */
    public function getCityName()
    {
        return $this->hasOne(City::class, ['id' => 'city_id'])->one()->title;
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
     * @return \yii\db\ActiveQuery
     */
    public function getProjectArea()
    {
        return $this->hasOne(ProjectArea::class, ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPrice()
    {
        return $this->hasOne(ProjectPrice::class, ['id' => 'price_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectRank()
    {
        return $this->hasOne(ProjectRank::class, ['id' => 'level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectAttachments()
    {
        return $this->hasMany(ProjectAttachment::class, ['project_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        $cityName = $this->city ? $this->city->name : '';
        return $cityName;
    }

    /**
     * @return array url to this object. Should be something to be passed to [[\yii\helpers\Url::to()]].
     */
    public function getUrl($action = 'view', $params = [])
    {
        return ['project/view', 'id' => $this->id, 'slug' => $this->slug];
    }

    /**
     * @return string title to display for a link to this object.
     */
    public function getLinkTitle()
    {
        return $this->title;
    }

    /**
     * @return string the type of this object, e.g. News, Extension, Wiki
     */
    public function getItemType()
    {
        return 'Projects';
    }

    /*
     * Get Show Title
     * */
    public function getShowTitle($el = 85)
    {
        /*  $projectTitle = mb_strcut($this->title, 0, $el, 'UTF-8');
          if (strlen($this->title) > $el) {
              $projectTitle .= '...';
          }*/

        $projectTitle = StringHelper::truncate($this->title, $el);

        return $projectTitle;

    }

    /*
     * Glide Thumbnail Image
     * */
    public function getShowArea()
    {
        if ($this->projectArea) {
            return $this->projectArea->title;
        }

        return 'm2';
    }

    /*
     * Glide Thumbnail Image
     * */
    public function getShowPrice()
    {
        if ($this->projectPrice) {
            return $this->projectPrice->title;
        }

        return 'tr';

    }


    /*
     * Anh Thumbnail
     * */
    public function getImgThumbnail($type = 1)
    {
        $url = '';
        $hasPath = fileSystem()->has($this->thumbnail_path);
        $path = 'image/logo_square.png';
        if ($this->thumbnail_path && $hasPath) {
            $path = $this->thumbnail_path;
        }
        switch ($type) {
            case 1:
                $url = $this->thumbnail_base_url . '/' . $this->thumbnail_path;
                break;
            case 2:
                $url = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $path,
                    'w' => 480,
                    'q' => 75,
                    'fit' => 'crop'
                ]);
                break;
            case 3:
                $url = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $path,
                    'w' => 767,
                    'q' => 75,
                    'fit' => 'crop'
                ]);
                break;
            case 4:
                $url = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $path,
                    'q' => 75
                ]);
                break;
            case 5:
                $url = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $path,
                    'w' => 230,
                    'h' => 283,
                    'q' => 75,
                    'fit' => 'crop'
                ]);
                break;
            case 6:
                $url = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $path,
                    'w' => 360,
                    'h' => 243,
                    'q' => 75,
                    'fit' => 'crop'
                ]);
                break;
            case 7:
                $url = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $path,
                    'w' => 350,
                    'h' => 236,
                    'q' => 75,
                    'fit' => 'crop'
                ]);
                break;
        }

        return $url;
    }

    /*
    * Get Project Detail
    * */
    public static function getShortDetail($id, $update = false)
    {
        $cacheKey = [
            Project::class,
            $id
        ];
        $data = dataCache()->get($cacheKey);

        //$update = env('IS_CACHE') ? true : false;

        if ($data === false or $update) {
            $data = [];
            /** @var Project $model */
            $model = Project::find()->where(['id' => $id])->one();
            if ($model) {
                $data['id'] = $model->id;
                $data['title'] = $model->title;
                $data['slug'] = $model->slug;
                //$data['poster_image'] = $model->poster_base_url . '/' . $model->poster_path;
                /*$data['poster_image'] = storageUrl()->createAbsoluteUrl( [
                    'glide/index',
                    'path' => $model->poster_path,
                    'q'    => 75
                ] );*/
                $imgPath = $model->thumbnail_path;

                $data['poster_image'] = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $imgPath,
                    'q' => 75
                ]);

                $data['poster_image_mobile'] = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $imgPath,
                    'w' => 480,
                    'q' => 75,
                    'fit' => 'crop'
                ]);

                $data['poster_image_tablet'] = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $imgPath,
                    'w' => 767,
                    'q' => 75,
                    'fit' => 'crop'
                ]);

                if (env('IS_HTTPS')) {
                    $data['poster_image'] = preg_replace("/^http:/i", "https:", $data['poster_image']);
                }

                //dd($data);
            }

            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }

        return $data;
    }


    /*
     * Danh sach City => Loc City co du lieu
     * */
    public static function getCityList($update = false)
    {
        $cacheKey = [
            Project::class,
            'city-list'
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = [];

            $modelCity = City::find()
                ->leftJoin('pm_project', '`pm_project`.`city_id` = `go_city`.`id` ')
                //->select(['go_city.*', 'COUNT(pm_project.id) AS countvote'])
                //->orderBy(['countvote' => SORT_DESC])
                ->groupBy('pm_project.id')
                //->addGroupBy('m_media.id')
                ->addOrderBy('go_city.priority desc')
                //->limit(5)
                ->all();
            /** @var City $item */
            /* foreach ($modelCity as $item) {
                 $dataCity = [
                     'id'   => $item->id,
                     'slug' => $item->slug,
                     'name' => $item->name
                 ];
                 $data[$item->id] = $item->name;
             }*/
            $data = ArrayHelper::map($modelCity, 'slug', 'name');

            // store $data in cache so that it can be retrieved next time
            dataCache()->set($cacheKey, $data);
        }
        $data = array_merge(['all' => 'Tất cả'], $data);
        $data = array_merge($data, ['khac' => 'Khác']);
        return $data;
    }

    /*
     * Project Count In City
     * */
    public static function getAllCityCount($update = false)
    {
        $cacheKey = [
            Project::class,
            'cc'
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = [];
            $data[0] = (getFormat()->asInteger(Project::find()->count()));

            $cityData = City::find()->all();
            foreach ($cityData as $itemCity) {
                $cCount = Project::find()->where(['city_id' => $itemCity->id])->count();
                if ($cCount) {
                    $data[$itemCity->id] = (getFormat()->asInteger($cCount));
                }

            }

            // store $data in cache so that it can be retrieved next time
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }

        return $data;
    }

    public static function getProjectDetail()
    {

    }
}
