<?php

namespace api\modules\docs\controllers;

use yii\helpers\Markdown;

class UserController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        $docs = file_get_contents(\Yii::getAlias('@api/modules/docs/views/examples/user/temp.md'));
        //$docs = file_get_contents(\Yii::getAlias('@api/modules/docs/views/examples/accounts/get.md'));

        $html = Markdown::process($docs, 'gfm');
        //$html = preg_replace('|<a href="(?!http)' . $_slash . '(.+\\.md)">|U', '<a href="__INTERNAL_URL__$1">', $html);
        $html = str_replace("<table>", '<table class="table table-sm table-striped table-bordered">', $html);

        return $this->render('view', [
            'content' => $html,
        ]);
    }

}
