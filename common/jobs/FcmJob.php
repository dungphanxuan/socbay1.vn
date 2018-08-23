<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/4/2017
 * Time: 2:45 PM
 */

namespace common\jobs;


use Guzzle\Http\Message\Response;
use paragraph1\phpFCM\Message;
use paragraph1\phpFCM\Notification;
use paragraph1\phpFCM\Recipient\Device;
use Yii;
use yii\base\BaseObject;

class FcmJob extends BaseObject implements \yii\queue\JobInterface
{
    public $user_id;
    public $data;

    public function execute($queue)
    {
        //TODO Send FCM

        /** @var Notification $note */
        $note = Yii::$app->fcm->createNotification("test title", "testing body");
        $note->setIcon('notification_icon_resource_name')
            ->setColor('#ffffff')
            ->setBadge(1);

        /** @var Message $message */
        $message = Yii::$app->fcm->createMessage();
        $message->addRecipient(new Device('your-device-token'));
        $message->setNotification($note)
            ->setData(['someId' => 111]);

        /** @var Response $response */
        $response = Yii::$app->fcm->send($message);
        var_dump($response->getStatusCode());
    }
}