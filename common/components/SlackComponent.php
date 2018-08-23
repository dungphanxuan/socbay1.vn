<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/5/2017
 * Time: 9:41 AM
 */

namespace common\components;


use Maknz\Slack\Client;
use yii\base\Component;

class SlackComponent extends Component
{
    public $url;
    public $client;

    public function init()
    {
        parent::init();
        $this->client = new Client($this->url);
    }

    /**
     * @param $message
     * @return bool
     */
    public function send($message = null)
    {
        $this->client->send($message);

        return true;
    }

}