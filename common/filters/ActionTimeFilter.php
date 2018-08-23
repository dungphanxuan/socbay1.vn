<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 4/27/2017
 * Time: 3:57 PM
 */

namespace common\filters;

use common\models\WebLog;
use common\task\LogTimeTask;
use Yii;
use yii\base\ActionFilter;

class ActionTimeFilter extends ActionFilter
{
    public $type = 1;
    private $_startTime;

    public function beforeAction($action)
    {
        $this->_startTime = microtime(true);

        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        $time = microtime(true) - $this->_startTime;
        //Yii::warning("Action '{$action->uniqueId}' spent $time second.");

        /*Logging*/
        $model = new WebLog();
        $model->type = $this->type;
        $model->user_id = Yii::$app->user ? Yii::$app->user->id : '';
        $model->user_ip = Yii::$app->request->userIP;
        $model->action = $action->uniqueId;
        $model->execute_time = $time;
        if ($model->validate()) {
            $model->save();
        }
        // create task

        /*$task = new LogTimeTask([
            'user_id' => Yii::$app->user ? Yii::$app->user->id : '',
            'user_ip' => Yii::$app->request->userIP,
            'action' => $action->uniqueId,
            'execute_time' => $time
        ]);
        \Yii::$app->async->sendTask($task);*/

        return parent::afterAction($action, $result);
    }
}