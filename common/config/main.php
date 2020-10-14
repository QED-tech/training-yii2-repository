<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log', 'ideHelper'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'ideHelper' => [
            'class' => 'Mis\IdeHelper\IdeHelper',
        ],
    ],
];
