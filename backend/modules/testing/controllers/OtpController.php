<?php

namespace backend\modules\testing\controllers;

use yii\helpers\StringHelper;
use yii\web\Controller;
use Da\TwoFA\Manager;

/**
 * Default controller for the `testing` module
 */
class OtpController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionGenSecret()
    {
        $secret = (new Manager())->generateSecretKey();
    }

    public function actionGetCode()
    {
        $secret = 'ss';
        $manager = new Manager();


        //$valid = $manager->verify($code, $secret);

        return $this->render('index');
    }
}
