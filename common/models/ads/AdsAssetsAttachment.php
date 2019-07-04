<?php

namespace common\models\ads;

use Yii;

/**
 * This is the model class for table "ads_assets_attachment".
 *
 * @property int $id
 * @property int $assets_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property int $size
 * @property string $name
 * @property int $created_at
 *
 * @property AdsAssets $assets
 */
class AdsAssetsAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_assets_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assets_id', 'path'], 'required'],
            [['assets_id', 'size', 'created_at'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['assets_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdsAssets::class, 'targetAttribute' => ['assets_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assets_id' => 'Assets ID',
            'path' => 'Path',
            'base_url' => 'Base Url',
            'type' => 'Type',
            'size' => 'Size',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasOne(AdsAssets::class, ['id' => 'assets_id']);
    }
}
