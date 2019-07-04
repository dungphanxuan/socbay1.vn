<?php

use yii\db\Migration;

/**
 * Class m180409_011751_create_common
 */
class m180409_011751_create_common extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('med_common', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'key' => $this->string(8)->notNull(),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path' => $this->string(255),
            'thumbnail_base_url_data' => $this->string(128),
            'thumbnail_path_data' => $this->string(255),

            'type' => $this->smallInteger()->defaultValue(1),
            'status' => $this->smallInteger()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180409_011751_create_common cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180409_011751_create_common cannot be reverted.\n";

        return false;
    }
    */
}
