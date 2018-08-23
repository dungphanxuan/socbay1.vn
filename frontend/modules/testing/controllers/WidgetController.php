<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;


/**
 * Default controller for the `testing` module
 */
class WidgetController extends Controller
{

    public function actionWeather()
    {
        return $this->render('weather');
    }


}
