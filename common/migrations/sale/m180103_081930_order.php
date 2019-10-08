<?php

use common\migrations\BaseMigration;

class m180103_081930_order extends BaseMigration
{
    public function up()
    {

        $this->createTable('sale_order', [
            'id' => $this->primaryKey(),
            'language_id' => $this->smallInteger(3),
            'slug' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'excerpt' => $this->text(),
            'view' => $this->string(),
            'url' => $this->string(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'complete_on' => $this->integer(),

            'total_votes' => $this->integer()->defaultValue(0),
            'up_votes' => $this->integer()->defaultValue(0),
            'rating' => $this->double()->defaultValue(0),

            'featured' => $this->boolean()->defaultValue(0),
            'comment_count' => $this->integer()->defaultValue(0),
            'view_count' => $this->integer()->defaultValue(0),

            'sort_number' => $this->smallInteger(1)->defaultValue(1),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),

            'status' => $this->smallInteger(1)->defaultValue(1),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Article Detail
        $this->createTable('sale_order_detail', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'body' => $this->text(),
            'phone' => $this->string(16),
            'email' => $this->string(32),
            'feature_text' => $this->text(),
            'product_id' => $this->integer(),
            'product_price' => $this->integer(),
            'product_qty' => $this->smallInteger(6),


            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'order' => $this->integer(),
            'type' => $this->smallInteger(1),
            'created_at' => $this->integer(),
        ]);

        //Project Pickup
        $this->createTable('d_order_pickup', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-order_title',
            'sale_order',
            'title'
        );
        $this->createIndex(
            'idx-order_status',
            'sale_order',
            'status'
        );

        $this->addForeignKey('fk_order_author', 'sale_order', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_order_updater', 'sale_order', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m180103_081930_order cannot be reverted.\n";
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
