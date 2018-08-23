<?php

use common\migrations\BaseMigration;

class m171016_074359_create_other extends BaseMigration
{
    public function up()
    {
// note: when creating tables using $this->createTable(), pass $this->tableOptions as last parameter

    }

    public function down()
    {
        echo "m171016_074359_create_other cannot be reverted.\n";

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
