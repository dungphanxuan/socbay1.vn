<?php

namespace common\models\job;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\job\Company;

/**
 * CompanySearch represents the model behind the search form about `common\models\job\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contact_id', 'start_date', 'end_date', 'complete_on', 'city_id', 'district_id', 'ward_id', 'total_votes', 'up_votes', 'featured', 'comment_count', 'view_count', 'sort_number', 'type', 'status', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'title_en', 'title_short', 'body', 'excerpt', 'view', 'url', 'email', 'phone', 'thumbnail_base_url', 'thumbnail_path'], 'safe'],
            [['lat', 'lng', 'rating'], 'number'],
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
        $query = Company::find();

        //Filter company of user
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'contact_id' => $this->contact_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'complete_on' => $this->complete_on,
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
            'ward_id' => $this->ward_id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'total_votes' => $this->total_votes,
            'up_votes' => $this->up_votes,
            'rating' => $this->rating,
            'featured' => $this->featured,
            'comment_count' => $this->comment_count,
            'view_count' => $this->view_count,
            'sort_number' => $this->sort_number,
            'type' => $this->type,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ]);

        if (empty($this->title_short)) {
            $this->title_short = $this->title;
        }

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->orFilterWhere(['like', 'title_en', $this->title_en])
            ->orFilterWhere(['like', 'title_short', $this->title_short])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'excerpt', $this->excerpt])
            ->andFilterWhere(['like', 'view', $this->view])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
