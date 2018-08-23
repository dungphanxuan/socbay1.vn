<?php
$config = [
    'homeUrl'             => Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    //'defaultRoute' => 'site/index',
    'defaultRoute'        => 'ads/index',
    'bootstrap'           => [
        'maintenance',
        'frontend\components\DynaRoute'
    ],
    'modules'             => [
        'user'    => [
            'class'             => frontend\modules\user\Module::class,
            'shouldBeActivated' => false,
            'enableLoginByPass' => true,
        ],
        'go'      => [
            'class'       => dungphanxuan\vnlocation\Module::class,
            'as frontend' => frontend\filters\LocationFilter::class,
        ],
        'catalog' => [
            'class' => 'frontend\modules\catalog\Module',
        ],
        'demo'    => [
            'class' => 'frontend\modules\demo\Module',
        ],
        'media'   => [
            'class' => 'frontend\modules\media\Module',
        ],
        'jobc'    => [
            'class' => 'frontend\modules\job\Module',
        ],
        'sale'    => [
            'class' => 'frontend\modules\sale\Module',
        ],
        'testing' => [
            'class' => 'frontend\modules\testing\Module',
        ],
    ],
    'components'          => [
        'authClientCollection' => [
            'class'   => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class'          => yii\authclient\clients\Facebook::class,
                    'clientId'       => env('FACEBOOK_CLIENT_ID'),
                    'clientSecret'   => env('FACEBOOK_CLIENT_SECRET'),
                    'scope'          => 'email,public_profile',
                    'attributeNames' => [
                        'name',
                        'email',
                        'first_name',
                        'last_name',
                        'picture'
                    ]
                ]
            ]
        ],
        'errorHandler'         => [
            'errorAction' => 'site/error'
        ],
        'maintenance'          => [
            'class'   => common\components\maintenance\Maintenance::class,
            'enabled' => function ($app) {
                if (env('APP_MAINTENANCE') === '1') {
                    return true;
                }

                return $app->keyStorage->get('frontend.maintenance') === 'enabled';
            }
        ],
        'request'              => [
            //'baseUrl' => 'https://socbay1.vn',
            //'hostInfo' => 'https://socbay1.vn',
            'cookieValidationKey' => env('FRONTEND_COOKIE_VALIDATION_KEY')
        ],
        'user'                 => [
            'class'           => yii\web\User::class,
            'identityClass'   => common\models\User::class,
            'loginUrl'        => ['/user/sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin'   => common\behaviors\LoginTimestampBehavior::class
        ],
        'session'              => [
            'name'     => 'PHPFRONTSESSID',
            'savePath' => sys_get_temp_dir(),
        ],
        'assetManager'         => [
            'appendTimestamp' => true,
            'bundles'         => [
                'yii\bootstrap\BootstrapPluginAsset'          => false,
                'yii\bootstrap\BootstrapAsset'                => false,
                'common\assets\Html5shiv'                     => [
                    'sourcePath' => null,
                    'js'         => ['https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js'],
                ],
                'common\assets\LightGallery'                  => [
                    'sourcePath' => null,
                    'baseUrl'    => 'https://cdn.jsdelivr.net/npm/lightgallery.js@1.0.1/dist/'
                ],
                'common\assets\Clipboard'                     => [
                    'sourcePath' => null,
                    'js'         => ['https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js'],
                ],
                'common\assets\Ladda'                         => [
                    'sourcePath' => null,
                    'baseUrl'    => 'https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.5/'
                ],
                'common\assets\Videojs'                       => [
                    'sourcePath' => null,
                    'css'        => ['http://vjs.zencdn.net/5.19.2/video-js.css'],
                    'js'         => ['http://vjs.zencdn.net/5.19.2/video.js'],
                ],
                'common\assets\MagnificPopup'                 => [
                    'sourcePath' => null,
                    'css'        => ['https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css'],
                    'js'         => ['https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'],
                ],
                'common\assets\JquerySlimScroll'              => [
                    'sourcePath' => null,
                    'js'         => [
                        'https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js',
                    ]
                ],
                'common\assets\FontAwesome'                   => [
                    'sourcePath' => null,
                    'css'        => ['https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',]
                ],
                'common\assets\MithrilJs'                     => [
                    'sourcePath' => null,
                    'js'         => ['https://unpkg.com/mithril/mithril.js',]
                ],
                'trntv\filekit\widget\BlueimpFileuploadAsset' => [
                    'sourcePath' => null,
                    'baseUrl'    => 'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.3/'
                ],
                /* 'yii\web\JqueryAsset'                => [
                     'js' => [
                         'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'
                     ]
                 ],*/
                'common\assets\Tether'                        => [
                    'sourcePath' => null,
                    'js'         => ['https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js']
                ],
                'common\assets\BxSlider'                      => [
                    'sourcePath' => null,
                    'baseUrl'    => 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/'
                ],

                /*       'yii\validators\ValidationAsset'              => false,
                       'yii\web\YiiAsset'                            => false,
                       'yii\widgets\ActiveFormAsset'                 => false,
                       'yii\bootstrap\BootstrapPluginAsset'          => false,
                       'yii\web\JqueryAsset'                         => false,
                       'dosamigos\selectize\SelectizeAsset'          => [
                           'depends' => [
                               \frontend\assets\ModernAsset::class,
                           ],
                       ],
                       'yii\jui\JuiAsset'                            => [
                           'depends' => [
                               \frontend\assets\ModernAsset::class,
                           ],
                       ],
                       'yii\grid\GridViewAsset'                      => [
                           'depends' => [
                               \frontend\assets\ModernAsset::class,
                           ],
                       ],
                       'froala\froalaeditor\FroalaEditorAsset'       => [
                           'depends' => [
                               \frontend\assets\ModernAsset::class,
                           ],
                       ],
                       'yii\authclient\widgets\AuthChoiceAsset'      => false, //authchoice.js
                       'yii\authclient\widgets\AuthChoiceStyleAsset' => false, //authchoice.css
              */],
        ],
        'view'                 => [
            'class' => 'frontend\components\AppView',
        ],
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class'           => 'yii\gii\generators\crud\Generator',
                'messageCategory' => 'frontend'
            ]
        ]
    ];
}

return $config;
