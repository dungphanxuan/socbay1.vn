<?php

namespace frontend\modules\demo\controllers;

use common\models\Article;
use common\models\ArticleAttachment;
use common\models\FileStorageItem;
use common\models\property\Project;
use common\models\UserProfile;
use yii\web\Controller;

/**
 * Default controller for the `demo` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBaseUrl()
    {
        $fileBaseUrl = fileStorage()->baseUrl;
        Article::updateAll(['thumbnail_base_url' => $fileBaseUrl]);
        ArticleAttachment::updateAll(['base_url' => $fileBaseUrl]);
        UserProfile::updateAll(['avatar_base_url' => $fileBaseUrl]);
        Project::updateAll(['thumbnail_base_url' => $fileBaseUrl]);
        FileStorageItem::updateAll(['base_url' => $fileBaseUrl]);

        dd('done');
    }
}
