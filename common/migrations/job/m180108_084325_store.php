<?php

use common\migrations\BaseMigration;

class m180108_084325_store extends BaseMigration
{
    public function up()
    {
        //Job store
    }

    public function down()
    {
        echo "m180108_084325_store cannot be reverted.\n";
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
