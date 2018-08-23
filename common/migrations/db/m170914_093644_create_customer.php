<?php

use yii\db\Migration;

class m170914_093644_create_customer extends Migration
{
    public function safeUp()
    {

        $this->createTable('{{%customer_group}}', [
            'id'                 => $this->primaryKey(),
            'title'              => $this->string(64)->notNull(),
            'slug'               => $this->string(128),
            'user_id'            => $this->integer(),
            'parent_id'          => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path'     => $this->string(255),

            'sort_number' => $this->smallInteger()->defaultValue(0),
            'type'        => $this->smallInteger()->defaultValue(0),
            'status'      => $this->smallInteger()->defaultValue(0),
            'created_at'  => $this->integer(),
            'updated_at'  => $this->integer(),
        ]);

        //Customer
        $this->createTable('{{%customer}}', [
            'id'                 => $this->primaryKey(),
            'group_id'           => $this->integer(),
            'user_id'            => $this->integer(),
            'slug'               => $this->string(255),
            'fullname'           => $this->string(128)->notNull(),
            'body'               => $this->text(),
            'address'            => $this->string(255),
            'address1'           => $this->string(255),
            'address2'           => $this->string(255),
            'address3'           => $this->string(255),
            'mobile'             => $this->string(16),
            'url'                => $this->string(255),
            'info'               => $this->string(255),
            'code'               => $this->string(32),

            'city_id'     => $this->integer(),
            'district_id' => $this->integer(),
            'ward_id'     => $this->integer(),

            'lat' => $this->double(),
            'lng' => $this->double(),

            'sort_number'        => $this->smallInteger(1)->defaultValue(1),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path'     => $this->string(255),

            'status'       => $this->smallInteger(),
            'created_by'   => $this->integer(),
            'updated_by'   => $this->integer(),
            'published_at' => $this->integer(),
            'created_at'   => $this->integer(),
            'updated_at'   => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        echo "m170914_093644_create_customer cannot be reverted.\n";
        $this->dropTable('{{%customer_group}}');
        $this->dropTable('{{%customer}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170914_093644_create_customer cannot be reverted.\n";

        return false;
    }
    */
}
