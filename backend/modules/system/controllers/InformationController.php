<?php
/**
 * Author: Eugine Terentev <eugine@terentev.net>
 */

namespace backend\modules\system\controllers;

use backend\controllers\BackendController;
use probe\Factory;
use Yii;
use yii\web\Response;

class InformationController extends BackendController
{
    public $layout = 'common';

    public function actionIndex()
    {
        $provider = Factory::create();
        if ($provider) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                if ($key = Yii::$app->request->get('data')) {
                    switch ($key) {
                        case 'cpu_usage':
                            return $provider->getCpuUsage();
                            break;
                        case 'memory_usage':
                            return ($provider->getTotalMem() - $provider->getFreeMem()) / $provider->getTotalMem();
                            break;
                    }
                }
            } else {
                return $this->render('index', ['provider' => $provider]);
            }
        } else {
            return $this->render('fail');
        }
    }
}
