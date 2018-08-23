<?php

namespace backend\models\search;

use common\models\Article;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Inflector;

/**
 * ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'created_by', 'updated_by', 'status', 'view_count'], 'integer'],
            //['id', 'integer', 'min' => 100],
            [['published_at', 'created_at', 'updated_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            [['published_at', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['title', 'body'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = Article::find()
            ->with('articleAttachments', 'articleImages', 'category', 'author');
        //TODO Filter by date

        //Not filter status draff
        if (!$params) {
            //$query->where(['in', 'status', [1]]);
            $query->orderBy('id desc');
        }

        $pageArticle = \Yii::$app->keyStorage->get('admin.psize-article', 100);

        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'pageSize' => $pageArticle,
                //'params' => ['type' => 2]
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'id'          => $this->id,
            'created_by'  => $this->created_by,
            'category_id' => $this->category_id,
            'updated_by'  => $this->updated_by,
            'status'      => $this->status,
            'view_count'  => $this->view_count,
            //'published_at' => $this->published_at,
            //'created_at'   => $this->created_at,
            //'updated_at'   => $this->updated_at,
        ]);

        if ($this->published_at !== null) {
            $query->andFilterWhere(['between', 'published_at', $this->published_at, $this->published_at + 3600 * 24]);
        }

        if ($this->created_at !== null) {
            $query->andFilterWhere(['between', 'created_at', $this->created_at, $this->created_at + 3600 * 24]);
        }

        if ($this->updated_at !== null) {
            $query->andFilterWhere(['between', 'updated_at', $this->updated_at, $this->updated_at + 3600 * 24]);
        }

        $query
            ->andFilterWhere(['like', 'title', $this->title])
            ->orFilterWhere(['like', 'slug', Inflector::slug($this->title)]);

        return $dataProvider;
    }
}
