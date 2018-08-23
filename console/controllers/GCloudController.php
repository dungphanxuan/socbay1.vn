<?php

namespace console\controllers;

use common\models\Article;
use common\models\ArticleCategory;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
//To make the local directory "data" the same as the contents of gs://mybucket/data:
//gsutil rsync -d -r gs://mybucket/data data
/*
 * 1. upload file, 2. split file to m3u8, 3. sync to google cloud storage
 * */

class GcloudController extends Controller
{

    public function actionRsync()
    {
        Console::output("Run Queue!");
        \Yii::$app->runAction('queue/run', ['interactive' => $this->interactive]);
    }

    //gsutil cors set cors-json-file.json gs://example
    public function actionCors()
    {

    }

}

