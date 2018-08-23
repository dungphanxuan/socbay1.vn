<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\job\query;

use common\models\ArticleCategory;
use yii\db\ActiveQuery;

class JobCategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => ArticleCategory::STATUS_ACTIVE]);

        return $this;
    }

    /**
     * @return $this
     */
    public function noParents()
    {
        $this->andWhere('job_category.parent_id IS NULL');

        return $this;
    }

    /**
     * @return $this
     */
    public function hasParents()
    {
        $this->andWhere('job_category.parent_id is not NULL');

        return $this;
    }

    /**
     * @return $this
     */
    public function hasJobs()
    {
        $this->andWhere('job_category.parent_id is not NULL');

        return $this;
    }
}
