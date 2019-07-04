<?php

namespace common\models\media;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\media\Media;

/**
 * MediaSearch represents the model behind the search form about `common\models\media\Media`.
 */
class MediaSearch extends Media
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'episode', 'category_id', 'video_play_type', 'review_type', 'view_count', 'like_count', 'dislike_count', 'share_count', 'favorite_count', 'comment_count', 'matched', 'is_syn', 'min_total', 'next_id', 'preview_id', 'login_require', 'is_hot', 'video_status', 'status', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'title', 'body', 'excerpt', 'view', 'thumbnail_base_url', 'thumbnail_path', 'url_local', 'url_streaming', 'youtube_id', 'youtube_url', 'vimeo_url', 'review_url'], 'safe'],
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
        $query = Media::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'episode' => $this->episode,
            'category_id' => $this->category_id,
            'video_play_type' => $this->video_play_type,
            'review_type' => $this->review_type,
            'view_count' => $this->view_count,
            'like_count' => $this->like_count,
            'dislike_count' => $this->dislike_count,
            'share_count' => $this->share_count,
            'favorite_count' => $this->favorite_count,
            'comment_count' => $this->comment_count,
            'matched' => $this->matched,
            'is_syn' => $this->is_syn,
            'min_total' => $this->min_total,
            'next_id' => $this->next_id,
            'preview_id' => $this->preview_id,
            'login_require' => $this->login_require,
            'is_hot' => $this->is_hot,
            'video_status' => $this->video_status,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'excerpt', $this->excerpt])
            ->andFilterWhere(['like', 'view', $this->view])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path])
            ->andFilterWhere(['like', 'url_local', $this->url_local])
            ->andFilterWhere(['like', 'url_streaming', $this->url_streaming])
            ->andFilterWhere(['like', 'youtube_id', $this->youtube_id])
            ->andFilterWhere(['like', 'youtube_url', $this->youtube_url])
            ->andFilterWhere(['like', 'vimeo_url', $this->vimeo_url])
            ->andFilterWhere(['like', 'review_url', $this->review_url]);

        return $dataProvider;
    }
}
