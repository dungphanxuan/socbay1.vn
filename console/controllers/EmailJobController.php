<?php

namespace console\controllers;

use yii\console\Controller;
use yii\helpers\Console;


/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class EmailJobController extends Controller
{

    public function actionIndex()
    {
        Console::output("Start Job");

        Console::output("Run Job Success!");
    }

}
