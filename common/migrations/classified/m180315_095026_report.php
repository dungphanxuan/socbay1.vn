<?php

use common\migrations\BaseMigration;
use yii\helpers\Inflector;

class m180315_095026_report extends BaseMigration
{
    public function up()
    {
        $this->createTable('ads_report_reason', [
            'id'                 => $this->primaryKey(),
            'title'              => $this->string(255)->notNull(),
            'slug'               => $this->string(255),
            'body'               => $this->text(),
            'parent_id'          => $this->integer(),
            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path'     => $this->string(255),

            'type'        => $this->smallInteger()->defaultValue(1),
            'status'      => $this->smallInteger()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'created_at'  => $this->integer(),
            'updated_at'  => $this->integer(),
        ]);

        $this->createTable('ads_report', [
            'id'        => $this->primaryKey(),
            'reason_id' => $this->integer()->notNull(),
            'slug'      => $this->string(255),
            'title'     => $this->string(128),
            'body'      => $this->text(),

            'article_id' => $this->integer(),
            'user_id'    => $this->integer(),
            'user_email' => $this->string(128),

            'city_id'     => $this->integer(),
            'district_id' => $this->integer(),
            'ward_id'     => $this->integer(),

            'thumbnail_base_url' => $this->string(128),
            'thumbnail_path'     => $this->string(255),

            'status'      => $this->smallInteger()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'approve_by'  => $this->integer()->comment('Phê duyệt bởi'),
            'created_by'  => $this->integer(),
            'created_at'  => $this->integer(),
            'updated_at'  => $this->integer(),
        ]);


        $this->createTable('ads_report_attachment', [
            'id'         => $this->primaryKey(),
            'report_id'  => $this->integer()->notNull(),
            'path'       => $this->string()->notNull(),
            'base_url'   => $this->string(),
            'type'       => $this->string(),
            'size'       => $this->integer(),
            'name'       => $this->string(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk_report_attachment_report', 'ads_report_attachment', 'report_id', 'ads_report', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_report_category', 'ads_report', 'reason_id', 'ads_report_reason', 'id', 'cascade', 'cascade');

        //Seed data
        $dataReason = [
            'Sản phẩm không có sẵn',
            'Gian lận',
            'Nội dung lặp',
            'Nội dung spam',
            'Sai danh mục',
            'Khác'
        ];

        foreach ($dataReason as $key => $item) {
            $this->insert('ads_report_reason', [
                'id'          => $key + 1,
                'title'       => $item,
                'slug'        => Inflector::slug($item),
                'status'      => 1,
                'sort_number' => 0,
            ]);
        }
    }

    public function down()
    {
        echo "m180315_095026_report cannot be reverted.\n";
        $this->dropTable('ads_report_reason');
        $this->dropTable('ads_report');
        $this->dropTable('ads_report_attachment');
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
