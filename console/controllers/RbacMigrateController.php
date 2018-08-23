<?php

namespace console\controllers;

use common\models\User;
use yii\console\controllers\MigrateController;
use Yii;
use yii\base\InvalidArgumentException;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class RbacMigrateController extends MigrateController
{
    /**
     * Creates a new migration instance.
     * @param string $class the migration class name
     * @return \common\rbac\Migration the migration instance
     */
    protected function createMigration($class)
    {
        $file = $this->migrationPath . DIRECTORY_SEPARATOR . $class . '.php';
        require_once($file);

        return new $class();
    }

    /*
     * php console/yii rbac/assign moderator alex
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
