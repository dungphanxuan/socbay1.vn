<?php

use common\migrations\BaseMigration;

class m180104_072337_customer extends BaseMigration
{
    public function up()
    {

    }

    public function down()
    {
        echo "m180104_072337_customer cannot be reverted.\n";
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
