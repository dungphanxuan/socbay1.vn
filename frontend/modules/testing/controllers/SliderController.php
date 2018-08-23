<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;


/**
 * Data controller for the `testing` module
 */
class SliderController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionJssor()
    {
        return $this->render('jssor');
    }
}
