<?php

namespace backend\modules\testing\controllers;

use yii\web\Controller;
use Yii;

/**
 * Word controller for the `testing` module
 */
class WordController extends Controller
{
    /**
     * Renders the index view for the module
     */
    public function actionIndex()
    {
        Yii::$app->language = 'vi';
        //15200000 => mười lăm triệu hai trăm nghìn
        $word = getFormat()->asSpellout(15200000);
        dd($word);
    }

}
