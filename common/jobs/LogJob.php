<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/4/2017
 * Time: 2:45 PM
 */

namespace common\jobs;


use Yii;
use yii\base\BaseObject;

class LogJob extends BaseObject implements \yii\queue\JobInterface
{
    public $msg;

    public function execute($queue)
    {
        Yii::warning('Job Queue', 'job');
    }
}