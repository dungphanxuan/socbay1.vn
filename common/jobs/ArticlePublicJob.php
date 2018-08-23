<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/4/2017
 * Time: 2:45 PM
 */

namespace common\jobs;


use common\models\Article;
use yii\base\BaseObject;

/*
 * Class ArticlePublicJob
 * */

class ArticlePublicJob extends BaseObject implements \yii\queue\JobInterface
{
    public $article_id;

    public function execute($queue)
    {
        /** @var Article $article */
        $article = Article::find()->where(['id' => $this->article_id])->one();

        $article->detachBehavior('blameable');
        $article->detachBehavior('timestamp');
        $article->save(false);

    }
}