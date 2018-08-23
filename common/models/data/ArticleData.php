<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/5/2018
 * Time: 4:27 PM
 */

namespace common\models\data;


use common\helpers\TimeHelper;
use common\models\Article;
use yii\helpers\Inflector;

class ArticleData extends Inflector
{
    /*
     * Total Article
     * */
    public static function getTotal($type = 1, $cat = null, $update = false)
    {
        $cacheKey = [
            Article::class,
            CACHE_ARTICLE_REPORT . $type,
            $cat
        ];
        $total = dataCache()->get($cacheKey);

        if ($total === false or $update) {
            $query = Article::find();
            switch ($type) {
                case 1:
                    if ($cat) {
                        $query->andWhere(['category_id' => $cat]);
                    }
                    break;
                case 2:
                    if ($cat) {
                        $query->andWhere(['category_id' => $cat]);
                    }
                    break;
                case 3:
                    if ($cat) {
                        $query->andWhere(['city_id' => $cat]);
                    }
                    break;
                case 4:
                    if ($cat) {
                        $query->andWhere(['created_by' => $cat]);
                    }
                    break;
                default:

            }
            $total = $query->count();
            /*Set cache*/
            dataCache()->set($cacheKey, $total, TimeHelper::SECONDS_IN_A_DAY);
        }

        return $total;
    }
}