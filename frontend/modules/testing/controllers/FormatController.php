<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class FormatController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {


        return $this->render('index');
    }

    public function actionCurrency()
    {

        $pricie = 10000;
        $textOptions = [

        ];
        $a = \Yii::$app->formatter->asCurrency($pricie);
        //$a = getViFormat()->asDecimal($pricie);
        dd($a);


        return $this->render('index');
    }

    public function actionWeight()
    {

        return $this->render('index');
    }

    public function actionNumber()
    {

        $number = 1000;

        dd(getFormat()->asInteger($number));
    }
}
