<?php

namespace common\models\ads\support;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ads\support\SupportTopic;

/**
 * SupportTopicSearch represents the model behind the search form about `common\models\ads\support\SupportTopic`.
 */
class SupportTopicSearch extends SupportTopic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'total_votes', 'up_votes', 'comment_count', 'view_count', 'sort_number', 'status', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'body', 'view', 'thumbnail_base_url', 'thumbnail_path', 'featured'], 'safe'],
            [['rating'], 'number'],
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
        $query = SupportTopic::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'            => $this->id,
            'category_id'   => $this->category_id,
            'total_votes'   => $this->total_votes,
            'up_votes'      => $this->up_votes,
            'rating'        => $this->rating,
            'comment_count' => $this->comment_count,
            'view_count'    => $this->view_count,
            'sort_number'   => $this->sort_number,
            'status'        => $this->status,
            'created_by'    => $this->created_by,
            'updated_by'    => $this->updated_by,
            'published_at'  => $this->published_at,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'view', $this->view])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path])
            ->andFilterWhere(['like', 'featured', $this->featured]);

        return $dataProvider;
    }
}
