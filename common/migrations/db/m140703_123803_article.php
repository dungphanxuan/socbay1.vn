<?php

use yii\db\Migration;

class m140703_123803_article extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey(),
            'language_id' => $this->smallInteger(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),
            'thumbnail_image_source' => $this->smallInteger()->defaultValue(1),

            'total_article' => $this->integer()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'type' => $this->smallInteger()->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%article_sub_category}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Category Field
        $this->createTable('{{%article_category_field}}', [
            'id' => $this->primaryKey(),
            'language_id' => $this->smallInteger(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),

            'sort_number' => $this->smallInteger()->defaultValue(0),
            'type' => $this->smallInteger()->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Article
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->smallInteger(),
            'language_id' => $this->smallInteger(),
            'slug' => $this->string(512),
            'title' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'body1' => $this->text(),
            'body2' => $this->text(),
            'excerpt' => $this->text(),
            'short_des' => $this->text(),
            'view' => $this->string(),
            'category_id' => $this->integer(),
            'sub_category_id' => $this->integer(),
            'resource_id' => $this->integer(),
            'feature_text' => $this->text(),

            'address_text' => $this->string(128),
            'city_id' => $this->smallInteger(),
            'district_id' => $this->integer(),
            'ward_id' => $this->integer(),
            'street_id' => $this->integer(),

            'type' => $this->smallInteger()->defaultValue(1),

            'condition_type' => $this->smallInteger(1)->defaultValue(0), //New, Used
            'add_type' => $this->smallInteger(1)->defaultValue(1), //Private, Business
            'price_type' => $this->smallInteger(1),
            'price' => $this->double(),
            'price_from' => $this->double(),
            'price_to' => $this->double(),
            'price_text' => $this->string(),
            'price_id' => $this->integer(),
            'is_negotiable' => $this->smallInteger(1)->defaultValue(0),

            'package_id' => $this->smallInteger(1),

            'total_votes' => $this->integer()->defaultValue(0),
            'up_votes' => $this->integer()->defaultValue(0),
            'rating' => $this->double()->defaultValue(0),
            'featured' => $this->boolean()->defaultValue(0),

            'comment_count' => $this->integer()->defaultValue(0),
            'view_count' => $this->integer()->defaultValue(0),

            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path' => $this->string(255),

            'lat' => $this->double(),
            'lng' => $this->double(),
            'public_from' => $this->integer(),
            'public_to' => $this->integer(),
            'public_flg' => $this->smallInteger(1),

            'is_approval' => $this->smallInteger(1),
            'is_hot' => $this->smallInteger(1),
            'score' => $this->integer(),
            'sort_number' => $this->integer()->defaultValue(0),
            'public_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'user_id' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Article Detail
        $this->createTable('{{%article_detail}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'body' => $this->text(),
            'phone' => $this->string(16),
            'email' => $this->string(32),
            'feature_text' => $this->text(),

            //Property
            'property_type' => $this->smallInteger(1), //Apartment
            'property_status' => $this->smallInteger(1), //Sell, rent
            'property_label' => $this->smallInteger(1), //Hotdeal
            'size' => $this->smallInteger(2),
            'bed' => $this->smallInteger(2),
            'bath' => $this->smallInteger(2)->comment('Phòng tắm'),
            'reception' => $this->integer(),
            'area' => $this->integer(),
            'available_from' => $this->integer(),
            'parking' => $this->smallInteger(),
            'document' => $this->smallInteger(),
            'deposit' => $this->smallInteger(),
            'video_url' => $this->smallInteger(),
            'year_build' => $this->smallInteger(),

            //Job
            'job_category' => $this->smallInteger(),
            'job_type' => $this->smallInteger(),
            'job_instruction' => $this->text(),
            'job_company_id' => $this->integer(),
            'job_store_id' => $this->integer(),
            'job_email' => $this->string(),
            'job_email2' => $this->string(),

            //Auto
            'year' => $this->integer(),
            'car_model' => $this->smallInteger(),
            'car_carry' => $this->smallInteger(),
            'condition' => $this->smallInteger(),
            'auto_type' => $this->smallInteger(),
            'auto_class' => $this->smallInteger(),

            //Fashion
            'fa_size' => $this->smallInteger(),
            'fa_color' => $this->smallInteger(),
            //Mobile
            'on_offer' => $this->smallInteger(1)->defaultValue(0),
            'price_offer' => $this->integer(),
            'start_price' => $this->integer(),
            'offers_text' => $this->text(),

            'path' => $this->string(),
            'base_url' => $this->string(),
            'filestack_path' => $this->string(),
            'storage_path' => $this->string(),
            'order' => $this->integer(),
            'type' => $this->smallInteger(1),
            'created_at' => $this->integer(),
        ]);

        //Article Feature
        $this->createTable('{{%d_article_feature}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'feature_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Article Revision
        $this->createTable('{{%article_revision}}', [
            'article_id' => $this->integer()->notNull(),
            'revision' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'excerpt' => $this->text(),

            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path' => $this->string(255),

            'tagNames' => $this->string(255),

            'category_id' => $this->integer()->notNull(),
            'yii_version' => $this->string(5),

            // note about what has changed
            'memo' => $this->string(255),

            'updater_id' => $this->integer(),
            'updated_at' => $this->integer(),

            'PRIMARY KEY (`article_id`,`revision`)',

        ]);
        $this->addForeignKey('fk-article_revision-article_id-article-id', '{{%article_revision}}', 'article_id', '{{%article}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-article_revision-updater_id-user-id', '{{%article_revision}}', 'updater_id', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');


        $this->createTable('{{%article_attachment}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'sub_title' => $this->string(),
            'path' => $this->string(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'order' => $this->integer(),
            'safe_detection' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
        ]);

        $this->createTable('{{%article_image}}', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'sub_title' => $this->string(),
            'path' => $this->string(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'order' => $this->integer(),
            'safe_detection' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
        ]);


        $this->createTable('{{%article_tags}}', [
            'id' => $this->primaryKey(),
            'frequency' => $this->integer()->defaultValue(0),
            'name' => $this->string(128),
            'slug' => $this->string(128),
        ]);

        $this->createTable('{{%article2article_tags}}', [
            'article_id' => $this->integer(),
            'article_tag_id' => $this->integer(),
        ]);

        $this->createTable('{{%category_field}}', [
            'category_id' => $this->integer()->notNull(),
            'field_id' => $this->integer(),
        ]);


        // Index
        $this->createIndex(
            'idx-article_title',
            '{{%article}}',
            'title'
        );
        $this->createIndex(
            'idx-article_status',
            '{{%article}}',
            'status'
        );

        $this->addForeignKey('article2article_tags_articles', '{{%article2article_tags}}', 'article_id', '{{%article}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('article2article_tags_articles_tags', '{{%article2article_tags}}', 'article_tag_id', '{{%article_tags}}', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('fk_article_attachment_article', '{{%article_attachment}}', 'article_id', '{{%article}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_article_image_article', '{{%article_image}}', 'article_id', '{{%article}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_article_author', '{{%article}}', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_article_updater', '{{%article}}', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('fk_article_category', '{{%article}}', 'category_id', '{{%article_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_article_sub_category', '{{%article}}', 'sub_category_id', '{{%article_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_article_category_section', '{{%article_category}}', 'parent_id', '{{%article_category}}', 'id', 'cascade', 'cascade');

        //Set start ID
        $tableName = Yii::$app->db->tablePrefix . 'article';
        $this->execute('ALTER TABLE ' . $tableName . ' AUTO_INCREMENT=10001');

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_article_attachment_article', '{{%article_attachment}}');
        $this->dropForeignKey('fk_article_author', '{{%article}}');
        $this->dropForeignKey('fk_article_updater', '{{%article}}');
        $this->dropForeignKey('fk_article_category', '{{%article}}');
        $this->dropForeignKey('fk_article_sub_category', '{{%article}}');
        $this->dropForeignKey('fk_article_category_section', '{{%article_category}}');

        $this->dropTable('{{%article_attachment}}');
        $this->dropTable('{{%article}}');
        $this->dropTable('{{%article_category}}');
    }
}
