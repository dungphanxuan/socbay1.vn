<?php

use common\migrations\BaseMigration;

/*
 * List table
 * Job Feature
 * Property Type
 * Property
 *
 * */

class m140703_123802_category extends BaseMigration
{
    public function up()
    {
// note: when creating tables using $this->createTable(), pass $this->tableOptions as last parameter

    }

    public function down()
    {
        echo "m171201_070742_category cannot be reverted.\n";

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
