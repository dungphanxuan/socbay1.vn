<?php

use common\migrations\BaseMigration;

class m171016_074205_create_todo extends BaseMigration
{
    public function up()
    {
        $this->createTable('crm_todo', [
            'id'                => $this->primaryKey(),
            'slug'              => $this->string(255)->notNull(),
            'title'             => $this->string(255)->notNull(),
            'body'              => $this->text()->notNull(),
            'excerpt'           => $this->text()->notNull(),
            'view'              => $this->string(),
            'url'               => $this->string(),
            'start_date'        => $this->integer(),
            'end_date'          => $this->integer(),
            'completed_on'      => $this->integer(),
            'mark_completed_by' => $this->integer(),

            'featured'      => $this->boolean()->defaultValue(0),
            'comment_count' => $this->integer()->defaultValue(0),
            'view_count'    => $this->integer()->defaultValue(0),

            'sort_number'        => $this->smallInteger(1)->defaultValue(1),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path'     => $this->string(255),

            'status'       => $this->smallInteger(1)->defaultValue(1),
            'created_by'   => $this->integer(),
            'updated_by'   => $this->integer(),
            'published_at' => $this->integer(),
            'created_at'   => $this->integer(),
            'updated_at'   => $this->integer(),
        ]);

        //Project Pickup
        $this->createTable('d_todo_pickup', [
            'id'          => $this->primaryKey(),
            'todo_id'     => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-todo_title',
            'crm_todo',
            'title'
        );
        $this->createIndex(
            'idx-todo_status',
            'crm_todo',
            'status'
        );

        $this->addForeignKey('fk_todo_author', 'crm_todo', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_todo_updater', 'crm_todo', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m171016_074205_create_todo cannot be reverted.\n";

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
