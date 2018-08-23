<?php

use yii\db\Migration;

class m170914_093521_create_log extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%web_log}}', [
            'id'           => $this->primaryKey(),
            'user_id'      => $this->integer(),
            'video_id'     => $this->integer(),
            'user_ip'      => $this->string(32),
            'action'       => $this->string(32),
            'url'          => $this->string(255),
            'time'         => $this->integer(),
            'execute_time' => $this->float(),
            'type'         => $this->smallInteger(6)->defaultValue(1),//1 Backend, 2 Frontend, 3 Video
        ]);
    }

    public function safeDown()
    {
        echo "m170914_093521_create_log cannot be reverted.\n";
        $this->dropTable('{{%web_log}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170914_093521_create_log cannot be reverted.\n";

        return false;
    }
    */
}
