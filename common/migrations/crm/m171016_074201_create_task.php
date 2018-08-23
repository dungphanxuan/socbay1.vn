<?php

use common\migrations\BaseMigration;

class m171016_074201_create_task extends BaseMigration
{
    public function up()
    {
        $this->createTable('crm_task', [
            'id'                => $this->primaryKey(),
            'project_id'        => $this->integer(),
            'slug'              => $this->string(255),
            'title'             => $this->string(128)->notNull(),
            'body'              => $this->text()->notNull(),
            'excerpt'           => $this->text(),
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
        $this->createTable('d_task_pickup', [
            'id'          => $this->primaryKey(),
            'task_id'     => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-task_title',
            'crm_task',
            'title'
        );
        $this->createIndex(
            'idx-task_status',
            'crm_task',
            'status'
        );

        $this->addForeignKey('fk_task_author', 'crm_task', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_task_updater', 'crm_task', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m171016_074205_create_task cannot be reverted.\n";

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
