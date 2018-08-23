<?php

use yii\db\Migration;

/**
 * Class m180413_094459_create_category
 */
class m180413_094459_create_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('med_media_category', [
            'id'                      => $this->primaryKey(),
            'title'                   => $this->string(255)->notNull(),
            'slug'                    => $this->string(255),
            'body'                    => $this->text(),
            'parent_id'               => $this->integer(),
            'key'                     => $this->string(8)->notNull(),
            'thumbnail_base_url'      => $this->string(128),
            'thumbnail_path'          => $this->string(255),
            'thumbnail_base_url_data' => $this->string(128),
            'thumbnail_path_data'     => $this->string(255),

            'type'        => $this->smallInteger()->defaultValue(1),
            'status'      => $this->smallInteger()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'created_at'  => $this->integer(),
            'updated_at'  => $this->integer(),
        ]);

        $this->createTable('med_media', [
            'id'                 => $this->primaryKey(),
            'source_id'          => $this->integer(),
            'slug'               => $this->string(255),
            'title'              => $this->string(255)->notNull(),
            'body'               => $this->text()->notNull(),
            'excerpt'            => $this->text(),
            'type'               => $this->smallInteger()->defaultValue(1), //1. Video 2. Photo 3. Book
            'view'               => $this->string(),
            'episode'            => $this->smallInteger()->comment('Tập film'),
            'category_id'        => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path'     => $this->string(255),
            'video_base_url'     => $this->string(255),
            'video_path'         => $this->string(255),
            'video_play_type'    => $this->smallInteger()->defaultValue(1), //1. Stream 2. Local File 3. Youtube 4. Vimeo
            'url_local'          => $this->string(255),
            'url_local1'         => $this->string(255),
            'url_local2'         => $this->string(255),
            'url_local3'         => $this->string(255),
            'url_local4'         => $this->string(255),
            'url_local5'         => $this->string(255),
            'url_streaming'      => $this->string(255),
            'youtube_id'         => $this->string(255),
            'youtube_url'        => $this->string(255),
            'vimeo_url'          => $this->string(255),

            'review_url'  => $this->string(255),
            'review_type' => $this->smallInteger(),//Youtubee, Local, Streaming

            'view_count'     => $this->integer()->defaultValue(1),
            'like_count'     => $this->integer()->defaultValue(1),
            'dislike_count'  => $this->integer()->defaultValue(1),
            'share_count'    => $this->integer()->defaultValue(1),
            'favorite_count' => $this->integer()->defaultValue(1),
            'comment_count'  => $this->integer()->defaultValue(1),
            'matched'        => $this->smallInteger(1)->defaultValue(0),
            'is_syn'         => $this->smallInteger(1)->defaultValue(0), //Trạng thái đã đồng bộ

            'min_total'  => $this->integer(),
            'next_id'    => $this->integer(),
            'preview_id' => $this->integer(),
            'order'      => $this->smallInteger(),

            'login_require' => $this->smallInteger()->defaultValue(0),
            'is_hot'        => $this->smallInteger()->defaultValue(0),
            'video_status'  => $this->smallInteger()->defaultValue(0),
            'status'        => $this->smallInteger()->defaultValue(0),
            'created_by'    => $this->integer(),
            'updated_by'    => $this->integer(),
            'published_at'  => $this->integer(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer(),
        ]);

        $this->createTable('med_media_attachment', [
            'id'         => $this->primaryKey(),
            'media_id'   => $this->integer()->notNull(),
            'path'       => $this->string()->notNull(),
            'base_url'   => $this->string(),
            'type'       => $this->string(),
            'size'       => $this->integer(),
            'name'       => $this->string(),
            'order'      => $this->integer(),
            'created_at' => $this->integer()
        ]);

        $this->createTable('med_media_detail', [
            'id'         => $this->primaryKey(),
            'media_id'   => $this->integer()->notNull(),
            'title'      => $this->string(),
            'body'       => $this->text(),
            'path'       => $this->string(),
            'base_url'   => $this->string(),
            'url'        => $this->string(),
            'created_at' => $this->integer()
        ]);;

        //Media Feature
        $this->createTable('med_media_feature', [
            'id'       => $this->primaryKey(),
            'media_id' => $this->integer()->notNull(),
            'order'    => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Tag table
        $this->createTable('med_media_tag', [
            'id'        => $this->primaryKey(),
            'frequency' => $this->integer(),
            'name'      => $this->string(32),
        ]);

        //Media tag
        $this->createTable('med_media_tag_assn', [
            'media_id' => $this->integer(),
            'tag_id'   => $this->integer(),
        ]);

        //Playlist table
        $this->createTable('med_media_playlist', [
            'id'         => $this->primaryKey(),
            'title'      => $this->string(64)->notNull(),
            'slug'       => $this->string(255)->notNull(),
            'type'       => $this->smallInteger(1)->defaultValue(1), // Kiểu hiển thị
            'status'     => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        //Playlist table
        $this->createTable('med_media_playlist_detail', [
            'id'          => $this->primaryKey(),
            'playlist_id' => $this->integer()->notNull(),
            'media_id'    => $this->integer()->notNull(),
            'order'       => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Creates index for column `name`
        $this->createIndex(
            'idx-media_title',
            'med_media',
            'title'
        );
        //Status
        $this->createIndex(
            'idx-media_status',
            'med_media',
            'status'
        );

        $this->addForeignKey('fk_media_attachment_media', 'med_media_attachment', 'media_id', 'med_media', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_media_author', 'med_media', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_media_updater', 'med_media', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('fk_media_category', 'med_media', 'category_id', 'med_media_category', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_media_category_section', 'med_media_category', 'parent_id', 'med_media_category', 'id', 'cascade', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180413_094459_create_category cannot be reverted.\n";
        $this->dropForeignKey('fk_media_attachment_media', 'med_media_attachment');
        $this->dropForeignKey('fk_media_author', 'med_media');
        $this->dropForeignKey('fk_media_updater', 'med_media');
        $this->dropForeignKey('fk_media_category', 'med_media');
        $this->dropForeignKey('fk_media_category_section', 'med_media_category');
        $this->dropTable('med_media_attachment');
        $this->dropTable('med_media');
        $this->dropTable('med_media_category');
        $this->dropTable('med_media_feature');
        $this->dropTable('med_media_tag_assn');
        $this->dropTable('med_media_tag');
        $this->dropTable('med_media_playlist');
        $this->dropTable('med_media_playlist_detail');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180413_094459_create_category cannot be reverted.\n";

        return false;
    }
    */
}
