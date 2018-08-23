<?php

namespace frontend\modules\testing\controllers;

use Yii;
use yii\mail\BaseMailer;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class MailerController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGmail()
    {
        Yii::$app->mailer->compose('test_html', ['contactForm' => '1'])
            ->setTo('dungphanxuan999@gmail.com')
            ->setSubject('Html Email')
            ->send();
        dd('done');
        return $this->render('index');
    }

    public function actionPhp()
    {
        $a = Yii::$app->mailerPhp->compose()
            ->setFrom(['admin@app.com' => 'App Name'])
            ->setTo('dungphanxuan999@gmail.com')
            ->setSubject('Html Email')
            ->send();
        var_dump($a);

        dd('done');
        return $this->render('index');
    }

    public function actionSg()
    {
        $a = Yii::$app->mailerSg->compose()
            ->setFrom(['admin@socbay1.vn' => 'Rao vặt số 1 Socbay'])
            ->setTo('dungphanxuan999@gmail.com')
            ->setReplyTo('dungpx.s@gmail.com')
            ->setSubject('Account Support')
            ->setTextBody('Html Email')
            ->send();
        var_dump($a);

        dd('done');
        return $this->render('index');
    }

    public function actionSend1()
    {
        Yii::$app->mailer->compose('test_html', ['contactForm' => '1'])
            ->setTo('dungphanxuan999@gmail.com')
            ->setSubject('Html Email')
            ->send();

        return $this->render('send');
    }

    public function actionSend()
    {

        /** @var BaseMailer $mailer */
        $mailer = Yii::$app->getMailer();

        $mailer->htmlLayout = 'layouts/html2';

        //dd($mailer);

        $a = Yii::$app->mailer->compose()
            ->setFrom('dungpx.s@gmail.com')
            ->setTo('laptrinhphp.edu.vn@gmail.com')
            ->setSubject('Message subject')
            ->setTextBody('Body text')
            ->send();


        return $this->render('send');
    }

    public function actionSendAtt()
    {

        /** @var BaseMailer $mailer */
        $mailer = Yii::$app->getMailer();

        $mailer->htmlLayout = 'layouts/html2';

        //dd($mailer);

        $message = Yii::$app->mailer->compose()
            ->setFrom('dungpx.s@gmail.com')
            ->setTo('laptrinhphp.edu.vn@gmail.com')
            ->setSubject('Message subject')
            ->setTextBody('Body text');
        // attach file from local file system
        $keyFilePath = getStoragePath() . '/web/source/nude.jpg';

        $message->attach($keyFilePath);

        $message->send();


        return $this->render('send');
    }


}
