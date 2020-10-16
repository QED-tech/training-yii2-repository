<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log', 'ideHelper'],
    'timeZone' => 'Asia/Novosibirsk',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'ideHelper' => [
            'class' => 'Mis\IdeHelper\IdeHelper',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@runtime/logs/log.log',
                    'logVars' => []
                ],
            ]
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ],
    ],
];
