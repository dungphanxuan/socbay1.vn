<?php

namespace frontend\modules\testing\controllers;

use common\helpers\LocationHelper;
use common\helpers\PhoneNumber;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class LocationController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $allCity = LocationHelper::getAllCity();
        dd($allCity); // Viettel
        dd('done');

        return $this->render('index');
    }
}
