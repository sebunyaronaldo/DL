<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . (getenv('MYSQLHOST') ?: 'localhost') . ';dbname=' . (getenv('MYSQLDATABASE') ?: 'dlkaka') . ';port=' . (getenv('MYSQLPORT') ?: '3306'),
    'username' => getenv('MYSQLUSER') ?: 'root',
    'password' => getenv('MYSQLPASSWORD') ?: '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => !YII_DEBUG,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
