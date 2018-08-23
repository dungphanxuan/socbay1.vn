<?php

namespace backend\modules\testing\controllers;

use common\helpers\GoogleDriverHelper;
use Intervention\Image\ImageManagerStatic;
use yii\web\Controller;

/**
 * File controller for the `testing` module
 */
class PlyrController extends Controller
{
    /**
     * Renders the index view for the module
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionVideo()
    {
        //

        $shareId = '1f1GOYLZen37zI6_TX7C12ZEZfSasWtiT';
        $urlView = GoogleDriverHelper::getViewUrl($shareId);

        return $this->render('video');
    }

    public function actionAudio()
    {
        $urlShare = 'https://drive.google.com/file/d/0B0MkdWjqpwKKemZJenJJa0ZNemM/view?usp=sharing';

        $shareId = GoogleDriverHelper::getId($urlShare);

        //$shareId = '1f1GOYLZen37zI6_TX7C12ZEZfSasWtiT';
        $urlView = GoogleDriverHelper::getViewUrl($shareId);
        return $this->render('audio', [
            'urlView' => $urlView
        ]);
    }
}
