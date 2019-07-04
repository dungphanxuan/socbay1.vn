<?php

use common\migrations\BaseMigration;
use yii\helpers\Inflector;
use common\dictionaries\AdsType;

class m180312_020802_common extends BaseMigration
{
    public function up()
    {
        //Price Giá
        $this->createTable('ads_price_range', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'title_en' => $this->string(64),
            'slug' => $this->string(128),
            'type' => $this->smallInteger(1)->defaultValue(AdsType::PROPERTY), //Price About Project, Property
            'sub_cat' => $this->smallInteger(1)->defaultValue(0), //Price About Sub category of category
            'sort_number' => $this->smallInteger(1)->defaultValue(0),
        ]);

        //Seed data

        //Seed Property Price
        $dataProperty = [
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

        foreach ($dataProperty as $key => $item) {
            $this->insert('ads_price_range', [
                //'id'          => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'type' => AdsType::PROPERTY,
                'sort_number' => 0,
            ]);
        }

        //Property for rent
        $dataPropertyForRent = [
            'Dưới 2 triệu',
            'Từ 2 - 5 triệu',
            'Từ 5 - 15 triệu',
            'Từ 15- 50 triệu',
            'Trên 50 triệu',
        ];

        //Seed Auto Price
        $dataAuto = [
            'Dưới 10 triệu',
            'Từ 10 - 20 triệu',
            'Từ 20 - 40 triệu',
            'Từ 40 - 50 triệu',
            'Trên 50 triệu'
        ];

        foreach ($dataAuto as $key => $item) {
            $this->insert('ads_price_range', [
                //'id'          => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'type' => AdsType::AUTO,
                'sub_cat' => 2,
                'sort_number' => 0,
            ]);
        }

        //Seed Car Price
        $dataCar = [
            'Dưới 300 triệu',
            'Từ 300 - 600 triệu',
            'Từ 600 - 1 tỷ',
            'Từ 1 tỷ - 1,5 tỷ',
            'Từ 1,5 tỷ - 2 tỷ',
            'Trên 2 tỷ'
        ];

        foreach ($dataCar as $key => $item) {
            $this->insert('ads_price_range', [
                //'id'          => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'type' => AdsType::AUTO,
                'sub_cat' => 1,
                'sort_number' => 0,
            ]);
        }

        //Seed Mobile Price
        $dataMobile = [
            'Dưới 1 triệu',
            'Từ 1 - 3 triệu',
            'Từ3 - 7 triệu',
            'Từ 7 - 15 triệu',
            'Trên 15 triệu',
        ];

        foreach ($dataMobile as $key => $item) {
            $this->insert('ads_price_range', [
                //'id'          => $key + 1,
                'title' => $item,
                'slug' => Inflector::slug($item),
                'type' => AdsType::MOBILE,
                'sort_number' => 0,
            ]);
        }
    }

    public function down()
    {
        echo "m180312_020802_common cannot be reverted.\n";
        $this->dropTable('ads_price_range');
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
