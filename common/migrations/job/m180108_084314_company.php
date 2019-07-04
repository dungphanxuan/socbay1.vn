<?php

use common\migrations\BaseMigration;

class m180108_084314_company extends BaseMigration
{
    public function up()
    {
        //Job type
        $this->createTable('job_company_size', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'slug' => $this->string(128),
            'status' => $this->smallInteger(1)->defaultValue(1),
            'type' => $this->smallInteger(1)->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        $this->createTable('job_company', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->comment('Danh mục'),
            'size_id' => $this->smallInteger(),
            'contact_id' => $this->integer(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'title_en' => $this->string(128),
            'title_short' => $this->string(128),
            'body' => $this->text(),
            'excerpt' => $this->text(),
            'view' => $this->string(),
            'url' => $this->string(),
            'address' => $this->string(),
            'website' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'complete_on' => $this->integer(),
            'textbox_1' => $this->text(),
            'textbox_2' => $this->text(),
            'textbox_3' => $this->text(),
            'textbox_4' => $this->text(),
            'textbox_5' => $this->text(),

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

            'banner_base_url' => $this->string(128),
            'banner_path' => $this->string(255),

            'thumbnail_base_url1' => $this->string(128),
            'thumbnail_path1' => $this->string(255),

            'type' => $this->smallInteger(1)->defaultValue(1),
            'status' => $this->smallInteger(1)->defaultValue(1),
            'user_id' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('job_company_attachment', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'order' => $this->smallInteger(),
            'created_at' => $this->integer()
        ]);

        //Company Pickup
        $this->createTable('d_company_pickup', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Company Member
        $this->createTable('d_company_member', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'member_id' => $this->integer()->notNull(),
            'role' => $this->smallInteger()->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        $this->createTable('d_company_location', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'location_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        $this->createTable('d_company_category', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-company_title',
            'job_company',
            'title'
        );
        $this->createIndex(
            'idx-company_status',
            'job_company',
            'status'
        );

        $this->addForeignKey('fk_company_attachment_job', 'job_company_attachment', 'company_id', 'job_company', 'id', 'cascade', 'cascade');

        $this->addForeignKey('fk_company_author', 'job_company', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_company_updater', 'job_company', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');

    }

    public function down()
    {
        echo "m180108_084314_company cannot be reverted.\n";
        $this->dropTable('job_company');
        $this->dropTable('d_company_pickup');
        $this->dropTable('d_company_member');
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
