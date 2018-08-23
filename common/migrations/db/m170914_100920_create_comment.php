<?php

use yii\db\Migration;

class m170914_100920_create_comment extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id'          => $this->primaryKey(),
            'user_id'     => $this->integer()->notNull(),
            'object_type' => $this->string(255)->notNull(),
            'object_id'   => $this->string(255)->notNull(),
            'text'        => $this->text()->notNull(),
            'total_votes' => $this->integer()->notNull()->defaultValue(0),
            'up_votes'    => $this->integer()->notNull()->defaultValue(0),
            'rating'      => $this->double()->notNull()->defaultValue(0),

            'status'     => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey('fk-comment-user_id-user-id', '{{%comment}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->createIndex('idx-comment-object_type-object_id', '{{%comment}}', ['object_type', 'object_id']);

    }

    public function safeDown()
    {
        echo "m170914_100920_create_comment cannot be reverted.\n";
        $this->dropTable('{{%comment}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170914_100920_create_comment cannot be reverted.\n";

        return false;
    }
    */
}
