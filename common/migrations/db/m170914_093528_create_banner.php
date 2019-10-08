<?php

use yii\db\Migration;

class m170914_093528_create_banner extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%banner}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'body' => $this->text(),
            'url' => $this->string(255),
            'sort_number' => $this->smallInteger(1)->defaultValue(1),

            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path' => $this->string(255),

            'status' => $this->smallInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        echo "m170914_093528_create_banner cannot be reverted.\n";
        $this->dropTable('{{%banner}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170914_093528_create_banner cannot be reverted.\n";

        return false;
    }
    */
}
