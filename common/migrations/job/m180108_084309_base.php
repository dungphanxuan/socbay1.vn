<?php

use common\migrations\BaseMigration;

/*
 * Job Data
 * Job type
 * Price range
 * Location
 * Company
 * Date post
 * Level
 *
 * */

class m180108_084309_base extends BaseMigration
{
    public function up()
    {
        //Job type
        $this->createTable('job_type', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string(64)->notNull(),
            'slug'        => $this->string(128),
            'status'      => $this->smallInteger(1)->defaultValue(1),
            'type'        => $this->smallInteger(1)->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Job level
        $this->createTable('job_level', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string(64)->notNull(),
            'slug'        => $this->string(128),
            'status'      => $this->smallInteger(1)->defaultValue(1),
            'type'        => $this->smallInteger(1)->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Job salary range
        $this->createTable('job_salary_range', [
            'id'          => $this->primaryKey(),
            'title'       => $this->string(64)->notNull(),
            'slug'        => $this->string(128),
            'status'      => $this->smallInteger(1)->defaultValue(1),
            'type'        => $this->smallInteger(1)->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        $this->createTable('job_category', [
            'id'                 => $this->primaryKey(),
            'title'              => $this->string(64)->notNull(),
            'slug'               => $this->string(128),
            'body'               => $this->text(),
            'parent_id'          => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path'     => $this->string(255),

            'total_article' => $this->integer()->defaultValue(0),
            'sort_number'   => $this->smallInteger()->defaultValue(0),
            'type'          => $this->smallInteger()->defaultValue(0),
            'status'        => $this->smallInteger()->defaultValue(0),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer(),

        ]);


        //Job type
        $dataJobType = [
            'Toàn thời gian',
            'Bán thời gian',
            'Thực tập',
            'Từ xa',
            'Hợp đồng',
            'Thời vụ',
        ];

        foreach ($dataJobType as $key => $item) {
            $this->insert('job_type', [
                'id'          => $key + 1,
                'title'       => $item,
                'slug'        => \yii\helpers\Inflector::slug($item),
                'status'      => 1,
                'type'        => 1,
                'sort_number' => 0
            ]);
        }

        $dataJobExperienceLevel = [
            'Mới tốt nghiệp',
            'Nhân viên',
            'Trưởng phòng',
            'Cấp quản lý điều hành',
        ];

        foreach ($dataJobExperienceLevel as $key => $item) {
            $this->insert('job_level', [
                'id'          => $key + 1,
                'title'       => $item,
                'slug'        => \yii\helpers\Inflector::slug($item),
                'status'      => 1,
                'type'        => 1,
                'sort_number' => 0
            ]);
        }

        $dataDatePost = [
            'Hôm nay',
            'Hôm qua',
            '7 ngày trước',
            '30 ngày trước',
            'Tháng này',
            'Tháng trước',
        ];

    }

    public function down()
    {
        echo "m180108_084309_base cannot be reverted.\n";
        $this->dropTable('job_type');
        $this->dropTable('job_salary_range');
        $this->dropTable('job_level');
        $this->dropTable('job_category');
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
