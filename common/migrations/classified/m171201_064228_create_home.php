<?php

use common\migrations\BaseMigration;

class m171201_064228_create_home extends BaseMigration
{
    public function up()
    {
        $this->createTable('bus_ads', [
            'id'      => $this->primaryKey(),
            'title'   => $this->string(255)->notNull(),
            'slug'    => $this->string(255)->notNull(),
            'body'    => $this->text()->notNull(),
            'excerpt' => $this->text()->notNull(),
            'view'    => $this->string(),
            'url'     => $this->string(),

            'total_votes' => $this->integer()->defaultValue(0),
            'up_votes'    => $this->integer()->defaultValue(0),
            'rating'      => $this->double()->defaultValue(0),

            'featured'      => $this->boolean()->defaultValue(0),
            'comment_count' => $this->integer()->defaultValue(0),
            'view_count'    => $this->integer()->defaultValue(0),

            'sort_number'        => $this->smallInteger(1)->defaultValue(1),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path'     => $this->string(255),

            'status'       => $this->smallInteger(1)->defaultValue(1),
            'created_by'   => $this->integer(),
            'updated_by'   => $this->integer(),
            'published_at' => $this->integer(),
            'created_at'   => $this->integer(),
            'updated_at'   => $this->integer(),
        ]);

        //Project Pickup
        $this->createTable('d_ads_pickup', [
            'id'          => $this->primaryKey(),
            'ads_id'      => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-ads_title',
            'bus_ads',
            'title'
        );
        $this->createIndex(
            'idx-ads_status',
            'bus_ads',
            'status'
        );

        $this->addForeignKey('fk_ads_author', 'bus_ads', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_ads_updater', 'bus_ads', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m171201_064228_create_home cannot be reverted.\n";
        $this->dropTable('bus_ads');
        $this->dropTable('d_ads_pickup');
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
