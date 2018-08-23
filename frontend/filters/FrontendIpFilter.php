<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/25/2017
 * Time: 11:33 AM
 */

namespace frontend\filters;

use Yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * FrontendIpFilter is used to restrict access to admin controller in frontend when using Yii2-user with Yii2
 * advanced template.
 *
 * @author Dung Phan Xuan <dungphanxuan999@gmail.com>
 */
class FrontendIpFilter extends ActionFilter
{
    /**
     * @var array
     */
    public $controllers = ['site'];

    /**
     * @param \yii\base\Action $action
     *
     * @return bool
     * @throws \yii\web\NotFoundHttpException
     */

    public function beforeAction($action)
    {
        $arrIps = [];
        $request = Yii::$app->request;
        $userIp = $request->getUserIP();

        if (in_array($userIp, $arrIps)) {
            throw new ForbiddenHttpException('Not allow');
        }

        return true;
    }

}