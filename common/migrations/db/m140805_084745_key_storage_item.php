<?php

use yii\db\Migration;

class m140805_084745_key_storage_item extends Migration
{
    public function up()
    {
        $this->createTable('{{%key_storage_item}}', [
            'key' => $this->string(128)->notNull(),
            'value' => $this->text()->notNull(),
            'comment' => $this->string(255),
            'user_id' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()
        ]);

        $this->addPrimaryKey('pk_key_storage_item_key', '{{%key_storage_item}}', 'key');
        $this->createIndex('idx_key_storage_item_key', '{{%key_storage_item}}', 'key', true);
    }

    public function down()
    {
        $this->dropTable('{{%key_storage_item}}');
    }
}
