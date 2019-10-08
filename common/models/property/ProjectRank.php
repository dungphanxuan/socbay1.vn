<?php

namespace common\models\property;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "m_project_rank".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property integer $sort_number
 *
 * @property Project[] $projects
 */
class ProjectRank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pm_project_rank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['sort_number'], 'integer'],
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
            'title' => 'Tiêu đề',
            'slug' => 'Slug',
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

    public static function getList()
    {
        $allData = ProjectRank::find()->all();
        $dataItem = ArrayHelper::map($allData, 'id', 'title');

        return $dataItem;
    }
}
