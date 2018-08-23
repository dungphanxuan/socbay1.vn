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
class TestController extends Controller
{

    /*
     * Real Data
     * Article Cache
     * Count Article Category
     * Count
     *
     * */
    public function actionIndex()
    {
        Console::output("Start Set data!");
        $filePath = '1.jpg';
        $visionComponet = \Yii::$app->vision;
        \Yii::warning('File Checking!', 'queue');
        $check = $visionComponet->actionVisionSafe($filePath);

        Console::output("Start Set data done!");
    }

    public function actionRunQueue()
    {
        Console::output("Run Queue!");
        \Yii::$app->runAction('queue/run', ['interactive' => $this->interactive]);
    }

}

