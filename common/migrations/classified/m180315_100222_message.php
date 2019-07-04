<?php

use common\migrations\BaseMigration;

class m180315_100222_message extends BaseMigration
{
    public function up()
    {
        $this->createTable('ads_messenger', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(512),
            'body' => $this->text()->notNull(),
            'excerpt' => $this->text(),
            'view' => $this->string(),
            'url' => $this->string(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'complete_on' => $this->integer(),

            'article_id' => $this->integer(),
            'from_id' => $this->integer(),
            'to_id' => $this->integer(),
            'cus_name' => $this->string(128),
            'cus_mobile' => $this->string(128),
            'cus_email' => $this->string(128),

            'city_id' => $this->smallInteger(),
            'district_id' => $this->integer(),
            'ward_id' => $this->integer(),

            'lat' => $this->double(),
            'lng' => $this->double(),

            'request_count' => $this->smallInteger()->defaultValue(0),
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
        $this->createTable('d_messenger_pickup', [
            'id' => $this->primaryKey(),
            'messenger_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-messenger_title',
            'ads_messenger',
            'title'
        );
        $this->createIndex(
            'idx-messenger_status',
            'ads_messenger',
            'status'
        );

        $this->addForeignKey('fk_messenger_author', 'ads_messenger', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_messenger_updater', 'ads_messenger', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m180315_100222_message cannot be reverted.\n";
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
