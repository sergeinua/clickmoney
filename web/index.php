<?php

switch (gethostname()) {
    case 'ip-10-186-219-55':
        $env = 'stage';
        break;
    case 'jvc-server-01':
    case '771590-app1.allinpublishing.com':
        $env = 'prod';
        break;
    default:
        $env = 'dev';
        break;
}

switch ($_SERVER['SERVER_NAME'] ?: '') {
    case 'dev.clickmoneysystem.com':
        $env = 'stage';
        break;
    case 'clickmoneysystem.com':
    case 'www.clickmoneysystem.com':
    case 'theclickmoneysystem.com':
    case 'www.theclickmoneysystem.com':
        $env = 'prod';
        break;
    case 'localhost':
    case '127.0.0.1':
        $env = 'dev';
        break;
}

defined('YII_DEBUG') or define('YII_DEBUG', ($env == 'dev'));
defined('YII_ENV') or define('YII_ENV', $env);

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
