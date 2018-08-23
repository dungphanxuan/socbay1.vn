<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/4/2017
 * Time: 2:45 PM
 */

namespace common\jobs;

use yii\base\BaseObject;

class SlackBootJob extends BaseObject implements \yii\queue\JobInterface
{
    public $message;

    public function execute($queue)
    {
        slack()->send('Hello world!');
    }
}