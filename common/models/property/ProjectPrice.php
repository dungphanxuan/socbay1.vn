<?php

namespace common\models\property;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "m_project_price".
 *
 * @property integer   $id
 * @property string    $title
 * @property string    $slug
 * @property integer   $type
 * @property integer   $sort_number
 * @property integer   $status
 *
 * @property Project[] $projects
 */
class ProjectPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pm_project_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['sort_number', 'type'], 'integer'],
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
            'id'          => 'ID',
            'title'       => 'Tiêu đề',
            'slug'        => 'Slug',
            'type'        => 'Loại',
            'sort_number' => 'Sort Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::class, ['project_price_id' => 'id']);
    }

    /*
     * Price List
     * Type 1: Project
     * Type 2: Property
     * */
    public static function getList($type = 1)
    {
        $allData = ProjectPrice::find()->all();
        $dataItem = ArrayHelper::map($allData, 'id', 'title');

        return $dataItem;
    }
}
