<?php

use yii\db\Migration;

class m150318_213934_file_storage_item extends Migration
{
    public function up()
    {

        $this->createTable('{{%file_storage_item}}', [
            'id'             => $this->primaryKey(),
            'component'      => $this->string()->notNull(),
            'base_url'       => $this->string(128)->notNull(),
            'path'           => $this->string(255)->notNull(),
            'storage_path'   => $this->string(255),
            'filestack_path' => $this->string(255),
            'type'           => $this->string(),
            'size'           => $this->integer(),
            'name'           => $this->string(),
            'article_id'     => $this->integer(),
            'is_check'       => $this->smallInteger()->defaultValue(0),
            'is_safe'        => $this->smallInteger()->defaultValue(1)->comment('Safe Image'),
            'source_type'    => $this->smallInteger()->defaultValue(1)->comment('Source Image'),
            'status'         => $this->smallInteger()->defaultValue(1),
            'user_id'        => $this->integer(),
            'created_by'     => $this->integer(),
            'upload_ip'      => $this->string(15),
            'created_at'     => $this->integer()->notNull()
        ]);

        // Index
        $this->createIndex(
            'idx-storage_item_path',
            '{{%file_storage_item}}',
            'path'
        );
        $this->createIndex(
            'idx-storage_item_status',
            '{{%file_storage_item}}',
            'status'
        );
    }

    public function down()
    {
        $this->dropTable('{{%file_storage_item}}');
    }
}
