<?php

namespace api\controllers;

/**
 * Site controller
 */
class SiteController extends ApiController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'api\action\ErrorAction',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $this->msg = 'Api Component';
    }

    /*Action response as Html*/
    public function actionWeb()
    {
        $this->is_html = 1;

        /* $appFormat = \Yii::$app->formatter;
         $a = $appFormat->asDate(time());
         dd($a);*/

        return $this->render('web');
    }


}
