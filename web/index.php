<?php
switch ($hostname = gethostname()) {
    case 'ip-10-186-219-55':
    case 'jvc-server-01':
        break;
    default:
        $hostname = $_SERVER['SERVER_NAME'] ? '' : 'local';
        break;
}

if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1' || $hostname == 'local') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
} else if ($_SERVER['SERVER_NAME'] == 'dev.clickmoneysystem.com' || $hostname == 'ip-10-186-219-55') {
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'stage');
} else if ($_SERVER['SERVER_NAME'] == 'clickmoneysystem.com' || $_SERVER['SERVER_NAME'] == 'www.clickmoneysystem.com' || $hostname == 'jvc-server-01') {
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
