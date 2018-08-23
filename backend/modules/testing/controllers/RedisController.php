<?php

namespace backend\modules\testing\controllers;

use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class RedisController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSet()
    {

        //dd(redisCloud()->info());
        /* for ($i = 0; $i < 100; $i++) {
             redis()->set('key' . $i, 989);
         }*/
        $a = redis()->set('a', 12121);
        $b = redis()->get('a');

        //dd($b);
        //dd(redisCloud()->keys('*'));
        //dd($a);

        return $this->render('index');
    }

    public function actionInfo()
    {
        $a = redisCloud()->info();
        dd($a);

        //return $this->render('index');
    }
}
