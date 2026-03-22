<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'dlkaka',
    'name' => 'Dlkaka',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => getenv('COOKIE_VALIDATION_KEY') ?: 'uQy-wjJrleSS5eXnJn3WK6N1XMlDl72T',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],

    'defaultRoute' => 'site/dashboard',

    'params' => $params,

    'modules' => [
            'gridview' => [
                'class' => 'kartik\grid\Module',
            ],
            'datecontrol' =>  [
                'class' => 'kartik\datecontrol\Module',

                // format settings for displaying each date attribute
                'displaySettings' => [
                    'date' => 'd-m-Y',
                    'time' => 'H:i:s A',
                    'datetime' => 'd-m-Y H:i:s A',
                ],

                // format settings for saving each date attribute
                'saveSettings' => [
                    'date' => 'Y-m-d', 
                    'time' => 'H:i:s',
                    'datetime' => 'Y-m-d H:i:s',
                ],



                // automatically use kartik\widgets for each of the above formats
                'autoWidget' => true,

        ],
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    /*$config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];*/
    $config['modules']['gii']['class'] = 'yii\gii\Module';
    $config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ];
}

return $config;
