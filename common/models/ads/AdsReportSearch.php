<?php

namespace common\models\ads;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ads\AdsReport;

/**
 * AdsReportSearch represents the model behind the search form about `common\models\ads\AdsReport`.
 */
class AdsReportSearch extends AdsReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reason_id', 'report_id', 'user_id', 'city_id', 'district_id', 'ward_id', 'status', 'sort_number', 'approve_by', 'created_by', 'updated_at'], 'integer'],
            [['slug', 'title', 'body', 'user_email', 'thumbnail_base_url', 'thumbnail_path'], 'safe'],
            [['created_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            [['created_at'], 'default', 'value' => null],
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
        $query = AdsReport::find()
            //->andWhere(['status' => 1])
            ->orderBy('id desc');

        //Not filter status draff
        if (!$params) {
            $query->where(['in', 'status', [1]]);
            $query->orderBy('id desc');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'          => $this->id,
            'reason_id'   => $this->reason_id,
            'report_id'   => $this->report_id,
            'user_id'     => $this->user_id,
            'city_id'     => $this->city_id,
            'district_id' => $this->district_id,
            'ward_id'     => $this->ward_id,
            'status'      => $this->status,
            'sort_number' => $this->sort_number,
            'approve_by'  => $this->approve_by,
            'created_by'  => $this->created_by,
            'updated_at'  => $this->updated_at,
        ]);
        if ($this->created_at !== null) {
            $query->andFilterWhere(['between', 'created_at', $this->created_at, $this->created_at + 3600 * 24]);
        }
        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path]);

        return $dataProvider;
    }
}
