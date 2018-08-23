<?php

use yii\db\Migration;

/**
 * Class m180413_094517_create_seed
 */
class m180413_094517_create_seed extends Migration
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
        echo "m180413_094517_create_seed cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180413_094517_create_seed cannot be reverted.\n";

        return false;
    }
    */
}
