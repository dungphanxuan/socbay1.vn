<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 11:51 AM
 */

namespace storage\controllers;


use yii\web\Controller;

class GlideController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'trntv\glide\actions\GlideAction'
            ]
        ];
    }

    /*public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                //'only' => ['index'],
                'lastModified' => function ($action, $params) {
                    //$q = new \yii\db\Query();
                    //return $q->from('post')->max('updated_at');
                    return time();
                },
            ],
        ];
    }*/
}