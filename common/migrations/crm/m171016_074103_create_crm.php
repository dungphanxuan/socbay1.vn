<?php

use common\migrations\BaseMigration;

class m171016_074103_create_crm extends BaseMigration
{
    public function up()
    {
        $this->createTable('crm_crm', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(512)->notNull(),
            'title' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'excerpt' => $this->text()->notNull(),
            'view' => $this->string(),
            'url' => $this->string(),

            'featured' => $this->boolean()->notNull()->defaultValue(0),
            'comment_count' => $this->integer()->notNull()->defaultValue(0),
            'view_count' => $this->integer()->notNull()->defaultValue(0),

            'sort_number' => $this->smallInteger(1)->defaultValue(1),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path' => $this->string(255),

            'status' => $this->smallInteger(1)->defaultValue(1),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Project Pickup
        $this->createTable('d_crm_pickup', [
            'id' => $this->primaryKey(),
            'crm_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-crm_title',
            'crm_crm',
            'title'
        );
        $this->createIndex(
            'idx-crm_status',
            'crm_crm',
            'status'
        );

        $this->addForeignKey('fk_crm_author', 'crm_crm', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_crm_updater', 'crm_crm', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m171016_074103_create_crm cannot be reverted.\n";

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
