<?php

use common\migrations\BaseMigration;
use yii\helpers\Inflector;

class m180104_065459_package extends BaseMigration
{
    public function up()
    {
        $this->createTable('bus_package', [
            'id'      => $this->primaryKey(),
            'slug'    => $this->string(128),
            'title'   => $this->string(64)->notNull(),
            'body'    => $this->text(),
            'excerpt' => $this->text(),
            'view'    => $this->string(),
            'url'     => $this->string(),

            'price'        => $this->integer(),
            'day'          => $this->smallInteger(3),
            'promo_day'    => $this->smallInteger(3),
            'auto_renewal' => $this->smallInteger(3),
            'start_date'   => $this->integer(),
            'end_date'     => $this->integer(),

            'sort_number'        => $this->smallInteger(1)->defaultValue(1),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path'     => $this->string(255),

            'show_feature'     => $this->smallInteger(1)->defaultValue(0),
            'show_top'         => $this->smallInteger(1)->defaultValue(0),
            'promo_sign'       => $this->smallInteger(1)->defaultValue(0),
            'recommended_sign' => $this->smallInteger(1)->defaultValue(0),
            'status'           => $this->smallInteger(1)->defaultValue(1),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Project Pickup
        $this->createTable('d_package_pickup', [
            'id'          => $this->primaryKey(),
            'package_id'  => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        // Index
        $this->createIndex(
            'idx-package_title',
            'bus_package',
            'title'
        );
        $this->createIndex(
            'idx-package_status',
            'bus_package',
            'status'
        );

        //Seed data
        $dataPackage = [
            ['Basic Property', 0, 7, 0, 0, 1],
            ['Promo Property', 100, 30, 1, 1, 0],
            ['Top Property', 500, 60, 1, 1, 0],
        ];

        foreach ($dataPackage as $key => $item) {
            $this->insert('bus_package', [
                'id'           => $key + 1,
                'slug'         => Inflector::slug($item[0]),
                'title'        => $item[0],
                'price'        => $item[1],
                'day'          => $item[2],
                'show_feature' => $item[3],
                'show_top'     => $item[4],
                'status'       => $item[5],
                'created_at'   => time()
            ]);
        }
    }

    public function down()
    {
        echo "m180104_065459_package cannot be reverted.\n";

        $this->dropTable('bus_package');

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
