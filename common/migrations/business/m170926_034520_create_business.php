<?php

class m170926_034520_create_business extends \common\migrations\BaseMigration
{
    public function safeUp()
    {
        $this->createTable('bus_business', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(512),
            'title' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'excerpt' => $this->text(),
            'comment' => $this->string(255),
            'view' => $this->string(),
            'url' => $this->string(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'complete_on' => $this->integer(),

            'city_id' => $this->smallInteger(),
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
        $this->createTable('d_business_pickup', [
            'id' => $this->primaryKey(),
            'business_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-business_title',
            'bus_business',
            'title'
        );
        $this->createIndex(
            'idx-business_status',
            'bus_business',
            'status'
        );

        $this->addForeignKey('fk_business_author', 'bus_business', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_business_updater', 'bus_business', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function safeDown()
    {
        echo "m170926_034520_create_business cannot be reverted.\n";
        $this->dropTable('bus_business');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170926_034520_create_business cannot be reverted.\n";

        return false;
    }
    */
}
