<?php

namespace backend\models\search;

use common\models\FileStorageItem;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * FileStorageItemSearch represents the model behind the search form about `common\models\FileStorageItem`.
 */
class FileStorageItemSearch extends FileStorageItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'size', 'created_by'], 'integer'],
            [['created_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            [['created_at'], 'default', 'value' => null],
            [['component', 'base_url', 'path', 'type', 'name', 'upload_ip'], 'safe'],
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
        $query = FileStorageItem::find()->with('user');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'         => $this->id,
            'component'  => $this->component,
            'size'       => $this->size,
            'created_by' => $this->created_by,
        ]);

        if ($this->created_at !== null) {
            $query->andFilterWhere(['between', 'created_at', $this->created_at, $this->created_at + 3600 * 24]);
        }
        //$query->andFilterWhere(['like', 'component', $this->component])
        $query->andFilterWhere(['like', 'base_url', $this->base_url])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'upload_ip', $this->upload_ip]);

        return $dataProvider;
    }
}
