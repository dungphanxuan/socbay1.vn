<?php

namespace backend\models\search;

use common\models\ArticleRevision;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ArticleRevisionSearch represents the model behind the search form about `common\models\ArticleRevision`.
 */
class ArticleRevisionSearch extends ArticleRevision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'revision', 'category_id', 'updater_id', 'updated_at'], 'integer'],
            [['title', 'body', 'thumbnail_base_url', 'thumbnail_path', 'tagNames', 'yii_version', 'memo'], 'safe'],
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
        $query = ArticleRevision::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'article_id'  => $this->article_id,
            'revision'    => $this->revision,
            'category_id' => $this->category_id,
            'updater_id'  => $this->updater_id,
            'updated_at'  => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path])
            ->andFilterWhere(['like', 'tagNames', $this->tagNames])
            ->andFilterWhere(['like', 'yii_version', $this->yii_version])
            ->andFilterWhere(['like', 'memo', $this->memo]);

        return $dataProvider;
    }
}
