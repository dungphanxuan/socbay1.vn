<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use common\models\User;
use yii\db\Query;
use yii\web\Controller;
use Yii;


/**
 * Data controller for the `testing` module
 */
class DataController extends Controller
{
    public function actionIndex()
    {
        $model = User::findOne(7);
        dd($model->toArray());

    }

    public function actionBatch()
    {

        $query = (new Query())
            ->from(Article::tableName())
            ->select('id, title')
            ->where(['status' => 1]);

        //->orderBy('id');

        $count = 0;
        foreach ($query->batch() as $users) {
            //dd($users);
            // $users is an array of 100 or fewer rows from the user table
            $count++;
        }


        return $this->render('batch');
    }
}
