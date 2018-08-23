<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 4/24/2017
 * Time: 9:07 AM
 */

namespace common\helpers;

use common\models\Article;
use common\models\FileStorageItem;
use common\models\User;
use Psr\Log\InvalidArgumentException;
use Yii;


class UserData
{
    /**
     * Wrapper for yii security helper method.
     *
     * @param $password
     *
     * @return string
     */
    public static function getUserStat($update = false, $id)
    {
        $cacheKey = [
            User::class,
            's' . $id
        ];
        $data = dataCache()->get($cacheKey);

        if ($data === false || $update) {
            $data = [];
            $data['article'] = Article::find()->where(['created_by' => $id])->count();
            $totalFavourite = Article::find()
                ->leftJoin('{{%star}}', '`tbl_star`.`object_id` = `tbl_article`.`id`  AND `tbl_star`.`star` = 1 ')
                ->leftJoin('{{%user}}', '`tbl_star`.`user_id` = `tbl_user`.`id` ')
                ->andWhere(['{{%user}}.id' => $id])
                ->count();

            $totalFile = FileStorageItem::find()->where(['created_by' => $id])->count() ?: 0;

            $data['favourite'] = $totalFavourite;
            $data['saved'] = 18;
            $data['pending'] = Article::find()->where(['status' => Article::STATUS_PENDING_APPROVAL])->count();;
            $data['archived'] = Article::find()->where(['status' => Article::STATUS_PENDING_APPROVAL])->count();
            $data['message'] = 18;
            $data['visit'] = 7000;
            $data['file'] = $totalFile;


            // store $data in cache so that it can be retrieved next time
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_AN_HOUR);
        }

        return $data;
    }

    /*
     * Assigning role to user
     * */
    public function actionAssign($username, $role)
    {
        $user = User::find()->where(['username' => $username])->one();
        if (!$user) {
            throw new InvalidArgumentException("There is no user \"$username\".");
        }
        $auth = Yii::$app->authManager;
        $roleObject = $auth->getRole($role);
        if (!$roleObject) {
            throw new InvalidArgumentException("There is no role \"$role\".");
        }
        //Check roler has assign
        $roleAssign = $auth->getAssignment($role, $user->id);
        if (!$roleAssign) {
            $auth->assign($roleObject, $user->id);
        } else {
            echo "Item has assign";
        }
    }
}