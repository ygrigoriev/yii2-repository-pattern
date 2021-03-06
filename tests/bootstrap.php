<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

Yii::setAlias('@tests', __DIR__);

new \yii\console\Application([
    'id' => 'unit',
    'basePath' => __DIR__,
    'vendorPath' => __DIR__ . '/../vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'session' => [
            'class' => 'yii\web\CacheSession',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=test',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=test2',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'repository' => [
            'class' => 'ericmaicon\repository\Gateway',
            'repositories' => [
                'test' => [
                    'db' => 'db',
                ],
                'test2' => [
                    'db' => 'db2',
                    'tables' => [
                        'comment'
                    ]
                ],
                'test3' => [
                    'class' => 'ericmaicon\repository\session\SessionRepository',
                    'tables' => [
                        'user'
                    ]
                ]
            ]
        ]
    ],
]);
