<?php

use common\migrations\BaseMigration;

class m180224_025623_support extends BaseMigration
{
    public function up()
    {
        $this->createTable('sup_topic_category', [
            'id'                 => $this->primaryKey(),
            'slug'               => $this->string(255),
            'title'              => $this->string(128)->notNull(),
            'body'               => $this->text(),
            'excerpt'            => $this->text(),
            'icon'               => $this->string(64),
            'color'              => $this->string(16),
            'parent_id'          => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path'     => $this->string(255),
            'sort_number'        => $this->smallInteger(2)->defaultValue(0),
            'status'             => $this->smallInteger()->defaultValue(0),
            'created_at'         => $this->integer(),
            'updated_at'         => $this->integer(),
        ]);

        $this->createTable('sup_topic', [
            'id'                 => $this->primaryKey(),
            'slug'               => $this->string(255),
            'title'              => $this->string(128)->notNull(),
            'body'               => $this->text()->notNull(),
            'view'               => $this->string(),
            'category_id'        => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path'     => $this->string(255),

            'total_votes'   => $this->integer()->defaultValue(0),
            'up_votes'      => $this->integer()->defaultValue(0),
            'rating'        => $this->double()->defaultValue(0),
            'featured'      => $this->boolean()->defaultValue(0),
            'comment_count' => $this->integer()->defaultValue(0),
            'view_count'    => $this->integer()->defaultValue(0),

            'sort_number'  => $this->smallInteger()->defaultValue(0),
            'status'       => $this->smallInteger()->defaultValue(0),
            'created_by'   => $this->integer(),
            'updated_by'   => $this->integer(),
            'published_at' => $this->integer(),
            'created_at'   => $this->integer(),
            'updated_at'   => $this->integer(),
        ]);

        $this->createTable('sup_topic_attachment', [
            'id'         => $this->primaryKey(),
            'topic_id'   => $this->integer()->notNull(),
            'path'       => $this->string()->notNull(),
            'base_url'   => $this->string(),
            'type'       => $this->string(),
            'size'       => $this->integer(),
            'name'       => $this->string(),
            'created_at' => $this->integer()
        ]);

        $this->createTable('sup_topic_pickup', [
            'id'          => $this->primaryKey(),
            'topic_id'    => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(2),
            'created_at'  => $this->integer()
        ]);

        $this->addForeignKey('fk_topic_attachment_topic', 'sup_topic_attachment', 'topic_id', 'sup_topic', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_topic_author', 'sup_topic', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_topic_updater', 'sup_topic', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('fk_topic_category', 'sup_topic', 'category_id', 'sup_topic_category', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_topic_category_section', 'sup_topic_category', 'parent_id', 'sup_topic_category', 'id', 'cascade', 'cascade');

        //Set data
        //Topic category
        $dataTopicCategory = [
            ['fa fa-file', 'Tasks and Projects', 'Description'],
            ['fa fa-cog', 'Account settings', 'Description'],
            ['fa fa-credit-card', 'Billing information', 'Description'],
            ['fa fa-user', 'Users and coworkers', 'Description'],
            ['fa fa-cloud-upload', 'Advanced options', 'Description'],
            ['fa fa-pencil-square-o', 'Customize this template', 'Description'],
            ['fa fa-mobile', 'Mobile', 'Description'],
            ['fa fa-search', 'Search & Discussions', 'Description'],
            ['fa fa-bar-chart', 'Reports & Clients', 'Description'],
        ];

        foreach ($dataTopicCategory as $key => $item) {
            $this->insert('sup_topic_category', [
                'id'          => $key + 1,
                'icon'        => $item[0],
                'title'       => $item[1],
                'slug'        => \yii\helpers\Inflector::slug($item[1]),
                'body'        => $item[2],
                'sort_number' => 0,
            ]);
        }
    }

    public function down()
    {
        echo "m180224_025623_suport cannot be reverted.\n";
        $this->dropForeignKey('fk_topic_attachment_topic', 'sup_topic_attachment');
        $this->dropForeignKey('fk_topic_author', 'sup_topic');
        $this->dropForeignKey('fk_topic_updater', 'sup_topic');
        $this->dropForeignKey('fk_topic_category', 'sup_topic');
        $this->dropForeignKey('fk_topic_category_section', 'sup_topic_category');
        $this->dropTable('sup_topic_attachment');
        $this->dropTable('sup_topic');
        $this->dropTable('sup_topic_category');
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
