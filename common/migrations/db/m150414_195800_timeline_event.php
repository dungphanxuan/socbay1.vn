<?php

use yii\db\Migration;

class m150414_195800_timeline_event extends Migration
{
    public function up()
    {

        $this->createTable('{{%timeline_event}}', [
            'id' => $this->primaryKey(),
            'application' => $this->string(64)->notNull(),
            'category' => $this->string(64)->notNull(),
            'event' => $this->string(64)->notNull(),
            'data' => $this->text(),
            'created_at' => $this->integer()->notNull()
        ]);

        $this->createIndex('idx_created_at', '{{%timeline_event}}', 'created_at');

        $this->batchInsert(
            '{{%timeline_event}}',
            ['application', 'category', 'event', 'data', 'created_at'],
            [
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'webmaster', 'user_id' => 1, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'manager', 'user_id' => 2, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'sales', 'user_id' => 3, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'creator', 'user_id' => 4, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'user', 'user_id' => 5, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'user', 'user_id' => 6, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'user', 'user_id' => 7, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'user', 'user_id' => 8, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'user', 'user_id' => 9, 'created_at' => time()]), time()]
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%timeline_event}}');
    }
}
