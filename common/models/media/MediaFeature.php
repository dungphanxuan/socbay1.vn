<?php

namespace common\models\media;

use Yii;

/**
 * This is the model class for table "med_media_feature".
 *
 * @property int $id
 * @property int $media_id
 * @property int $order
 */
class MediaFeature extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_media_feature';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['media_id'], 'required'],
            [['media_id', 'order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => 'ID',
            'media_id' => 'Media ID',
            'order'    => 'Order',
        ];
    }
}
