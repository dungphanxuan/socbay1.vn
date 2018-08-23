<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 3/29/2018
 * Time: 5:03 PM
 */

namespace frontend\components;

use yii\base\BootstrapInterface;
use Yii;

/*
 * Class DynaRoute
 * */

class DynaRoute implements BootstrapInterface
{
    public function bootstrap($app)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->getUrlManager()->addRules([
                [
                    'pattern'    => '/',
                    'route'      => 'site/index',
                    'suffix'     => '/',
                    'normalizer' => false,
                ],
            ], false);
        } else {
            Yii::$app->getUrlManager()->addRules([
                [
                    'pattern'    => '/',
                    'route'      => 'ads/index',
                    'suffix'     => '/',
                    'normalizer' => false,
                ],
            ], true);
        }
    }
}