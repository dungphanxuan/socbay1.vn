<?php

namespace frontend\modules\testing\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class QueryController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIndexCommand()
    {
        $sqlQuery = 'SELECT * FROM post';
        $posts = Yii::$app->db->createCommand($sqlQuery)
            ->queryAll();

        return $this->render('index');
    }

    public function actionBatch()
    {
        $query = (new Query())
            ->from('user')
            ->orderBy('id');

        foreach ($query->batch() as $users) {
            echo 'ok';
            // $users is an array of 100 or fewer rows from the user table
        }

        // or to iterate the row one by one
        foreach ($query->each() as $user) {
            echo 'ok';
            // data is being fetched from the server in batches of 100,
            // but $user represents one row of data from the user table
        }

        return $this->render('index');
    }
}
