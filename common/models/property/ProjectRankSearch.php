<?php

namespace common\models\property;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProjectRankSearch represents the model behind the search form about `common\models\property\ProjectRank`.
 */
class ProjectRankSearch extends ProjectRank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort_number'], 'integer'],
            [['title', 'slug'], 'safe'],
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
        $query = ProjectRank::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'          => $this->id,
            'sort_number' => $this->sort_number,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
