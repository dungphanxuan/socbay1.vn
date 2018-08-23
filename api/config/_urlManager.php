<?php
return [
    'class'           => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName'  => false,
    'rules'           => [
        'blog/view/<id:\d+>'     => 'blog/view',
        'article/view/<id:\d+>'  => 'article/view',
        'category/view/<id:\d+>' => 'category/view',
        'user/view/<id:\d+>'     => 'user/view',
    ]
];
