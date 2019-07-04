<?php

namespace frontend\controllers;

use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class SupportController extends FrontendController
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex()
    {
        //Related articles
        $queryTopic = Article::find()
            ->orderBy('id desc');

        $dataProvider = new ActiveDataProvider([
            'query' => $queryTopic,
            'pagination' => false,
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }


    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionTopic($id = null)
    {
        $queryOne = Article::find();
        //->published()
        //->andWhere(['id' => $id])
        // ->one();
        if ($id) {
            $queryOne->andWhere(['id' => $id]);
        }

        $model = $queryOne->one();
        if (!$model) {
            throw new NotFoundHttpException;
        }
        //Related articles
        $queryRelated = Article::find()
            ->andWhere(['not in', 'id', [$model->id]])
            ->orderBy('id desc')
            ->limit(7);

        $dataRelatedProvider = new ActiveDataProvider([
            'query' => $queryRelated,
            'pagination' => false,
        ]);
        $viewFile = $model->view ?: 'topic';
        return $this->render($viewFile, [
            'model' => $model,
            'dataRelatedProvider' => $dataRelatedProvider
        ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
