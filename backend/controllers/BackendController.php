<?php

namespace backend\controllers;

use common\helpers\TimeHelper;
use Yii;
use yii\web\Controller;


/**
 * BackendController
 */
abstract class BackendController extends Controller
{
    public $enableCsrfValidation = false;
    public $isCollapse = 0;

    /*public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => ActionTimeFilter::class,
                'type'  => 1
            ],
        ]);
    }*/

    public function init()
    {
        //Yii::$app->language = 'vi';
        header('Access-Control-Allow-Origin: *');
        parent::init();
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            /*Todo clear cache*/
            $cacheKey = CACHE_SYSTEM_COMMON;
            $data = systemCache()->get($cacheKey);

            /*Clear cache taget 1 day request*/
            //if ($data === false) {
            if (false) {

                //dd('dđ');
                \Yii::$app->cache->flush();
                \Yii::$app->dcache->flush();
                \Yii::$app->scache->flush();

                //Clean Assets Folder
                $dir = Yii::getAlias('@backend') . '/assets';
                rrmdir($dir);

                //Todo report summary
                //Delete Log
                //SystemLog::deleteAll();
                systemCache()->set($cacheKey, 1, TimeHelper::SECONDS_IN_A_DAY);
            }

            return true;
        }

        return false;
    }

}
