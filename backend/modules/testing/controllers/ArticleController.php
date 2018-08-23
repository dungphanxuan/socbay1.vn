<?php

namespace backend\modules\testing\controllers;

use common\helpers\ArticleHelper;
use common\models\Article;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class ArticleController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSource()
    {
        $model = Article::find()
            ->where(['id' => 10003])
            ->one();

        $articleDetail = ArticleHelper::getDetail($model->id, true);
        $imagesAttactment = $articleDetail['attachments'];
        dd($imagesAttactment);

        //$imgThumbnail = $model->getImgThumbnail(2, 75, 320, 240);

        $imgThumbnail = $model->getImgThumbnail(2, 75, 200, 133);

        dd($imgThumbnail);
        return $this->render('index');
    }

    public function actionFake()
    {
        for ($i = 0; $i < 1000; $i++) {
            $model = new Article();
            $model->loadDefaultValues();
            /** @var Article $eModel */
            $eModel = Article::find()->published()->where(['id' => 1])->one();
            if ($eModel) {
                $data = $eModel->attributes;
                $model->setAttributes($data);
                //Copy thumbnail
                if ($eModel->thumbnail) {
                    $model->thumbnail = $eModel->thumbnail;
                    $copyImage = "1/cp_" . Yii::$app->security->generateRandomString(20) . ".jpg";
                    $model->thumbnail['path'] = $copyImage;
                    $model->thumbnail_path = $copyImage;
                    fileSystem()->copy($eModel->thumbnail['path'], $copyImage);
                }
                //Copy attachments
                $model->attachments = $eModel->attachments;
                foreach ($eModel->articleAttachments as $key => $img) {
                    $new_filename = "1/cp_" . $key . "_" . date('YmdHim') . rand(1, 100000) . ".jpg";
                    fileSystem()->copy($eModel->attachments[$key]['path'], $new_filename);
                    $model->attachments[$key]['path'] = $new_filename;
                }

                $model->title = 'Article Title' . $i;
                $model->slug = 'slug' . Yii::$app->security->generateRandomString(10);
                $model->price = 10000000;

                $model->save(false);
            }
        }
        dd('Fake Article Done');
    }
}
