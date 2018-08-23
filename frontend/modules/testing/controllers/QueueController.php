<?php

namespace frontend\modules\testing\controllers;

use common\helpers\FacebookHelper;
use common\helpers\PhoneNumber;
use common\jobs\LogJob;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;

/**
 * Queue controller for the `testing` module
 */
class QueueController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->queue->delay(60)->push(new LogJob([
            'msg' => 'Job Queue',
        ]));

        dd('Done');
    }


}
