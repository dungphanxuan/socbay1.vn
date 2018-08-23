<?php

use common\migrations\BaseMigration;

class m180104_072507_user_graph extends BaseMigration
{
    public function up()
    {
        //User Follow
        $this->createTable('d_user_follow', [
            'id'          => $this->primaryKey(),
            'user_id'     => $this->integer()->notNull(),
            'friend_id'   => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);
    }

    public function down()
    {
        echo "m180104_072507_user_graph cannot be reverted.\n";
        $this->dropTable('d_user_follow');

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
