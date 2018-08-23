<?php

namespace common\models;

use common\behaviors\CacheInvalidateBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "widget_carousel".
 *
 * @property integer              $id
 * @property string               $key
 * @property integer              $status
 *
 * @property WidgetCarouselItem[] $items
 */
class WidgetCarousel extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%widget_carousel}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'cacheInvalidate' => [
                'class'          => CacheInvalidateBehavior::class,
                'cacheComponent' => 'frontendCache',
                'keys'           => [
                    function ($model) {
                        return [
                            self::class,
                            $model->key
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
            [['key'], 'required'],
            [['key'], 'unique'],
            [['status'], 'integer'],
            [['key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'     => Yii::t('common', 'ID'),
            'key'    => Yii::t('common', 'Key'),
            'status' => Yii::t('common', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(WidgetCarouselItem::class, ['carousel_id' => 'id']);
    }

    /*
   * Get total video of category
   * */
    public function getTotalItem()
    {
        return $this->hasMany(WidgetCarouselItem::class, ['carousel_id' => 'id'])->count();
    }

    /*
    * Get All Item by Key
    * */
    public static function getItemByKey($key, $update = false)
    {
        $cacheKey = [
            WidgetCarousel::class,
            $key
        ];
        $items = Yii::$app->cache->get($cacheKey);
        if ($items === false || $update) {
            $items = [];
            $query = WidgetCarouselItem::find()
                ->joinWith('carousel')
                ->where([
                    '{{%widget_carousel_item}}.status' => 1,
                    '{{%widget_carousel}}.status'      => WidgetCarousel::STATUS_ACTIVE,
                    '{{%widget_carousel}}.key'         => $key,
                ])
                ->orderBy(['order' => SORT_ASC]);
            foreach ($query->all() as $k => $item) {
                /** @var $item \common\models\WidgetCarouselItem */

                $data = [];
                $data['id'] = $item->id;
                $data['image'] = $item->getImageUrl();
                $data['url'] = $item->url;
                $data['caption'] = $item->caption;
                $items[] = $data;
            }
            Yii::$app->cache->set($cacheKey, $items, 60 * 60 * 24 * 365);
        }

        return $items;
    }
}
