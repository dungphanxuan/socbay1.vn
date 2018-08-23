<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 5/12/2017
 * Time: 9:49 AM
 */

namespace frontend\controllers;

use Yii;

class XmlController extends \yii\web\Controller
{

    public function actionIndex($name = 'socbay1')
    {
        $listXml = [
            'sitemap',
            'socbay1',
            'viec-lam',
            'bat-dong-san',
            'tin-tuc',
            'dang-tin',
            'lien-he',
            'tro-giup',
            'gioi-thieu',
        ];

        //dd($name);
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');
        if (!in_array($name, $listXml)) {
            $name = 'socbay1';
        }

        return $this->renderPartial('index', ['name' => $name]);
    }


}