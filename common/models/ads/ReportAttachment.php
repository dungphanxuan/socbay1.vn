<?php

namespace common\models\ads;

use Yii;

/**
 * This is the model class for table "ads_report_attachment".
 *
 * @property int $id
 * @property int $report_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property int $size
 * @property string $name
 * @property int $created_at
 *
 * @property AdsReport $report
 */
class ReportAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_report_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id', 'path'], 'required'],
            [['report_id', 'size', 'created_at'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['report_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdsReport::class, 'targetAttribute' => ['report_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report_id' => 'Report ID',
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
    public function getReport()
    {
        return $this->hasOne(AdsReport::class, ['id' => 'report_id']);
    }
}
