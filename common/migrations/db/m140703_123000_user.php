<?php

use common\models\User;
use yii\db\Migration;

class m140703_123000_user extends Migration
{
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id'            => $this->primaryKey(),
            'username'      => $this->string(32),
            'auth_key'      => $this->string(32)->notNull(),
            'access_token'  => $this->string(40)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'oauth_client'  => $this->string(),

            'oauth_client_user_id' => $this->string(),

            'email'        => $this->string(128)->notNull(),
            'twofa_secret' => $this->string(32),

            'post_count'     => $this->integer()->defaultValue(0),
            'login_time'     => $this->dateTime(),
            'login_attempts' => $this->integer()->notNull()->defaultValue(0),
            'login_ip'       => $this->string(39),

            'email_verified'  => $this->smallInteger()->defaultValue(0),
            'phone_verified'  => $this->smallInteger()->defaultValue(0),
            'otp_enable'      => $this->smallInteger()->defaultValue(0),
            'allow_published' => $this->smallInteger()->defaultValue(0),

            'valid_email' => $this->smallInteger(1)->defaultValue(0),
            'login_2fa'   => $this->smallInteger(1)->defaultValue(0),

            'status'     => $this->smallInteger()->defaultValue(User::STATUS_ACTIVE),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'logged_at'  => $this->integer()
        ]);

        $this->createTable('{{%user_profile}}', [
            'user_id'         => $this->primaryKey(),
            'displayname'     => $this->string(),
            'firstname'       => $this->string(),
            'middlename'      => $this->string(),
            'lastname'        => $this->string(),
            'bio'             => $this->text(),
            'avatar_path'     => $this->string(),
            'avatar_base_url' => $this->string(),


            'city_id'     => $this->integer(),
            'district_id' => $this->integer(),
            'ward_id'     => $this->integer(),

            'phone'        => $this->string(16),
            'phone2'       => $this->string(16),
            'address'      => $this->string(),
            'address2'     => $this->string(),
            'company_name' => $this->string(),
            'url'          => $this->string(),
            'facebook_url' => $this->string(),
            'public_email' => $this->string(),
            'locale'       => $this->string(32)->notNull(),
            'gender'       => $this->smallInteger(1),

            'member_type' => $this->smallInteger()->defaultValue(User::STATUS_ACTIVE)->comment('Shop'),
        ]);

        // Index
        $this->createIndex(
            'idx-user_username',
            '{{%user}}',
            'username'
        );
        $this->createIndex(
            'idx-user_status',
            '{{%user}}',
            'status'
        );

        $this->addForeignKey('fk_user', '{{%user_profile}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');

        //Set start ID
        $tableName = Yii::$app->db->tablePrefix . 'user';
        $this->execute('ALTER TABLE ' . $tableName . ' AUTO_INCREMENT=10001');
    }

    public function down()
    {
        $this->dropForeignKey('fk_user', '{{%user_profile}}');
        $this->dropTable('{{%user_profile}}');
        $this->dropTable('{{%user}}');
    }
}
