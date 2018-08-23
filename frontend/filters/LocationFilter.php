<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/25/2017
 * Time: 11:10 AM
 */


namespace frontend\filters;

use yii\base\ActionFilter;
use yii\web\NotFoundHttpException;

/**
 * LocationFilter is used to restrict access to admin controller in frontend when using Yii2-user with Yii2
 * advanced template.
 *
 * @author Dung Phan Xuan <dungphanxuan999@gmail.com>
 */
class LocationFilter extends ActionFilter
{
    /**
     * @var array
     */
    public $controllers = ['region', 'city', 'district', 'ward'];

    /**
     * @param \yii\base\Action $action
     *
     * @return bool
     * @throws \yii\web\NotFoundHttpException
     */

    public function beforeAction($action)
    {
        if (in_array($action->controller->id, $this->controllers)) {
            throw new NotFoundHttpException('Not found');
        }

        return true;
    }
}