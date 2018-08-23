<?php

namespace console\controllers;

use common\models\Article;
use common\models\ArticleCategory;
use Yii;
use yii\console\Controller;
use yii\db\Expression;
use yii\helpers\Console;
use yii\helpers\Inflector;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class DataController extends Controller
{

    /*
     * Real Data
     * Article Cache
     * Count Article Category
     * Count
     *
     * */
    public function actionIndex()
    {
        Console::output("Start Set data!");
        $modelCat = ArticleCategory::find()->all();
        /** @var ArticleCategory $item */
        foreach ($modelCat as $key => $item) {
            $totalArticle = $item->getTotalArticle();
            $item->total_article = $totalArticle;
            $item->save(false);
        }

        Console::output("Start Set data done!");
    }

    public function actionFake($limit = 500)
    {
        $arrTitle = [
            'Điện thoại Iphone 8',
            'Điện thoại Iphone X 128G',
            'Máy tính HP ProBook',
            'Điện thoại Samsung note 8',
            'Samsung Galaxy S Dous (Brand New/ Intact Box) With 1year Warranty',
            'Điện thoại Google Pixel 2',
            'Google drops Nexus 4 by $100, offers 15 day price protection refund',
            'Điện thoại Galaxy S9 brand new',
            'Sony Xperia dual sim 100% brand new',
            'Máy tính bảng Ipad 2 32G',
            'Sở hữu căn hộ One Verandad ngay trung tâm Q2, giá chỉ 2.6 tỷ/căn',
            'TGDD Iphone X 128G, hỗ trợ trả góp trong vòng 6 tháng'
        ];

        Console::output("Runing Fake!");
        for ($i = 0; $i < $limit; $i++) {
            $model = new Article();
            $model->loadDefaultValues();
            /** @var Article $eModel */
            $eModel = Article::find()->published()->one();
            if ($eModel) {
                $model->copyModel($eModel->id);

                $titleRand = $arrTitle[rand(0, 8)];
                $model->title = $titleRand;
                $model->slug = Inflector::slug($titleRand);
                $model->price = 10000000;

                $catModel = ArticleCategory::find()
                    ->where(['parent_id' => null])
                    ->orderBy(new Expression('rand()'))->one();

                $model->view_count = 0;
                $model->category_id = $catModel ? $catModel->id : 1;
                $model->created_by = rand(1, 9);
                $model->updated_by = rand(1, 9);

                $model->detachBehavior('blameable');
                $model->detachBehavior('timestamp');

                $model->save(false);
            }
        }
        Console::output("Run Success!");
    }

}

