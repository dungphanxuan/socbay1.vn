<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\ArticleTag;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use Yii;

class BlogController extends FrontendController
{
    /**
     * @return string
     */
    public function actionIndex($type = null, $year = null, $tag = null)
    {
        $queryBlog = Article::find()
            ->orderBy('id asc');

        if ($type) {
            //Filter by category
        }

        // show onlu published news if user is not admin
        if (!Yii::$app->user->can('manager')) {
            $queryBlog->published();
        }
        if ($year !== null) {
            $year = (int)$year;
            if ($year < 2018) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            $queryBlog->andWhere('YEAR(news_date) = :year', [':year' => $year]);
        }
        if ($tag !== null) {
            $tag = ArticleTag::find()->where(['slug' => $tag])->one();
            if ($tag === null) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            $queryBlog->joinWith('tags AS tags');
            $queryBlog->andWhere(['tags.id' => $tag->id]);
        }

        $pageSize = 5;
        $dataProvider = new ActiveDataProvider([
            'query'      => $queryBlog,
            'pagination' => [
                'defaultPageSize' => $pageSize,
            ],
        ]);

        $queryPopular = Article::find()
            ->limit(3)
            ->orderBy('id desc');

        $dataPopularProvider = new ActiveDataProvider([
            'query'      => $queryPopular,
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider'        => $dataProvider,
            'dataPopularProvider' => $dataPopularProvider
        ]);
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionRegister()
    {
        return $this->render('create');
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Article::find()
            ->andWhere(['id' => $id])->one();

        if (!$model) {
            throw new NotFoundHttpException(\Yii::t('common', 'Article Not Found'));
        }

        // update view count
        if (Yii::$app->request->isGet) {
            $model->updateCounters(['view_count' => 1]);
        }

        // normalize slug URL
        $slug = Yii::$app->request->get('name');
        if ($model->slug !== (string)$slug) {
            return $this->redirect(['news/view', 'id' => $model->id, 'name' => $model->slug], 301);
        }

        $queryPopular = Article::find()
            ->andWhere(['not in', 'id', [$model->id]])
            ->orderBy('id asc')
            ->limit(3);

        $dataPopularProvider = new ActiveDataProvider([
            'query'      => $queryPopular,
            'pagination' => false,
        ]);

        return $this->render('view', [
            'model'               => $model,
            'dataPopularProvider' => $dataPopularProvider
        ]);

    }

    public function actionCollection(){
        $model = Article::find()->limit(5)->all();

    }

}
