<?php
$config = [
    'name'           => 'Socbay Ads',
    'vendorPath'     => dirname(dirname(__DIR__)) . '/vendor',
    'extensions'     => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'sourceLanguage' => 'en-US',
    'timezone'       => 'Asia/Ho_Chi_Minh',
    'language'       => 'vi',
    'bootstrap'      => ['log'],
    'components'     => [

        'authManager' => [
            'class'           => yii\rbac\DbManager::class,
            'itemTable'       => '{{%rbac_auth_item}}',
            'itemChildTable'  => '{{%rbac_auth_item_child}}',
            'assignmentTable' => '{{%rbac_auth_assignment}}',
            'ruleTable'       => '{{%rbac_auth_rule}}'
        ],

        'slack' => [
            'class' => \common\components\SlackComponent::class,
            'url'   => env('Slack_Webhook_URL'),
        ],

        'vision' => [
            'class'      => \common\components\google\VisionComponent::class,
            'project_id' => 'valued-ceiling-167301',
        ],

        'cloudStorage' => [
            'class'      => \common\components\google\StorageComponent::class,
            'project_id' => env('GOOGLE_PROJECT_ID'),
            'bucket'     => env('GOOGLE_STORAGE_BUCKETNAME'),
        ],

        'fcm' => [
            'class'  => 'common\components\FcmComponent',
            'apiKey' => env('FCM_KEY'), // Server API Key
        ],

        'fileStack' => [
            'class'      => common\components\FilestackComponent::class,
            'api_key'    => env('FILESTACK_API_KEY'),
            'app_secret' => env('FILESTACK_API_SECRET'),
        ],

        'cloudinary'    => [
            'class'         => \common\components\cloud\CloudinaryComponent::class,
            'cloud_name'    => env('CLOUDINARY_NAME'),
            'api_key'       => env('CLOUDINARY_KEY'),
            'api_secret'    => env('CLOUDINARY_API_SECRET'),
            'cdn_subdomain' => true,//optional
            'useSiteDomain' => false,
        ],
        'redis'         => [
            'class'    => common\components\RedisConnection::class,
            //'class' => 'dcb9\redis\Connection',
            'hostname' => env('REDIS_HOST'),
            'port'     => env('REDIS_PORT'),
            'database' => 0,
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200'],
                // configure more hosts if you have a cluster
            ],
        ],

        'cache' => [
            'class'     => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache'
        ],

        'dcache' => [
            'class'     => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/dcache'
        ],

        'scache' => [
            'class'     => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/scache'
        ],

        'commandBus' => [
            'class'       => 'trntv\bus\CommandBus',
            'middlewares' => [
                [
                    'class'                  => '\trntv\bus\middlewares\BackgroundCommandMiddleware',
                    'backgroundHandlerPath'  => '@console/yii',
                    'backgroundHandlerRoute' => 'command-bus/handle',
                ]
            ]
        ],

        'formatter' => [
            //'class'                  => yii\i18n\Formatter::class,
            'class'                  => common\components\Formatter::class,
            // 'thousandSeparator' => '&thinsp;',
            'thousandSeparator'      => '.',
            'currencyCode'           => 'vnd',
            'numberFormatterOptions' => [
                NumberFormatter::MIN_FRACTION_DIGITS => 0,
                NumberFormatter::MAX_FRACTION_DIGITS => 2,
            ],

            //'dateFormat'        => 'yyyy.MM.dd',
        ],

        'glide'  => [
            'class'        => trntv\glide\components\Glide::class,
            'sourcePath'   => '@storage/web/source',
            'cachePath'    => '@storage/cache',
            'urlManager'   => 'urlManagerStorage',
            'maxImageSize' => env('GLIDE_MAX_IMAGE_SIZE'),
            'signKey'      => env('GLIDE_SIGN_KEY')
        ],

        /*'report' => [
            'class' => \kartik\report\Report::class,
            'apiKey' => 'nzmiaxpjkzjj7hdpns2isn35',
            // the following variables can be set to globally default your settings
            'templateId' => 1, // optional: the numeric identifier for your default global template
            'outputAction' =>  \kartik\report\Report::ACTION_FORCE_DOWNLOAD, // or Report::ACTION_GET_DOWNLOAD_URL
            'outputFileType' =>  \kartik\report\Report::OUTPUT_PDF, // or Report::OUTPUT_DOCX
            'outputFileName' => 'KrajeeReport.pdf', // a default file name if
            'defaultTemplateVariables' => [ // any default data you desire to always default
                'companyName' => 'Socbay Ads',
            ]
        ],*/
        'mailer' => [
            'class'            => yii\swiftmailer\Mailer::class,
            'useFileTransport' => false,
            'messageConfig'    => [
                'charset' => 'UTF-8',
                'from'    => ['dungphanxuan999@gmail.com' => 'Admin Socbay Ads'],
            ],
            //'viewPath' => '@common/mail',
            'transport'        => [
                'class'         => 'Swift_SmtpTransport',
                'host'          => 'smtp.gmail.com',
                'username'      => 'dungphanxuan999@gmail.com',
                'password'      => 'lnxxqdjyebjhqlbm',
                'port'          => '587',
                'encryption'    => 'tls',
                'streamOptions' => [
                    'ssl' => [
                        'verify_peer'      => false,
                        'verify_peer_name' => false,
                    ],
                ],
            ],
            /*'transport'        => [
                'class'      => 'Swift_SmtpTransport',
                'host'       => 'smtp.sendgrid.net',
                'username'   => 'apikey',
                'password'   => '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',
                'port'       => '587',
                'encryption' => 'tls',
            ],*/
        ],

        'mailerPhp' => [
            'class'            => yii\swiftmailer\Mailer::class,
            'useFileTransport' => true,
            'messageConfig'    => [
                'charset' => 'UTF-8',
                'from'    => ['admin@apppro.vn' => 'App Sender Name'],
            ],
            'transport'        => [
                'class' => 'Swift_SmtpTransport',
            ],
        ],
        'mailerSg'  => [
            'class'            => yii\swiftmailer\Mailer::class,
            'useFileTransport' => false,
            'messageConfig'    => [
                'charset' => 'UTF-8',
                'from'    => ['admin@apppro.vn' => 'App Sender Name'],
            ],
            'transport'        => [
                'class'      => 'Swift_SmtpTransport',
                'host'       => 'smtp.sendgrid.net',
                'username'   => 'apikey',
                'password'   => env('SENDGRID_API'),
                'port'       => '587',
                'encryption' => 'tls',
            ],
        ],

        'db' => [
            'class'               => yii\db\Connection::class,
            'dsn'                 => env('DB_DSN'),
            'username'            => env('DB_USERNAME'),
            'password'            => env('DB_PASSWORD'),
            'tablePrefix'         => env('DB_TABLE_PREFIX'),
            'charset'             => env('DB_CHARSET', 'utf8'),
            'enableSchemaCache'   => YII_ENV_PROD,
            'schemaCacheDuration' => \common\helpers\TimeHelper::SECONDS_IN_AN_HOUR,
            'schemaCache'         => 'cache',
        ],

        'mongodb' => [
            'class'   => '\yii\mongodb\Connection',
            'dsn'     => 'mongodb://@localhost:27017/mydatabase',
            'options' => [
                "username" => "Username",
                "password" => "Password"
            ]
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                'db' => [
                    'class'    => 'yii\log\DbTarget',
                    'levels'   => ['error', 'warning'],
                    'except'   => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix'   => function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;

                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars'  => [],
                    'logTable' => '{{%system_log}}'
                ]
            ],
        ],

        'i18n' => [
            'translations' => [
                'app' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                '*'   => [
                    'class'                 => 'yii\i18n\PhpMessageSource',
                    'basePath'              => '@common/messages',
                    'fileMap'               => [
                        'ads'      => 'ads.php',
                        'common'   => 'common.php',
                        'backend'  => 'backend.php',
                        'frontend' => 'frontend.php',
                    ],
                    'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation']
                ],
            ],
        ],

        'fileStorage' => [
            //'class'      => '\trntv\filekit\Storage',
            'class'      => \common\components\filekit\FileStorage::class,
            'baseUrl'    => '@storageUrl/web/source',
            'filesystem' => [
                'class' => 'common\components\filesystem\LocalFlysystemBuilder',
                'path'  => '@storage/web/source'
            ],
            'as log'     => [
                'class'     => 'common\behaviors\FileStorageLogBehavior',
                'component' => 'fileStorage'
            ]
        ],

        'keyStorage' => [
            'class'           => 'common\components\keyStorage\KeyStorage',
            'cachingDuration' => \common\helpers\TimeHelper::SECONDS_IN_A_DAY
        ],

        'queue' => [
            'class'     => yii\queue\db\Queue::class,
            'db'        => 'db', // DB connection component or its config
            'tableName' => '{{%queue}}', // Table name
            'channel'   => 'default', // Queue channel key
            'mutex'     => [
                'class' => yii\mutex\MysqlMutex::class, // Mutex that used to sync queries
                'db'    => 'db',
            ],
        ],

        'urlManagerApi'      => \yii\helpers\ArrayHelper::merge(
            [
                'baseUrl' => Yii::getAlias('@apiUrl')
            ],
            require(Yii::getAlias('@backend/config/_urlManager.php'))
        ),
        'urlManagerBackend'  => \yii\helpers\ArrayHelper::merge(
            [
                'baseUrl' => Yii::getAlias('@backendUrl')
            ],
            require(Yii::getAlias('@backend/config/_urlManager.php'))
        ),
        'urlManagerFrontend' => \yii\helpers\ArrayHelper::merge(
            [
                'baseUrl' => Yii::getAlias('@frontendUrl')
            ],
            require(Yii::getAlias('@frontend/config/_urlManager.php'))
        ),
        'urlManagerStorage'  => \yii\helpers\ArrayHelper::merge(
            [
                'baseUrl' => Yii::getAlias('@storageUrl')
            ],
            require(Yii::getAlias('@storage/config/_urlManager.php'))
        )
    ],
    'params'         => [
        'adminEmail'       => env('ADMIN_EMAIL'),
        'robotEmail'       => env('ROBOT_EMAIL'),
        'availableLocales' => [
            'vi'    => 'Tiếng Việt',
            'en-US' => 'English (US)'
        ],
        'maskMoneyOptions' => [
            'prefix'        => 'US$ ',
            'suffix'        => '',
            'affixesStay'   => true,
            'thousands'     => ',',
            'decimal'       => '.',
            'precision'     => 2,
            'allowZero'     => false,
            'allowNegative' => false,
        ],
        'gmapApiKey'       => 'AIzaSyCNmTfwkNfWBggiPp060J19KlvDbDiJUS0'
    ],
];

/*if (YII_ENV_PROD) {
    $config['components']['log']['targets']['email'] = [
        'class'   => 'yii\log\EmailTarget',
        'except'  => ['yii\web\HttpException:*'],
        'levels'  => ['error', 'warning'],
        'message' => ['from' => env('ROBOT_EMAIL'), 'to' => env('ADMIN_EMAIL')]
    ];
}*/

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module'
    ];

    $config['components']['cache'] = [
        'class' => 'yii\caching\DummyCache'
    ];
    /* $config['components']['mailer']['transport'] = [
         'class' => 'Swift_SmtpTransport',
         'host'  => env('SMTP_HOST'),
         'port'  => env('SMTP_PORT'),
     ];*/
}

return $config;
