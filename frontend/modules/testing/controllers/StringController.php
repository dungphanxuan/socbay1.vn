<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;
use yii\helpers\StringHelper;
use yii\helpers\Inflector;


/**
 * String controller for the `testing` module
 */
class StringController extends Controller
{
    public function actionIndex()
    {
        //$str = 'Hello WORLD';
        $str = 'DELL LATITUDE E5440 LẦN ĐẦU TIÊN BÁN VỚI GIÁ 6TR2';
        //dd(mb_strtolower($str));

        $str = mb_strtolower($str);
        //$str = strtolower($str);
        //$show = ucwords($str);
        $show = Inflector::camel2words($str);
        dd($show);

    }

}
