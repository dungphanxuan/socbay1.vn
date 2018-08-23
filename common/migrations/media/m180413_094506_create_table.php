<?php

use yii\db\Migration;

/**
 * Class m180413_094506_create_table
 */
class m180413_094506_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180413_094506_create_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180413_094506_create_table cannot be reverted.\n";

        return false;
    }
    */
}
