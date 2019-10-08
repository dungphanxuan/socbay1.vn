<?php

use common\migrations\BaseMigration;

class m171227_023906_event extends BaseMigration
{
    public function up()
    {
        $this->createTable('pm_event', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(512)->notNull(),
            'title' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'excerpt' => $this->text(),
            'view' => $this->string(),
            'url' => $this->string(),
            'date' => $this->integer(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'complete_on' => $this->integer(),

            'city_id' => $this->integer(),
            'district_id' => $this->integer(),
            'ward_id' => $this->integer(),

            'lat' => $this->double(),
            'lng' => $this->double(),

            'total_votes' => $this->integer()->defaultValue(0),
            'up_votes' => $this->integer()->defaultValue(0),
            'rating' => $this->double()->defaultValue(0),

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

        //Project Pickup
        $this->createTable('d_event_pickup', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-event_title',
            'pm_event',
            'title'
        );
        $this->createIndex(
            'idx-event_status',
            'pm_event',
            'status'
        );

        $this->addForeignKey('fk_event_author', 'pm_event', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_event_updater', 'pm_event', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');


    }

    public function down()
    {
        echo "m171227_023905_property cannot be reverted.\n";
        $this->dropTable('pm_event');

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
