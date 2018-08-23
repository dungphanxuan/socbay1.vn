<?php

use yii\db\Migration;

class m170914_100711_create_star extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%star}}', [
            'user_id'     => $this->integer()->notNull(),
            'object_type' => $this->string(128)->notNull(),
            'object_id'   => $this->integer()->notNull(),
            'type'        => $this->smallInteger()->defaultValue(1),
            'star'        => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at'  => $this->dateTime()->notNull(),
            'PRIMARY KEY(user_id, object_type, object_id)'
        ]);
        $this->addForeignKey('fk-star-user_id-user-id', '{{%star}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }

    public function safeDown()
    {
        echo "m170914_100711_create_star cannot be reverted.\n";
        $this->dropTable('{{%star}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170914_100711_create_star cannot be reverted.\n";

        return false;
    }
    */
}
