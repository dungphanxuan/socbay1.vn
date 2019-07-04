<?php

use common\migrations\BaseMigration;

class m171107_071839_rating_table extends BaseMigration
{
    public function up()
    {
        $this->createTable('{{%rating}}', [
            'user_id' => $this->integer()->notNull(),
            'object_type' => $this->string(128)->notNull(),
            'object_id' => $this->integer()->notNull(),
            'rating' => $this->smallInteger()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'PRIMARY KEY(user_id, object_type, object_id)'
        ]);

        $this->addForeignKey('fk-rating-user_id-user-id', '{{%rating}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        echo "m171107_071839_rating_table cannot be reverted.\n";
        $this->dropTable('{{%rating}}');

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
