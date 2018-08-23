<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use api\components\TwoFactorAuth;
use common\models\ArticleCategory;
use yii\filters\AccessControl;

class CategoryController extends ApiController
{

    public function actionIndex()
    {
        $this->msg = 'Category Index';

        $allModel = ArticleCategory::find()->active()
            ->rootCategory()
            ->asArray()
            ->all();
        $this->data = [
            'total' => count($allModel),
            'body'  => $allModel
        ];
    }

    public function actionView()
    {

        $getId = getParam('id', null);
        if ($getId) {
            $model = ArticleCategory::find()->where(['id' => $getId])->asArray()
                ->one();
            if ($model) {
                $this->msg = 'Category detail';
                $this->data = $model;
            } else {
                $this->code = 404;
                $this->msg = 'Category Not Found';
            }
        } else {
            $this->code = 422;
            $this->msg = 'Missing Category ID ';
        }

    }
}
