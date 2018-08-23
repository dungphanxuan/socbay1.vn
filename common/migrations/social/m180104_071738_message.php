<?php

use common\migrations\BaseMigration;

class m180104_071738_message extends BaseMigration
{
    public function up()
    {
        $this->createTable('social_message', [
            'id'         => $this->primaryKey(),
            'article_id' => $this->integer(),
            'seller_id'  => $this->integer(),
            'buyer_id'   => $this->integer(),
            'slug'       => $this->string(255),
            'title'      => $this->string(255)->notNull(),
            'body'       => $this->text()->notNull(),
            'view'       => $this->string(),
            'url'        => $this->string(),

            'sort_number'        => $this->smallInteger(1)->defaultValue(1),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path'     => $this->string(255),

            'is_spam'      => $this->smallInteger(1)->defaultValue(0),
            'status'       => $this->smallInteger(1)->defaultValue(1),
            'created_by'   => $this->integer(),
            'updated_by'   => $this->integer(),
            'published_at' => $this->integer(),
            'created_at'   => $this->integer(),
            'updated_at'   => $this->integer(),
        ]);


        // Index
        $this->createIndex(
            'idx-message_title',
            'social_message',
            'title'
        );
        $this->createIndex(
            'idx-message_status',
            'social_message',
            'status'
        );

        $this->addForeignKey('fk_message_author', 'social_message', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_message_updater', 'social_message', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m180104_071738_message cannot be reverted.\n";

        $this->dropTable('social_message');

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
