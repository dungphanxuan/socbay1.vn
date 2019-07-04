<?php

namespace common\models\data;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\ArticlePackage;

/**
 * ArticlePackageSearch represents the model behind the search form about `common\models\data\ArticlePackage`.
 */
class ArticlePackageSearch extends ArticlePackage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price', 'day', 'promo_day', 'auto_renewal', 'start_date', 'end_date', 'sort_number', 'show_feature', 'show_top', 'promo_sign', 'recommended_sign', 'status', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'body', 'excerpt', 'view', 'url', 'thumbnail_base_url', 'thumbnail_path'], 'safe'],
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
        $query = ArticlePackage::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'day' => $this->day,
            'promo_day' => $this->promo_day,
            'auto_renewal' => $this->auto_renewal,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'sort_number' => $this->sort_number,
            'show_feature' => $this->show_feature,
            'show_top' => $this->show_top,
            'promo_sign' => $this->promo_sign,
            'recommended_sign' => $this->recommended_sign,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'excerpt', $this->excerpt])
            ->andFilterWhere(['like', 'view', $this->view])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path]);

        return $dataProvider;
    }
}
