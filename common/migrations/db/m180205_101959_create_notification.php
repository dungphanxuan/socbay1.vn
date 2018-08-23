<?php

use common\migrations\BaseMigration;

class m180205_101959_create_notification extends BaseMigration
{
    public function up()
    {
        //Register Device ID, Token
        $this->createTable('app_device', [
            'id'         => $this->primaryKey(),
            'token'      => $this->string(),
            'type'       => $this->smallInteger(1),//Android IOS
            'status'     => $this->smallInteger(1)->defaultValue(1),
            'user_id'    => $this->integer(),
            'created_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-appdevice_status',
            'app_device',
            'type'
        );

        $this->addForeignKey('fk_appdevice_author', 'app_device', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');

        //FCM Topic
        $this->createTable('app_topic', [
            'id'         => $this->primaryKey(),
            'title'      => $this->string(32),
            'type'       => $this->smallInteger(1),
            'status'     => $this->smallInteger(1)->defaultValue(1),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
        ]);

        //Member in topic
        $this->createTable('app_user_topic', [
            'id'         => $this->primaryKey(),
            'user_id'    => $this->string(),
            'topic_id'   => $this->string(),
            'created_at' => $this->integer(),
        ]);


    }

    public function down()
    {
        echo "m180205_101959_create_notification cannot be reverted.\n";
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
