<?php

use common\models\User;
use common\rbac\Migration;

class m150625_214101_roles extends Migration
{
    public function up()
    {
        $this->auth->removeAll();

        $user = $this->auth->createRole(User::ROLE_USER);
        $this->auth->add($user);

        $creator = $this->auth->createRole(User::ROLE_CREATOR);
        $this->auth->add($creator);
        $this->auth->addChild($creator, $user);

        $sales = $this->auth->createRole(User::ROLE_SALES);
        $this->auth->add($sales);
        $this->auth->addChild($sales, $creator);

        $manager = $this->auth->createRole(User::ROLE_MANAGER);
        $this->auth->add($manager);
        $this->auth->addChild($manager, $sales);

        $admin = $this->auth->createRole(User::ROLE_ADMINISTRATOR);
        $this->auth->add($admin);
        $this->auth->addChild($admin, $manager);
        /*$this->auth->addChild($admin, $sales);
        $this->auth->addChild($admin, $creator);
        $this->auth->addChild($admin, $user);*/

        $this->auth->assign($admin, 1);
        $this->auth->assign($manager, 2);
        $this->auth->assign($sales, 3);
        $this->auth->assign($creator, 4);
        $this->auth->assign($user, 5);
        $this->auth->assign($user, 6);
        $this->auth->assign($user, 7);
        $this->auth->assign($user, 8);
        $this->auth->assign($user, 9);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getRole(User::ROLE_ADMINISTRATOR));
        $this->auth->remove($this->auth->getRole(User::ROLE_MANAGER));
        $this->auth->remove($this->auth->getRole(User::ROLE_SALES));
        $this->auth->remove($this->auth->getRole(User::ROLE_CREATOR));
        $this->auth->remove($this->auth->getRole(User::ROLE_USER));
    }
}
