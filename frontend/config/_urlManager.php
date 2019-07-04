<?php

//use Sitemaped\Sitemap;

return [
    'class'           => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName'  => false,
    //'enableStrictParsing' => true,
    'normalizer'      => [
        'class'  => 'yii\web\UrlNormalizer',
        // use temporary redirection instead of permanent for debugging
        'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
    ],
    'rules'           => [
        //static pages
        ['pattern' => 'page/<slug>', 'route' => 'page/view'],

        //Site
        [
            'pattern'    => 'site/index',
            'route'      => 'site/index',
            'suffix'     => '/',
            'normalizer' => false,
        ],

        // Articles
        ['pattern' => 'article/index/<page:\d+>', 'route' => 'article/index'],
        ['pattern' => 'article/index', 'route' => 'article/index'],
        ['pattern' => 'article/attachment-download', 'route' => 'article/attachment-download'],
        ['pattern' => 'article/<slug>', 'route' => 'article/view'],

        // Ads
        ['pattern' => 'chuyen-muc/<cslug>/<page:\d+>', 'route' => 'ads/index'],
        ['pattern' => 'chuyen-muc/<cslug>', 'route' => 'ads/index'],
        ['pattern' => 'chuyen-muc/<cslug>/<csubslug>/<page:\d+>', 'route' => 'ads/index'],
        ['pattern' => 'chuyen-muc/<cslug>/<csubslug>', 'route' => 'ads/index'],

        /*[
            'pattern'    => '/',
            'route'      => 'ads/index',
            'suffix'     => '/',
            'normalizer' => false,
        ],*/
        ['pattern' => 'ads/index/<page:\d+>', 'route' => 'ads/index'],
        //['pattern' => 'ads/update', 'route' => 'ads/update'],
        //['pattern' => 'ads/attachment-download', 'route' => 'ads/attachment-download'],
        ['pattern' => 'ads/<id:\d+>/<name>', 'route' => 'ads/view'],
        ['pattern' => 'ads/<id:\d+>', 'route' => 'ads/view'],
        //['pattern' => 'dang-tin', 'route' => 'ads/create'],
        'ads/<action:[\w-]+>'       => 'ads/<action>',

        //Property

        ['pattern' => 'property/project/<page:\d+>', 'route' => 'property/project'],
        ['pattern' => 'property/project/<id:\d+>/<name>', 'route' => 'property/project-view'],
        ['pattern' => 'property/project/<id:\d+>', 'route' => 'property/project-view'],

        //Job
        ['pattern' => 'viec-lam', 'route' => 'job/index'],
        ['pattern' => 'jobs/<id:\d+>/<name>', 'route' => 'job/view'],
        ['pattern' => 'jobs/<id:\d+>', 'route' => 'job/view'],

        ['pattern' => 'jobs/company/<id:\d+>/<name>', 'route' => 'job/company-profile'],
        ['pattern' => 'jobs/company/<id:\d+>', 'route' => 'job/company-profile'],
        'jobs/<action:[\w-]+>'      => 'job/<action>',

        //Event
        //['pattern' => 'su-kien', 'route' => 'event/index'],

        //Blog
        ['pattern' => 'blog/index/<page:\d+>', 'route' => 'blog/index'],
        ['pattern' => 'blog/<id:\d+>/<name>', 'route' => 'blog/view'],
        ['pattern' => 'blog/<id:\d+>', 'route' => 'blog/view'],
        'blog/<action:[\w-]+>'      => 'blog/<action>',

        //Media
        ['pattern' => 'media/index/<page:\d+>', 'route' => 'media/default/index'],
        ['pattern' => 'media/<id:\d+>/<name>', 'route' => 'media/default/view'],
        ['pattern' => 'media/<id:\d+>', 'route' => 'media/default/view'],
        'media/<action:[\w-]+>'     => 'media/default/<action>',

        //Blog
        ['pattern' => 'support/<id:\d+>/<name>', 'route' => 'support/topic'],
        ['pattern' => 'support/<id:\d+>', 'route' => 'support/topic'],
        'support/<action:[\w-]+>'   => 'support/<action>',

        //User
        ['pattern' => 'login', 'route' => 'user/sign-in/login'],
        ['pattern' => 'signup', 'route' => 'user/sign-in/signup'],
        ['pattern' => 'forgot-password', 'route' => 'user/sign-in/request-password-reset'],

        //Account
        ['pattern' => 'account/seller-profile/<id:\d+>', 'route' => 'account/seller-profile'],

        // search
        'search'                    => 'search/global',
        'search/suggest'            => 'search/suggest',
        'search/as-you-type'        => 'search/as-you-type',
        'search/extension'          => 'search/extension',
        'search/opensearch-suggest' => 'search/opensearch-suggest',
        'opensearch.xml'            => 'search/opensearch-description',

        // ajax actions for handling user interactions
        'ajax/<action:[\w-]+>'      => 'ajax/<action>',

        // Sitemap
        ['pattern' => '<name>.xml', 'route' => 'xml/index'],

        //['pattern' => 'sitemap.xml', 'route' => 'site/sitemap', 'defaults' => ['format' => Sitemap::FORMAT_XML]],
        //['pattern' => 'sitemap.txt', 'route' => 'site/sitemap', 'defaults' => ['format' => Sitemap::FORMAT_TXT]],
        //['pattern' => 'sitemap.xml.gz', 'route' => 'site/sitemap', 'defaults' => ['format' => Sitemap::FORMAT_XML, 'gzip' => true]],
    ]
];
