<?php
$config = [
    'homeUrl' => Yii::getAlias('@backendUrl'),
    'controllerNamespace' => 'backend\controllers',
    //'defaultRoute'        => 'timeline-event/index',
    'defaultRoute' => 'site/dashboard',

    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => env('BACKEND_BASE_URL')
        ],
        'user' => [
            'class' => yii\web\User::class,
            'identityClass' => common\models\User::class,
            'loginUrl' => ['sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'js' => ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js']
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'],
                ],
                'common\assets\AdminLte' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/'
                ],
                'common\assets\FontAwesome' => [
                    'sourcePath' => null,
                    'css' => ['https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',]
                ],
                'common\assets\Html5shiv' => [
                    'sourcePath' => null,
                    'js' => ['https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js',]
                ],
                'common\assets\Videojs' => [
                    'sourcePath' => null,
                    'css' => ['http://vjs.zencdn.net/6.2.4/video-js.css'],
                    'js' => ['http://vjs.zencdn.net/6.2.4/video.js'],
                ],
                'common\assets\Flot' => [
                    'sourcePath' => null,
                    'js' => ['https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.js']
                ],
                'common\assets\Ionicons' => [
                    'sourcePath' => null,
                    'css' => ['http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css']
                ],
                'dosamigos\chartjs\ChartJsAsset' => [
                    'sourcePath' => null,
                    'js' => ['https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js']
                ],
                'common\assets\SpinKit' => [
                    'sourcePath' => null,
                    'css' => ['https://cdnjs.cloudflare.com/ajax/libs/spinkit/1.2.5/spinkit.min.css',]
                ],
                'common\assets\JquerySlimScroll' => [
                    'sourcePath' => null,
                    'js' => ['https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js',]
                ],
                'common\assets\PaceAsset' => [
                    'sourcePath' => null,
                    'js' => ['https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',]
                ],
                'common\assets\Moment' => [
                    'sourcePath' => null,
                    'js' => ['https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js',]
                ],
                'common\assets\DateRangePicker' => [
                    'sourcePath' => null,
                    'css' => ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css'],
                    'js' => ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js']
                ],
                'trntv\filekit\widget\BlueimpFileuploadAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.3/'
                ],
                /* 'yii\web\JqueryAsset'                         => [
                     'sourcePath' => null,
                     'js'         => ['https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',]
                     //'js'         => ['https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',]
                 ],*/

            ],
        ],
    ],
    'modules' => [
        'i18n' => [
            'class' => backend\modules\i18n\Module::class,
            'defaultRoute' => 'i18n-message/index'
        ],
        'rbac' => [
            'class' => backend\modules\rbac\Module::class,
            'defaultRoute' => 'rbac-auth-item/index'
        ],
        'file' => [
            'class' => 'backend\modules\file\Module',
        ],
        'system' => [
            'class' => 'backend\modules\system\Module',
        ],
        'widget' => [
            'class' => backend\modules\widget\Module::class,
            'defaultRoute' => 'widget/index'
        ],
        'go' => [
            'class' => dungphanxuan\vnlocation\Module::class,
        ],
        'chart' => [
            'class' => backend\modules\chart\Module::class,
        ],
        'catalog' => [
            'class' => backend\modules\catalog\Module::class,
        ],
        'property' => [
            'class' => backend\modules\property\Module::class,
        ],
        'job' => [
            'class' => 'backend\modules\job\Module',
        ],
        'sale' => [
            'class' => backend\modules\sale\Module::class,
        ],
        'marketing' => [
            'class' => backend\modules\marketing\Module::class,
        ],
        'report' => [
            'class' => backend\modules\report\Module::class,
        ],
        'crm' => [
            'class' => backend\modules\crm\Module::class,
        ],
        'media' => [
            'class' => backend\modules\media\Module::class,
        ],
        'dev' => [
            'class' => backend\modules\dev\Module::class,
        ],
        'toolkit' => [
            'class' => backend\modules\toolkit\Module::class,
        ],
        'cloud' => [
            'class' => backend\modules\cloud\Module::class,
        ],
        'service' => [
            'class' => backend\modules\service\Module::class,
        ],
        'saas' => [
            'class' => backend\modules\saas\Module::class,
        ],
        'gridview' => ['class' => 'kartik\grid\Module'],
        'testing' => [
            'class' => backend\modules\testing\Module::class,
        ],
        'ads' => [
            'class' => 'backend\modules\ads\Module',
        ],
    ],
    'as globalAccess' => [
        'class' => common\behaviors\GlobalAccessBehavior::class,
        'rules' => [
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['?'],
                'actions' => ['login'],
                //'ips'         => ['27.72.100.105']
            ],
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['@'],
                'actions' => ['logout']
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'roles' => ['?', '@'],
                'actions' => ['error']
            ],
            [
                'controllers' => ['debug/default'],
                'allow' => true,
                'roles' => ['?'],
            ],
            [
                'controllers' => ['user'],
                'allow' => true,
                'roles' => ['administrator'],
            ],
            [
                'controllers' => ['user'],
                'allow' => false,
            ],
            [
                'allow' => true,
                'roles' => ['creator'],
            ]
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates')
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'backend'
            ]
        ]
    ];
}

return $config;
