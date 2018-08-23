<?php

namespace common\models\property;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProjectSearch represents the model behind the search form about `common\models\property\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'category_id',
                    'type',
                    'city_id',
                    'district_id',
                    'ward_id',
                    'level',
                    'price_id',
                    'price',
                    'price_to',
                    'num_of_rooms',
                    'area_id',
                    'sort_number',
                    'status',
                    'created_at',
                    'updated_at'
                ],
                'integer'
            ],
            [['slug', 'title', 'body', 'thumbnail_base_url', 'thumbnail_path'], 'safe'],
            [['lat', 'lng'], 'number'],
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
        $query = Project::find()
            //->where( [ 'status' => 1 ] )
            ->with('projectAttachments', 'district', 'projectPrice', 'projectArea')
            ->orderBy('id desc');

        //Not filter status draff
        if (!$params) {
            //$query->where(['in', 'status', [1]]);
        }

        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'           => $this->id,
            'category_id'  => $this->category_id,
            'type'         => $this->type,
            'city_id'      => $this->city_id,
            'district_id'  => $this->district_id,
            'ward_id'      => $this->ward_id,
            'level'        => $this->level,
            'price_id'     => $this->price_id,
            'price'        => $this->price,
            'price_to'     => $this->price_to,
            'num_of_rooms' => $this->num_of_rooms,
            'area_id'      => $this->area_id,
            'lat'          => $this->lat,
            'lng'          => $this->lng,
            'sort_number'  => $this->sort_number,
            'status'       => $this->status,
            //'created_at'       => $this->created_at,
            'updated_at'   => $this->updated_at,
        ]);

        if ($this->created_at) {
            $query->andFilterWhere(
                ['between', 'created_at', $this->created_at, $this->created_at + 86400]);
        }

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path]);

        return $dataProvider;
    }
}
