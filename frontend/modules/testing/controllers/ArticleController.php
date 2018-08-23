<?php

namespace frontend\modules\testing\controllers;

use common\helpers\ArticleHelper;
use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\ArticleCategory;
use yii\web\Controller;
use yii\db\Query;

/**
 * Default controller for the `testing` module
 */
class ArticleController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $article = ArticleHelper::getDetail(3, true);

        dd($article);

        return $this->render('index');
    }

    public function actionCat()
    {
        $article = ArticleCategory::getList(true);

        dd($article);

        return $this->render('index');
    }

    public function actionBatch1()
    {
        $count = 0;
        $data = Article::find()->all();

        return $this->render('batch', ['count' => $count]);
    }

    public function actionBatch()
    {
        // fetch 10 customers at a time
        $count = 0;
        foreach (Article::find()->batch(2) as $customers) {
            // $customers is an array of 10 or fewer Customer objects
            foreach ($customers as $item) {
                $count++;
            }
        }
        return $this->render('batch', ['count' => $count]);
    }
}
