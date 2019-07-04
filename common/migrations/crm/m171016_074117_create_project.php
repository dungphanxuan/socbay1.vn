<?php

use common\migrations\BaseMigration;

class m171016_074117_create_project extends BaseMigration
{
    public function up()
    {
        $this->createTable('crm_project', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(512),
            'title' => $this->string(128)->notNull(),
            'body' => $this->text()->notNull(),
            'excerpt' => $this->text(),
            'note' => $this->text(),
            'view' => $this->string(),
            'url' => $this->string(),

            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'completed_on' => $this->integer(),
            'mark_completed_by' => $this->integer(),

            'featured' => $this->boolean()->defaultValue(0),
            'comment_count' => $this->integer()->defaultValue(0),
            'view_count' => $this->integer()->defaultValue(0),

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

        //Project attachment
        $this->createTable('crm_project_attachment', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'order' => $this->integer(),
            'safe_detection' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
        ]);

        //Project User
        $this->createTable('d_project_user', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Project Pickup
        $this->createTable('d_project_pickup', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-project_title',
            'crm_project',
            'title'
        );
        $this->createIndex(
            'idx-project_status',
            'crm_project',
            'status'
        );

        $this->addForeignKey('fk_project_author', 'crm_project', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_project_updater', 'crm_project', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m171016_074117_create_project cannot be reverted.\n";

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
