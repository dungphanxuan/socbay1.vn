<?php

namespace backend\modules\dev\controllers;

use common\jobs\SlackBootJob;
use Maknz\Slack\Client;
use Yii;

class SlackController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //slack()->send('Hello world!');
        //dd('done');
        Yii::$app->queue->push(new SlackBootJob([
            'message' => 'Slack Message',
        ]));

        return $this->render('index');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionMessage()
    {
        // Instantiate without defaults
        $hUrl = 'https://hooks.slack.com/services/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';

        /** @var Client $client */
        //$client = new Client($hUrl);

        // Instantiate with defaults, so all messages created
        // will be sent from 'Cyril' and to the #accounting channel
        // by default. Any names like @regan or #channel will also be linked.
        $settings = [
            'username' => 'Slack Boot',
            'channel' => '#event',
            'link_names' => true
        ];

        $client = new Client($hUrl, $settings);

        $client->send('Hello world!');
        dd('Done');
        //return $this->render('view');
    }

}
