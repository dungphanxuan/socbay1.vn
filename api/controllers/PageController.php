<?php

namespace api\controllers;

/**
 * Page controller
 */
class PageController extends ApiController
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
        $this->msg = 'Page Component';
    }

    /*Action response as Html*/
    public function actionView()
    {
        $this->is_html = 1;

        /* $appFormat = \Yii::$app->formatter;
         $a = $appFormat->asDate(time());
         dd($a);*/

        return $this->render('web');
    }


}
