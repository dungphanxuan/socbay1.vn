<?php

use common\migrations\BaseMigration;

class m180407_034600_create_assets extends BaseMigration
{
    public function up()
    {
        $this->createTable('ads_assets', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'key' => $this->string(64)->notNull(),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path' => $this->string(255),
            'thumbnail_base_url_data' => $this->string(128),
            'thumbnail_path_data' => $this->string(255),

            'type' => $this->smallInteger()->defaultValue(1),
            'status' => $this->smallInteger()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('ads_assets_attachment', [
            'id' => $this->primaryKey(),
            'assets_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk_assets_attachment_article', 'ads_assets_attachment', 'assets_id', 'ads_assets', 'id', 'cascade', 'cascade');

        //Seed data
        $dataAssets = [
            'logo',
            'banner'
        ];

        foreach ($dataAssets as $key => $item) {
            $this->insert('ads_assets', [
                //'id'          => $key + 1,
                'title' => $item,
                'slug' => \yii\helpers\Inflector::slug($item),
                'key' => $item,
                'sort_number' => 0,
            ]);
        }
    }

    public function down()
    {
        echo "m180407_034600_create_assets cannot be reverted.\n";
        $this->dropTable('ads_assets');
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
