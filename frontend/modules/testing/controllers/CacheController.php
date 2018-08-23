<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class CacheController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        dd('Cached');
    }

    public function actionFlush()
    {
        \Yii::$app->cache->flush();
        \Yii::$app->dcache->flush();
        \Yii::$app->scache->flush();

        dd('Cache Flush');
    }

}
