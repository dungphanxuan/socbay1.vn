<?php
$config = [
    'controllerNamespace' => 'api\controllers',
    //'defaultRoute'        => 'site/index',
    'defaultRoute'        => 'site/web',
    'modules'             => [
        'docs' => \api\modules\docs\Module::class
    ],
    'components'          => [
        'response'     => [
            'format'        => yii\web\Response::FORMAT_JSON,
            'charset'       => 'UTF-8',
            'class'         => \api\components\ApiResponse::class,
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data'    => $response->data,
                    ];
                    //$response->statusCode = $response->statusResponseCode;
                }
            },
            'formatters'    => [
                \yii\web\Response::FORMAT_JSON => [
                    'class'       => yii\web\JsonResponseFormatter::class,
                    'prettyPrint' => YII_DEBUG,
                ],
            ],

        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'request'      => [
            'enableCookieValidation' => false,
            'enableCsrfValidation'   => false,
            'parsers'                => [
                'application/json' => yii\web\JsonParser::class,
            ]
        ],
        'user'         => [
            'identityClass'   => common\models\User::class,
            'enableAutoLogin' => false,
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapPluginAsset'          => [
                    'sourcePath' => null,
                    'js'         => [
                        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',
                        'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset'                => [
                    'sourcePath' => null,
                    'css'        => [
                        'https://cdnjs.cloudflare.com/ajax/libs/froala-design-blocks/1.0.2/css/froala_blocks.min.css',
                        'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'
                    ],
                ],
                'common\assets\FontAwesome'                   => [
                    'sourcePath' => null,
                    'css'        => [
                        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
                    ]
                ],
                'common\assets\Plyr'                          => [
                    'sourcePath' => null,
                    'baseUrl'    => 'https://cdn.plyr.io/2.0.17/'
                ],
                'common\assets\Html5shiv'                     => [
                    'sourcePath' => null,
                    'css'        => [
                        'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js',
                    ]
                ],
                'common\assets\JquerySlimScroll'              => [
                    'sourcePath' => null,
                    'js'         => [
                        'https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js',
                    ]
                ],
                'trntv\filekit\widget\BlueimpFileuploadAsset' => [
                    'sourcePath' => null,
                    'baseUrl'    => 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/'
                ],
                'yii\web\JqueryAsset'                         => [
                    'sourcePath' => null,
                    'js'         => ['https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',]
                ],

            ],
        ],
        'authClientCollection' => [
            'class'   => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class'          => yii\authclient\clients\Facebook::class,
                    'clientId'       => '142933663150789',
                    'clientSecret'   => 'dbcbee698d584525c463b17ee30f898c',
                    'scope'          => 'email,public_profile',
                    'attributeNames' => [
                        'name',
                        'email',
                        'first_name',
                        'last_name',
                    ]
                ]
            ]
        ],
    ],

];

return $config;
