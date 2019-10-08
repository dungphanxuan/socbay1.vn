<?php

namespace common\models\property;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProjectPickupSearch represents the model behind the search form about `common\models\property\ProjectPickup`.
 */
class ProjectPickupSearch extends ProjectPickup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'sort_number'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
// bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProjectPickup::find()->orderBy('sort_number');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'project_id' => $this->project_id,
            'sort_number' => $this->sort_number,
        ]);

        return $dataProvider;
    }
}
