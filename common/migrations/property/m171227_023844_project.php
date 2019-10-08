<?php

use common\migrations\BaseMigration;
use yii\helpers\Inflector;

class m171227_023844_project extends BaseMigration
{
    public function up()
    {
        //Diện tích
        $this->createTable('pm_project_area', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'title_en' => $this->string(64),
            'slug' => $this->string(128),
            'status' => $this->smallInteger(1)->defaultValue(1),
            'type' => $this->smallInteger(1)->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Price Giá
        //Triệu/Tháng
        $this->createTable('pm_project_price_unit', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'title_en' => $this->string(64),
            'slug' => $this->string(128),
            'status' => $this->smallInteger(1)->defaultValue(1), //Price About Project, Property
            'type' => $this->smallInteger(1)->defaultValue(1), //Price About Project, Property
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Price Giá
        $this->createTable('pm_project_price', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'title_en' => $this->string(64),
            'slug' => $this->string(128),
            'status' => $this->smallInteger(1)->defaultValue(1), //Price About Project, Property
            'type' => $this->smallInteger(1)->defaultValue(1), //Price About Project, Property
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Hạng
        $this->createTable('pm_project_rank', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'title_en' => $this->string(64),
            'slug' => $this->string(128),
            'status' => $this->smallInteger(1)->defaultValue(1),
            'type' => $this->smallInteger(1)->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Feature
        $this->createTable('pm_feature', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'title_en' => $this->string(64),
            'slug' => $this->string(128),
            'status' => $this->smallInteger(1)->defaultValue(1),
            'type' => $this->smallInteger(1)->defaultValue(1),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        $this->createTable('pm_project_category', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'title_en' => $this->string(128),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),

            'total' => $this->integer()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'type' => $this->smallInteger()->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Construction
        $this->createTable('pm_investor', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'title_en' => $this->string(128),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),

            'total' => $this->integer()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'type' => $this->smallInteger()->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Construction
        $this->createTable('pm_construction', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'title_en' => $this->string(128),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),

            'total' => $this->integer()->defaultValue(0),
            'sort_number' => $this->smallInteger()->defaultValue(0),
            'type' => $this->smallInteger()->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        //Project
        $this->createTable('pm_project', [
            'id' => $this->primaryKey(),
            'language_id' => $this->smallInteger(),
            'category_id' => $this->integer(),
            'type' => $this->smallInteger()->defaultValue(1),
            'slug' => $this->string(255),
            'title' => $this->string(128)->notNull(),
            'title_en' => $this->string(128),
            'body' => $this->text(),
            'short_des' => $this->text(),

            'investor_id' => $this->smallInteger(),
            'construction_id' => $this->smallInteger(),
            'scale_text' => $this->string(32),
            'complete_date' => $this->integer(),

            'address_text' => $this->string(128),
            'region_id' => $this->smallInteger(),
            'city_id' => $this->integer(),
            'district_id' => $this->integer(),
            'ward_id' => $this->integer(),
            'level' => $this->smallInteger()->defaultValue(1)->comment('Hạng'),
            'price_id' => $this->integer()->comment('Giá'),
            'price_unit_id' => $this->integer()->comment('Giá'),
            'price' => $this->bigInteger(12),
            'price_to' => $this->bigInteger(12),
            'num_of_rooms' => $this->smallInteger(4),
            'area_id' => $this->integer()->comment('Diện tích'),
            'rank_id' => $this->integer()->comment('Hạng'),

            'thumbnail_base_url' => $this->string(255),
            'thumbnail_path' => $this->string(255),
            'lat' => $this->double(),
            'lng' => $this->double(),

            'total_votes' => $this->integer()->defaultValue(0),
            'up_votes' => $this->integer()->defaultValue(0),
            'rating' => $this->double()->defaultValue(0),
            'featured' => $this->boolean()->defaultValue(0),

            'comment_count' => $this->integer()->defaultValue(0),
            'view_count' => $this->integer()->defaultValue(0),

            'score' => $this->integer(),
            'sort_number' => $this->smallInteger(1)->defaultValue(1),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);


        // Index
        $this->createIndex(
            'idx-project_title',
            'pm_project',
            'title'
        );
        $this->createIndex(
            'idx-project_status',
            'pm_project',
            'status'
        );
        $this->createIndex(
            'idx-project_nroom',
            'pm_project',
            'num_of_rooms'
        );

        //Project Pickup
        $this->createTable('pd_project_pickup', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger(1)->defaultValue(1),
            'project_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Project Investor
        $this->createTable('pd_project_investor', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger(1)->defaultValue(1),
            'investor_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Project Construction
        $this->createTable('pd_project_construction', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger(1)->defaultValue(1),
            'construction_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Project Feature
        $this->createTable('pm_d_project_feature', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'feature_id' => $this->integer()->notNull(),
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        $this->createTable('pm_project_attachment', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'title' => $this->string(),
            'sub_title' => $this->string(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'order' => $this->smallInteger(),
            'created_at' => $this->integer()
        ]);

        //
        $this->addForeignKey('fk_project_area', 'pm_project', 'area_id', 'pm_project_area', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_project_price', 'pm_project', 'price_id', 'pm_project_price', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_project_attachment_project', 'pm_project_attachment', 'project_id', 'pm_project', 'id', 'cascade', 'cascade');

        $tableName = 'pm_project';
        $this->execute('ALTER TABLE ' . $tableName . ' AUTO_INCREMENT=1001');

        //Seed Data

        //Project Area
        $dataArea = [
            'Dưới 10m2',
            '10m2 - 50m2',
            '50m2 - 100m2',
            '100m2 - 150m2',
            '150m2 - 200m2',
            '>200m2'
        ];
        foreach ($dataArea as $key => $item) {
            $this->insert('pm_project_area', [
                'id' => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'sort_number' => 0,
            ]);
        }

        //Seed Project Price Unit
        $dataPriceUnit = [
            'Trăm nghìn/tháng',
            'Triệu/tháng',
            'Trăm nghìn/m2/tháng',
            'Triệu/m2/tháng',
            'Nghìn/m2/tháng',
        ];

        foreach ($dataPriceUnit as $key => $item) {
            $this->insert('pm_project_price_unit', [
                'id' => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'sort_number' => 0,
            ]);
        }

        //Seed Project Price
        $dataPrice = [
            'Dưới 50 triệu',
            '50tr - 100tr',
            '100tr - 300tr',
            '300tr - 500tr',
            '500tr - 700tr',
            '700tr - 1tỷ',
            '1tỷ - 1,5tỷ',
            '1,5tỷ - 2tỷ',
            '2tỷ - 3tỷ',
            '3tỷ - 5tỷ',
            '>5tỷ'
        ];

        foreach ($dataPrice as $key => $item) {
            $this->insert('pm_project_price', [
                'id' => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'sort_number' => 0,
            ]);
        }

        //Seed Project rank
        $dataRank = ['Hạng 1', 'Hạng 2', 'Hạng 3'];
        foreach ($dataRank as $key => $item) {
            $this->insert('pm_project_rank', [
                'id' => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'sort_number' => 0,
            ]);
        }

        //Seed Project Category
        $dataPCategory = [
            'Chung cư',
            'Biệt thự, liền kề',
            'Văn phòng',
            'Đất nền',
            'Nhà phố',
            'Khu nghỉ dưỡng',
            'Khác'
        ];

        foreach ($dataPCategory as $key => $item) {
            $this->insert('pm_project_category', [
                'id' => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'sort_number' => 0,
            ]);
        }

        $dataFeature = [
            'Điều hòa', 'Tủ lạnh', 'Hồ bơi', 'Gym', 'Trường học',
            'Thư viện', 'Siêu thị'
        ];
        foreach ($dataFeature as $key => $item) {
            $this->insert('pm_feature', [
                'id' => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'sort_number' => 0,
            ]);
        }

        $dataProject = [
            ['Project HN', 2],
            ['Project HCM', 3]
        ];
        foreach ($dataProject as $key => $item) {
            $this->insert('pm_project', [
                'id' => $key + 1,
                'title' => $item[0],
                'slug' => Inflector::slug($item[0]),
                'city_id' => $item[1],
                'sort_number' => 0,
                'created_at' => time()
            ]);
        }
    }

    public function down()
    {
        echo "m171227_023844_project cannot be reverted.\n";
        $this->dropTable('pm_project_area');
        $this->dropTable('pm_project_price');
        $this->dropTable('pm_project_rank');
        $this->dropTable('pm_project_category');
        $this->dropTable('pm_project');

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
