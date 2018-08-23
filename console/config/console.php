<?php
return [
    'id'                  => 'console',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['queue'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap'       => [
        'command-bus'        => [
            'class' => 'trntv\bus\console\BackgroundBusController',
        ],
        'migrate'            => [
            'class'               => 'yii\console\controllers\MigrateController',
            'migrationPath'       => '@common/migrations/db',
            'migrationTable'      => '{{%system_db_migration}}',
            'templateFile'        => '@common/migrations/migration_template.php',
            'migrationNamespaces' => [
                'yii\queue\db\migrations',
            ],
        ],
        'rbac-migrate'       => [
            'class'          => 'console\controllers\RbacMigrateController',
            'migrationPath'  => '@common/migrations/rbac/',
            'migrationTable' => '{{%system_rbac_migration}}',
        ],
        'business-migrate'   => [
            'class'          => 'console\controllers\BusinessMigrateController',
            'migrationPath'  => '@common/migrations/business',
            'migrationTable' => '{{%system_business_migration}}',
            'templateFile'   => '@common/migrations/migration_template.php',
        ],
        'catalog-migrate'    => [
            'class'          => 'console\controllers\CatalogMigrateController',
            'migrationPath'  => '@common/migrations/catalog',
            'migrationTable' => '{{%system_catalog_migration}}',
        ],
        'media-migrate'      => [
            'class'          => 'console\controllers\MediaMigrateController',
            'migrationPath'  => '@common/migrations/media',
            'migrationTable' => '{{%system_media_migration}}',
        ],
        'classified-migrate' => [
            'class'          => 'console\controllers\ClassifiedMigrateController',
            'migrationPath'  => '@common/migrations/classified',
            'migrationTable' => '{{%system_classified_migration}}',
        ],
        'property-migrate'   => [
            'class'          => 'console\controllers\PropertyMigrateController',
            'migrationPath'  => '@common/migrations/property',
            'migrationTable' => '{{%system_property_migration}}',
        ],
        'job-migrate'        => [
            'class'          => 'console\controllers\JobMigrateController',
            'migrationPath'  => '@common/migrations/job',
            'migrationTable' => '{{%system_job_migration}}',
            'templateFile'   => '@common/migrations/migration_template.php',
        ],
        'sale-migrate'       => [
            'class'          => 'console\controllers\SaleMigrateController',
            'migrationPath'  => '@common/migrations/sale',
            'migrationTable' => '{{%system_sale_migration}}',
        ],
        'marketing-migrate'  => [
            'class'          => 'console\controllers\MarketingMigrateController',
            'migrationPath'  => '@common/migrations/marketing',
            'migrationTable' => '{{%system_marketing_migration}}',
        ],
        'report-migrate'     => [
            'class'          => 'console\controllers\ReportMigrateController',
            'migrationPath'  => '@common/migrations/report',
            'migrationTable' => '{{%system_report_migration}}',
        ],
        'crm-migrate'        => [
            'class'          => 'console\controllers\CrmMigrateController',
            'migrationPath'  => '@common/migrations/crm',
            'migrationTable' => '{{%system_crm_migration}}',
        ],
        'social-migrate'     => [
            'class'          => 'console\controllers\SocialMigrateController',
            'migrationPath'  => '@common/migrations/social',
            'migrationTable' => '{{%system_social_migration}}',
        ],
        'location-import'    => [
            'class' => \dungphanxuan\vnlocation\commands\ImportController::class,
        ],
    ],
    'components'          => [
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
    ]
];
