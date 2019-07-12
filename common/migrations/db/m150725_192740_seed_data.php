<?php

use common\dictionaries\AdsType;
use common\models\Article;
use common\models\ArticleCategory;
use common\models\Page;
use common\models\User;
use yii\helpers\Inflector;
use yii\db\Migration;

class m150725_192740_seed_data extends Migration
{
    public function safeUp()
    {
        $getSecutity = Yii::$app->getSecurity();
        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'webmaster',
            'email' => 'webmaster@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('webmaster999123'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 2,
            'username' => 'manager',
            'email' => 'manager@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('manager999123'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 3,
            'username' => 'creator',
            'email' => 'creator@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('creator999123'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 4,
            'username' => 'sales',
            'email' => 'sales@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('sales999123'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 5,
            'username' => 'user',
            'email' => 'user@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('user999'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $this->insert('{{%user}}', [
            'id' => 6,
            'username' => 'user2',
            'email' => 'user2@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('user2999'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 7,
            'username' => 'user3',
            'email' => 'user3@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('user3999'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 8,
            'username' => 'user4',
            'email' => 'user4@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('user4999'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 9,
            'username' => 'user5',
            'email' => 'user5@example.com',
            'password_hash' => $getSecutity->generatePasswordHash('user5999'),
            'auth_key' => $getSecutity->generateRandomString(),
            'access_token' => $getSecutity->generateRandomString(40),
            'twofa_secret' => (new \Da\TwoFA\Manager())->generateSecretKey(),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);

        for ($i = 1; $i < 10; $i++) {
            if ($i == 1) {
                $this->insert('{{%user_profile}}', [
                    'user_id' => 1,
                    'locale' => 'vi',
                    //'locale'    => Yii::$app->sourceLanguage,
                    'firstname' => 'Dung',
                    'lastname' => 'Phan'
                ]);
            } else {
                $this->insert('{{%user_profile}}', [
                    'user_id' => $i,
                    'locale' => 'vi'
                ]);
            }
        }


        $this->insert('{{%page}}', [
            'slug' => 'about',
            'title' => 'About',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'view' => 'about',
            'status' => Page::STATUS_PUBLISHED,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $dataPage = [
            ['faq', 'faq'],
            ['terms-condition', 'terms-condition'],
            ['site-map', 'site-map'],
            ['help', 'help'],
            ['page', 'page'],
            ['coming-soon', 'coming-soon'],
            ['service', 'service'],
            ['seller', 'seller'],
            ['buyer', 'buyer'],
            ['partner', 'partner'],
            ['recruitment', 'recruitment'],
            ['testimonial', 'testimonial']
        ];

        foreach ($dataPage as $item) {
            $this->insert('{{%page}}', [
                'slug' => Inflector::slug($item[0]),
                'title' => $item[0],
                'body' => $item[0],
                'view' => $item[1],
                'status' => Page::STATUS_PUBLISHED,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }


        $dataArticleCategory = [
            [
                'Đồ điện tử', 'laptop-2.jpg',
                ['Điện thoại', 'Máy tính bảng', 'Laptop', 'Phụ kiện', 'Khác'],
                AdsType::MOBILE
            ],
            [
                'Bất động sản', 'house.jpg',
                ['Cho thuê', 'Mua bán', 'Khác'],
                AdsType::PROPERTY
            ],
            [
                'Xe cộ', 'car-2.jpg',
                ['Ô tô', 'Xe máy', 'Xe đạp', 'Khác'],
                AdsType::AUTO
            ],
            [
                'Thời trang', 'fashion.jpg',
                ['Thời trang nam', 'Thời trang nữ', 'Khác'],
                AdsType::FASHION
            ],
            ['Dịch vụ', 'service.jpg'],
            ['Nội ngoại thất', 'catalog.jpg'],
            [
                'Mẹ và bé', 'toy.jpg',
                ['Sữa và thực phẩm'],
                AdsType::KID
            ],
            [
                'Việc làm', 'jobs.jpg',
                ['Phổ thông', 'Ngành nghề'],
                AdsType::JOB
            ],
            [
                'Thể thao', 'sport.jpg',
                ['Gym']
            ],
            [
                'Văn phòng', 'office.jpg'
            ],
            [
                'Sách', 'book.jpg',
                ['Sách tiếng việt', 'Sách tiếng anh', 'Khác'],
                AdsType::BOOK
            ],
            [
                'Sự kiện', 'event.jpg',
                ['Học tập', 'Âm nhạc', 'Bất động sản', 'Game', 'Thể thao'],
                AdsType::EVENT
            ],
            [
                'Học trực tuyến', 'learning.jpg',
                ['E Learning'],
                AdsType::ONLINE
            ],
            //['Freelancer', 'freelancer.jpg'],
            [
                'Khác', 'other.jpg'
            ],

        ];

        $baseUrl = Yii::$app->fileStorage->baseUrl;
        $keyInc = 1;
        foreach ($dataArticleCategory as $key => $item) {
            $this->insert('{{%article_category}}', [
                'id' => $keyInc,
                'slug' => Inflector::slug($item[0]),
                'title' => $item[0],
                'sort_number' => $keyInc,
                'thumbnail_base_url' => $baseUrl,
                'thumbnail_path' => 'category/' . $item[1],
                'type' => isset($item[3]) ? $item[3] : null,
                'status' => ArticleCategory::STATUS_ACTIVE,
                'created_at' => time()
            ]);

            $parentKey = $keyInc;
            $keyInc++;
            if (isset($item[2])) {
                foreach ($item[2] as $keySub => $itemSub) {
                    $this->insert('{{%article_category}}', [
                        'id' => $keyInc,
                        'slug' => \yii\helpers\Inflector::slug($itemSub),
                        'title' => $itemSub,
                        'parent_id' => $parentKey,
                        'sort_number' => $keySub,
                        'type' => null,
                        'status' => \common\models\ArticleCategory::STATUS_ACTIVE,
                        'created_at' => time()
                    ]);
                    $keyInc++;
                }
            }
        }
        //Data Sub Category

        $this->insert('{{%article}}', [
            'slug' => 'iphone-x',
            'title' => 'Apple Iphone X',
            'category_id' => 1,
            'body' => 'Apple Iphone X 128G.',
            'thumbnail_base_url' => $baseUrl,
            'thumbnail_path' => 'image/' . 'note8.jpg',
            'price' => 1000000,
            'status' => Article::STATUS_PUBLISHED,
            'created_at' => time(),
            'updated_at' => time(),
        ]);


        $this->insert('{{%widget_menu}}', [
            'key' => 'frontend-index',
            'title' => 'Frontend index menu',
            'items' => json_encode([
                [
                    'label' => 'Get started with Yii2',
                    'url' => 'http://www.yiiframework.com',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-success">{label}</a>'
                ],
                [
                    'label' => 'Yii2 Starter Kit on GitHub',
                    'url' => 'https://github.com/trntv/yii2-starter-kit',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-primary">{label}</a>'
                ],
                [
                    'label' => 'Find a bug?',
                    'url' => 'https://github.com/trntv/yii2-starter-kit/issues',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-danger">{label}</a>'
                ]

            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'status' => \common\models\WidgetMenu::STATUS_ACTIVE
        ]);

        $this->insert('{{%widget_text}}', [
            'key' => 'backend_welcome',
            'title' => 'Welcome to backend',
            'body' => '<p>Welcome to Yii2 Starter Kit Dashboard</p>',
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%widget_text}}', [
            'key' => 'ads-example',
            'title' => 'Google Ads Example Block',
            'body' => '<div class="lead">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9505937224921657"
                     data-ad-slot="2264361777"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>',
            'status' => 0,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%widget_carousel}}', [
            'id' => 1,
            'key' => 'index',
            'status' => \common\models\WidgetCarousel::STATUS_ACTIVE
        ]);

        $this->insert('{{%widget_carousel_item}}', [
            'carousel_id' => 1,
            'base_url' => Yii::getAlias('@frontendUrl'),
            'path' => 'img/yii2-starter-kit.gif',
            'type' => 'image/gif',
            'url' => '/',
            'status' => 1
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.theme-skin',
            'value' => 'skin-blue',
            'comment' => 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow'
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-fixed',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-boxed',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-collapsed-sidebar',
            'value' => 1
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'frontend.maintenance',
            'value' => 'disabled',
            'comment' => 'Set it to "true" to turn on maintenance mode'
        ]);

        //Frontend Data
        $this->insert('{{%key_storage_item}}', [
            'key' => 'frontend.show_promo',
            'value' => 1,
            'comment' => 'Show box Promo'
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'frontend.show_top',
            'value' => 1,
        ]);
        //System Key
        $this->insert('{{%key_storage_item}}', [
            'key' => 'system.check_vision',
            'value' => 0,
        ]);

        //Pager size
        $this->insert('{{%key_storage_item}}', [
            'key' => 'list.adssize',
            'value' => 15,
        ]);

        $secret = (new \Da\TwoFA\Manager())->generateSecretKey();

        $this->insert('{{%key_storage_item}}', [
            'key' => '2fa.active',
            'value' => $secret,
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => '2fa.secret-key',
            'value' => $secret,
            'comment' => 'The secret key requires to be saved to later check with the input key from the user to implement the two-factor authentication (2FA).'
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'image_source',
            'value' => IMAGE_SOURCE_CLOUDINARY,
            'comment' => 'Image Source: Local, File Stack, Cloudinary'
        ]);

    }

    public function safeDown()
    {
        $this->delete('{{%key_storage_item}}', [
            'key' => 'frontend.maintenance'
        ]);

        $this->delete('{{%key_storage_item}}', [
            'key' => [
                'backend.theme-skin',
                'backend.layout-fixed',
                'backend.layout-boxed',
                'backend.layout-collapsed-sidebar',
            ],
        ]);

        $this->delete('{{%widget_carousel_item}}', [
            'carousel_id' => 1
        ]);

        $this->delete('{{%widget_carousel}}', [
            'id' => 1
        ]);

        $this->delete('{{%widget_text}}', [
            'key' => 'backend_welcome'
        ]);

        $this->delete('{{%widget_menu}}', [
            'key' => 'frontend-index'
        ]);

        $this->delete('{{%article_category}}', [
            'id' => 1
        ]);

        $this->delete('{{%page}}', [
            'slug' => 'about'
        ]);

        $this->delete('{{%user_profile}}', [
            'user_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9]
        ]);

        $this->delete('{{%user}}', [
            'id' => [1, 2, 3, 4, 5, 6, 7, 8, 9]
        ]);
    }
}
