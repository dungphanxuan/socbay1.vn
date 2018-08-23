<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/4/2017
 * Time: 2:45 PM
 */

namespace common\jobs;


use common\dictionaries\VisionJob;
use common\models\Article;
use common\models\FileStorageItem;
use yii\base\BaseObject;

/*
 * Class ArticlePublicJob
 * */

class CloudVisionJob extends BaseObject implements \yii\queue\JobInterface
{
    /*
     * @var int
     * */
    public $type;

    /*
     * @var int
     * */
    public $article_id;
    /*
     * @var int
     * */
    public $file_storage_id;

    public function execute($queue)
    {
        //Proccess Article
        if ($this->type == VisionJob::ARTICLE) {
            /** @var Article $article */
            $article = Article::find()->where(['id' => $this->article_id])->one();

            if ($article) {
                $article->detachBehavior('blameable');
                $article->detachBehavior('timestamp');
                $article->save(false);
            }
        }

        //Proccess File
        if ($this->type == VisionJob::FILE) {
            /** @var FileStorageItem $fileStorage */
            $fileStorage = FileStorageItem::find()->where(['id' => $this->file_storage_id])->one();

            if ($fileStorage) {
                $filePath = $fileStorage->path;
                $visionComponet = \Yii::$app->vision;
                \Yii::warning('File Checking!', 'queue');
                $check = $visionComponet->actionVisionSafe($filePath);
                if ($check) {
                    \Yii::warning('File Safe!', 'queue');
                } else {
                    $fileStorage->safeImage($check);
                    //TODO Send message to client
                    \Yii::warning('File Not Safe!', 'queue');
                }
            }
        }

        \Yii::warning('Run Job Success!', 'queue');
    }
}