<?php

namespace frontend\models\search;

use common\helpers\TimeHelper;
use common\models\Article;
use common\models\ArticleDetail;
use common\models\job\JobCategory;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
            [['id', 'category_id', 'city_id', 'district_id', 'ward_id', 'price', 'price_from', 'price_to', 'view_count'], 'integer'],
            [['title'], 'safe'],
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
            ->published();

        if (!$params) {
            //$query->where(['in', 'status', [0, 1]]);
            $query->orderBy('tbl_article.id desc');
        }
        //Filter Search
        //Filter Job Search
        $getJobCategory = getParam('jcategory', null);
        $getJobCategoryName = getParam('job_cat', null);
        $flagJoinDetail = false;
        if ($getJobCategory) {
            $modelJcategory = JobCategory::find()->andWhere(['id' => $getJobCategory])->one();

            if ($modelJcategory) {
                $query->leftJoin(ArticleDetail::tableName(), '`tbl_article`.`id` = `tbl_article_detail`.`article_id`');
                $flagJoinDetail = true;
                $query->andWhere(['tbl_article_detail.job_category' => $modelJcategory->id]);
            }

        }
        if ($getJobCategoryName) {
            $modelJcategorybySlug = JobCategory::find()->andWhere(['slug' => $getJobCategoryName])->one();

            if ($modelJcategorybySlug) {
                if (!$flagJoinDetail) {
                    $query->leftJoin(ArticleDetail::tableName(), '`tbl_article`.`id` = `tbl_article_detail`.`article_id`');
                }
                $query->andWhere(['tbl_article_detail.job_category' => $modelJcategorybySlug->id]);
            }

        }


        //$pageSize = Yii::$app->keyStorage->get('list.adssize');
        $pageSize = 18;
        //$pageSize = 2;

        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'defaultPageSize' => $pageSize,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'tbl_article.id'          => $this->id,
            'tbl_article.category_id' => $this->category_id,
            'tbl_article.city_id'     => $this->city_id,
            'tbl_article.district_id' => $this->district_id,
            'tbl_article.ward_id'     => $this->ward_id,
            'tbl_article.price'       => $this->price,
            'tbl_article.view_count'  => $this->view_count,
        ]);

        $query->andFilterWhere(['like', 'tbl_article.title', $this->title]);

        //Todo cache
        $dependency = [
            'class' => 'yii\caching\DbDependency',
            'sql'   => 'SELECT MAX(created_at) FROM ' . Article::tableName(),
        ];

        /*self::getDb()->cache(function ($db) use ($dataProvider) {
            $dataProvider->prepare();
        }, TimeHelper::SECONDS_IN_A_MINUTE, null);*/

        return $dataProvider;
    }
}
