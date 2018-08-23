<?php

namespace console\controllers;

use yii\console\Controller;
use yii\helpers\Console;


/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class JobController extends Controller
{

    public function actionIndex()
    {
        Console::output("Start Job");


        Console::output("Run " . $total . " Job Success!");
    }

}
