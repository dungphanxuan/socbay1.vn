<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\Article;
use yii\db\ActiveQuery;

class ArticleQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function published()
    {
        $this->andWhere(['status' => Article::STATUS_PUBLISHED]);
        //$this->andWhere(['<', '{{%article}}.published_at', time()]);

        $this->with('category', 'articleAttachments', 'articleImages');

        return $this;
    }

    /**
     * @return $this
     */
    public function active()
    {
        //$this->andWhere(['status' => Article::STATUS_PUBLISHED]);
        //$this->andWhere(['<', '{{%article}}.published_at', time()]);

        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function byType($type)
    {
        $this->andWhere(['type' => $type]);

        return $this;
    }

    /**
     * @param $user_id
     * @return $this
     */
    public function byUser($user_id)
    {
        $this->andWhere(['created_by' => $user_id]);

        return $this;
    }

    /**
     * @return $this
     */
    public function freshFirst()
    {
        return $this->orderBy('created_at DESC');
    }
}
